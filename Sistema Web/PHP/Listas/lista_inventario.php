<?php
require_once("../../DB/db_inventario.php");
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set("America/Santiago");
$inventario = Inventario::listarTodo();

$mes = date("m");
?>
<a class="btn btn-info btn-block" data-toggle="modal" data-target="#nuevoProd">Agregar</a>
<div id="nuevoProd" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="PHP/Formularios/nuevo-insumo.php" method="post">
                    <div class="col-md-6">
                        <div class="form-body pal">
                            <div class="row">
                                <div class="form-group">
                                    <label for="nuevoNombre" class="control-label">Nombre</label>
                                    <div class="input-icon right">
                                        <input type="text" name="nuevoNombre" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="inputMarca" class="control-label">Descripcion</label>
                                    <div class="input-icon right">
                                        <textarea name="nuevaDescip" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-body pal">
                            <div class="row">
                                <div class="form-group">
                                    <label for="inputMarca" class="control-label">Precio</label>
                                    <div class="input-icon right">
                                        <input type="number" min="0" name="nuevoPrecio" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="inputMarca" class="control-label">Cantidad</label>
                                    <div class="input-icon right">
                                        <input type="number" min="0" name="nuevoCantidad" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" name="nuevoInsumo" id="nuevoInsumo" class="btn btn-success" value="Agregar">
                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<table class="table table-hover-responsive">
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Acciones</th>
        <th>Estado</th>
    </tr>
    <?php foreach($inventario as $inv){ ?>
    <tr>
        <td class="td-block"><p class="codigo"><?php echo $inv[0];?></p></td>
        <td class="td-block"><p class="nombre"><?php echo $inv[1];?></p></td>
        <td class="td-block"><p class="descripcion"><?php echo $inv[2];?></p></td>
        <td class="td-block"><p class="precio"><?php echo $inv[3];?></p></td>
        <td class="td-block"><p class="cantidad"><?php echo $inv[4];?></p></td>
        <td><a class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $inv[0];?>">Modificar</a></td>
        <td><div id="alert-inventario<?php echo $inv[0];?>"></div></td>
    </tr>
    <?php } ?>
</table>
<!-- creacion de modal -->
<?php foreach($inventario as $inv){ ?>
<div id="myModal<?php echo $inv[0];?>" class="modal fade" role="dialog">

    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $inv[0].' || '.$inv[1];?></h4>
        </div>
        <div class="modal-body">
          <form method="post" action="PHP/Formularios/modificar-insumo.php" id="agregarCantidad">
            <div class="form-body pal">
                <div class="form-group">
                    <label>Agregar Cantidad</label>
                    <input type="hidden" value="<?php echo $inv[0];?>" name="insumo">
                    <input type="number" name="cantidad" placeholder="cantidad">
                </div>
                <div class="from-group">
                    <button type="submit" class="btn">Agregar</button>
                </div>
            </div>
          </form>
          <h4>Gastos del insumo</h4>
          <table class="table">
            <thead>
                <tr>
                    <th>Ingresados</th>
                    <th>Gastados</th>
                    <th>Prom. Gastos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $sum3Posi;?></td>
                    <td><?php echo $sum3Nega;?></td>
                    <td><?php echo -1*($sum3Nega/2);?></td>
                </tr>
            </tbody>
          </table>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
</div>
<script>
$(document).ready(function() {    
    function changeColor<?php echo $inv[0];?>(){
        var xmlhttp;
             
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("alert-inventario<?php echo $inv[0];?>").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","PHP/Listas/alerta_inventario.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("cod=<?php echo $inv[0];?>&cant=<?php echo $inv[4];?>");
    }
    setInterval(changeColor<?php echo $inv[0];?>, 2000);
});
</script>
<?php } ?>