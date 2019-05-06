<?php
require_once('../../DB/db_espacios.php');
require_once('../../DB/db_tipo-vehiculo.php');
require_once('../../DB/db_imagenes.php');
require_once('../../DB/db_vehiculos.php');
require_once('../../DB/db_cotizacion.php');
require_once('../../DB/db_danosCarroceria.php');
require_once('../../DB/db_tareas.php');
require_once('../../DB/db_personas.php');
error_reporting(E_ALL ^ E_NOTICE);

$cliente = Persona::listarPorTipo(2);

?>

<?php
//recorre 2 veces el for para poder separa los espacios por categoria
for($i=0;$i<2;$i++){
    $espacio = Espacios::listarXCategoria($i);
    //asigna un color dependiendo del estado del espacio
    foreach($espacio as $espcol){
        if($espcol[2] == 1){
            $color = "green";
        }else{
            $color = "red";
        }
    }
    if($i==0){
        $catego = 'En espera de lugar';
        ?>
        <div class="panel">
            <div class="panel-heading">
                <td>En espera de lugar</td>
            </div>
            <div class="panel-body">
                <?php
                foreach($espacio as $dtEsp){
                    if($dtEsp[2] == 1){
                        $color = "green";
                    }else{
                        $color = "red";
                    }?>
                    <div class="panel-group col-lg-3"">
                        <div class="panel panel-<?php echo $color;?>">
                            <div class="panel-heading">
                                <td>Espacio: <?php echo $dtEsp[0];?></td>
                            </div>
                            <?php if($color == "green"){ ?> <!-- si esta disponible se deja los espacios en disponible, si no se cargan los datos del auto registrado en el espacio  -->
                            <div class="panel-body">
                                <p>Patente: Disponible</p>
                                <P>Marca: Disponible</P>
                                <p>Modelo: Disponible</p>
                            </div>
                            <?php
                            }else{ // como el espacio esta opcupado se buscan los datos del vehiculo que esta en el espacio
                                $vehiculo = Espacios::espacioVehiculo($dtEsp[0]);
                                
                                foreach($vehiculo as $dtvehi){
                            ?>
                            <div class="panel-body">
                                <p>Patente:<?php echo $dtvehi[0];?></p>
                                <p>Marca: <?php echo $dtvehi[2];?></p>
                                <p>Modelo: <?php echo $dtvehi[3];?></p>
                            </div>
                            <?php }
                            }?>
                        </div>
                    </div>
            <?php }?>
            </div>
        </div>
<?php
    }
    if($i==1){
        $catego = 'lugares de trabajo';
        ?>
        <div class="panel">
            <div class="panel-heading">
                <td>Espacios de Trabajo</td>
            </div>
            <div class="panel-body">
                <?php
                 foreach($espacio as $dtEsp){
                    if($dtEsp[2] == 1){
                        $color = "green";
                    }else{
                        $color = "red";
                    }?>
                    <div class="panel-group col-lg-3" data-toggle="modal" data-target="#myModal<?php echo $dtEsp[0]?>">
                        <div class="panel panel-<?php echo $color;?>">
                            <div class="panel-heading">
                                <td>Espacio: <?php echo $dtEsp[0];?></td>
                            </div>
                            <?php if($color == "green"){ ?> <!-- si esta disponible se deja los espacios en disponible, si no se cargan los datos del auto registrado en el espacio  -->
                            <div class="panel-body">
                                <p>Patente: Disponible</p>
                                <P>Marca: Disponible</P>
                                <p>Modelo: Disponible</p>
                            </div>
                            <?php
                            }else{ // como el espacio esta opcupado se buscan los datos del vehiculo que esta en el espacio
                                $vehiculo = Espacios::espacioVehiculo($dtEsp[0]);
                                
                                foreach($vehiculo as $v){
                            ?>
                            <div class="panel-body">
                                <p>Patente:<?php echo $v[0];?></p>
                                <p>Marca: <?php echo $v[2];?></p>
                                <p>Modelo: <?php echo $v[3];?></p>
                            </div>
                            <?php }
                            }?>
                        </div>
                    </div>
        <?php }?>
            </div>
        </div>
<?php }
}
//creacion de modals
$espTrabajando = Espacios::buscarEspacioTrabajando();
if($espTrabajando){
foreach($espTrabajando as $tra){
?>
<div id="myModal<?php echo $tra[0];?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Espacio: <?php echo $tra[0];?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Estado: Ocupado</h3>
                    </div>
                    <!-- opciones para ver la orden de trabajo o la cotizacion -->
                    <div class="col-lg-2">
                        <a href="PHP/PDF/ordenPDF.php?coti=<?php echo $tra[2];?>" class="btn btn-default" target="_blank">Orden de trabajo</a>
                    </div>
                    <div class="col-lg-2">
                        <a href="PHP/PDF/nuevoPDF.php?coti=<?php echo $tra[2];?>" class="btn btn-default" target="_blank">Ver cotizacion</a>
                    </div>
                </div>
                <div class="panel">
                    <!-- se compueba si existen tareas incompletas -->
                    <a href="PHP/Formularios/mover-vehiculo.php?espacio=<?php echo $tra[0];?>&patente=<?php echo $tra[1]?>&coti=<?php echo $tra[2];?>" class="btn btn-default" id="">Entregar Vehiculo</a>
                </div>
                <div class="panel">
                    <div class="panel-heading">Datos del Vehiculo</div>
                    <div class="row">
                        <?php
                        $datosVehi = Espacios::espacioVehiculo($tra[0]);//busca el vehiculo asignado al espacio
                        foreach($datosVehi as $vhcl){
                            $nomtipo = Tipo::listarTipoCodigo($vhcl[6]);  // busca el tipo del vehiculo
                            ?>
                        <div class="col-lg-12">
                            <table class="table table-reponsive">
                                <tr>
                                    <th>Patente</th>
                                    <th>Color</th>
                                    <th>Año</th>
                                    <th>Kilometros</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Tipo Vehiculo</th>
                                    <th>Rubro Vehiculo</th>
                                </tr>
                                <tr>
                                    <td><?php echo $vhcl[0]?></td>
                                    <td><?php echo $vhcl[4]?></td>
                                    <td><?php echo $vhcl[1]?></td>
                                    <td><?php echo $vhcl[5]?></td>
                                    <td><?php echo $vhcl[2]?></td>
                                    <td><?php echo $vhcl[3]?></td>
                                    <?php foreach($nomtipo as $t){ ?> <!-- para mostrar el nombr del tipo -->
                                    <td><?php echo $t[1];?></td>
                                    <?php }?>
                                </tr>
                            </table>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">Tareas del Vehiculo</div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Tareas de Carroceria</h3>
                            <table class="table table-reponsive">
                                <tr>
                                    <th>Codigo Tarea</th>
                                    <th>Parte</th>
                                    <th>Categoria</th>
                                    <th>Mecanico</th>
                                    <th>Estado</th>
                                </tr>
                                <?php echo $tra[2];
                                $tareas = Tareas::buscarTareaCADesa($tra[2]);//busca las tareas del vehiculo
                                if($tareas){
                                foreach($tareas as $trs){?>
                                <tr>
                                    <td><?php echo $trs[0];?></td>
                                    <td><?php echo $trs[1];?></td>
                                    <td><?php echo $trs[2];?></td>
                                    <td><?php echo $trs[3];?></td>
                                    <td><?php if($trs[4]==0){ echo 'Esperando';}elseif($trs[6]==1){ echo 'Realizandose';}else{echo 'Terminada';}?></td>
                                </tr>
                                <?php } }?>
                                <?php
                                $tareas1 = Tareas::buscarTareaCAPint($tra[2]);//busca las tareas del vehiculo
                                if($tareas1){
                                foreach($tareas1 as $trs){?>
                                <tr>
                                    <td><?php echo $trs[0];?></td>
                                    <td><?php echo $trs[1];?></td>
                                    <td><?php echo $trs[2];?></td>
                                    <td><?php echo $trs[3];?></td>
                                    <td><?php if($trs[4]==0){ echo 'Esperando';}elseif($trs[6]==1){ echo 'Realizandose';}else{echo 'Terminada';}?></td>
                                </tr>
                                <?php } }?>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <h3>Tareas Mecanicas</h3>
                            <table class="table table-reponsive">
                                <tr>
                                    <th>Codigo Tarea</th>
                                    <th>Parte</th>
                                    <th>Repuesto</th>
                                    <th>Cantidad</th>
                                    <th>Mecanico</th>
                                    <th>Estado</th>
                                </tr>
                                <?php
                                $tareas2 = Tareas::buscarTareaME($tra[2]);//busca las tareas del vehiculo
                                if($tareas2){
                                foreach($tareas2 as $trs){?>
                                <tr>
                                    <td><?php echo $trs[0];?></td>
                                    <td><?php echo $trs[1];?></td>
                                    <td><?php echo $trs[2];?></td>
                                    <td><?php echo $trs[3];?></td>
                                    <td><?php echo $trs[4];?></td>
                                    <td><?php if($trs[5]==0){ echo 'Esperando';}elseif($trs[6]==1){ echo 'Realizandose';}else{echo 'Terminada';}?></td>
                                </tr>
                                <?php } }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php }}?>