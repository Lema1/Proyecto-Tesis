<?php
include '../DB/conexion.php';
require_once('../DB/personas.php');
session_start();
 
$q=$_POST['q'];
$con=new Conexion();
$res = $con->prepare("SELECT tc.vehiculo, tr.nombre, tr.tiempo, tpv.nombre, tpv.lugar, tr.codigo
                     FROM tbl_cotizaciones tc
                     INNER JOIN tbl_reparaciones tr on tc.codigo = tr.cotizacion
                     INNER JOIN tbl_partes_vehiculo tpv on tr.parte_vehiculo = tpv.codigo
                     WHERE tc.codigo = :cod");


$res->bindParam(':cod', $q);
$res->execute();

$respuesta = $res->fetchAll();

function lugar($lugar){
    $nombre = "";
    if($lugar == 1){
        $nombre = "Parte Delantera";
    }
    if($lugar == 2){
        $nombre = "Parte Trasera";
    }
    if($lugar == 3){
        $nombre = "Lateral Derecho";
    }
    if($lugar == 4){
        $nombre = "Lateral Izquierdo";
    }
    if($lugar == 5){
        $nombre = "Techo";
    }
    return $nombre;
}

$nrepa = 0;
?>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Accion</th>
                    <th>Objeto</th>
                    <th>Lugar Vehiculo</th>
                    <th>Mecanico</th>
                    <th>Tiempo</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($respuesta as $rsp){
                    
                    ?>
                
                <tr>
                    <td><?php echo $rsp[1];?></td>
                    <td><?php echo $rsp[3];?></td>
                    <td><?php echo $lug = lugar($rsp[4]);?></td>
                    <td>
                        <select class="form-control" id="mecanico<?php echo $nrepa;?>" name="mecanico<?php echo $nrepa;?>">
                            <option value="0">Seleccionar Mecanico</option>
                            <?php $persona = Persona::listarPorTipo(2);
                            foreach($persona as $per){?>
                            <option value="<?php echo $per[0];?>"><?php echo $per[0];?> || <?php echo $per[1];?></option>
                            <?php }?>
                        </select>
                    </td>
                    <td><input class="form-control" type="time" name="tiempo<?php echo $nrepa;?>"></td>
                    <input type="text" name="codrepa<?php echo $nrepa;?>" hidden="hidden" value="<?php echo $rsp[5];?>">
                </tr>
                <?php $nrepa++;} $_SESSION['nrepa'] = $nrepa;?>
                </tbody>
            </table>
        
