<?php
require_once('../../DB/db_tareas.php');
require_once('../../DB/db_personas.php');
require_once('../../DB/db_espacios.php');
require_once('../../DB/db_danosCarroceria.php');
error_reporting(E_ALL ^ E_NOTICE);
$cliente = Persona::listarPorTipo(2);

$espTrabajando = Espacios::buscarEspacioTrabajando();
$seln = 0;
?>
<div class="row">
    <div class="col-lg-12">
        <h3>Asignacion de Mecanicos</h3>
    </div>
    
    <?php if($espTrabajando){
    for($x=0;$x<count($espTrabajando);$x++){?>
    <form method="post" action="PHP/Formularios/asignar-mecanico.php">
    <div class="col-md-12">
        <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#<?php echo $espTrabajando[$x][0];?>">Espacio: <?php echo $espTrabajando[$x][0];?> ||  Vehiculo: <?php echo $espTrabajando[$x][1];?></a>
                </h4>
            </div>
            <div id="<?php echo $espTrabajando[$x][0];?>" class="panel-collapse collapse">
                <div class="panel-body">
                    
                        <?php $tareas = Tareas::buscarTarea($espTrabajando[$x][2]);?>
                        <table class="table table-reponsive">
                            <thead>
                                <tr>
                                    <th>Codigo Tarea</th>
                                    <th>Codigo Daño</th>
                                    <th>Parte Vehiculo</th>
                                    <th>Categoria</th>
                                    <th>Duracion</th>
                                    <th>Mecanico</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php for($y=0;$y<count($tareas);$y++){?>
                                <tr>
                                    <td><?php echo $tareas[$y][0];?></td>
                                    <td><?php echo $tareas[$y][1];?></td>
                                    <td><?php echo $tareas[$y][2];?></td>
                                    <td><?php echo $tareas[$y][4];?></td>
                                    <td><?php echo $tareas[$y][5];?></td>
                                    <td><?php
                                        if(!$tareas[$y][3]){?>
                                            <select name="selMeca<?php echo $y;?>">
                                                <option value="0">Seleccione Mecanico</option>
                                                <?php
                                                foreach($cliente as $meca){?>
                                                    <option value="<?php echo $meca[0]?>"><?php echo $meca[0].' || '.$meca[1].' || '.$meca[2];?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        <?php }
                                        else{
                                            echo $tareas[$y][3];
                                        }
                                        ?>
                                    </td>
                                    <input hidden="hidden" name="vueltaY" value="<?php echo $y;?>">
                                    <input hidden="hidden" name="cod<?php echo $y;?>" value="<?php echo $tareas[$y][0];?>">
                                    <input hidden="hidden" name="dur<?php echo $y;?>" value="<?php echo $tareas[$y][5];?>">
                                    <input hidden="hidden" name="vueltaX" value="<?php echo $x;?>">
                                    <input hidden="hidden" name="vehi<?php echo $x;?>" value="<?php echo $espTrabajando[$x][1];?>">
                                    
                                    <td><?php if($tareas[$y][3]){echo 'En proceso';}else{?><button type="submit" class="btn btn-blue" name="btn<?php echo $y;?>" class="form-group">Asignar</button><?php }?></td>
                                </tr>
                        <?php $seln = $seln+1;}?>
                            </tbody>
                        </table>
                        
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    <?php } } else{ echo 'Sin vehiculos';}?>
</div>
