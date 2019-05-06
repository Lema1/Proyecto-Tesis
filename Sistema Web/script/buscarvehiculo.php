<?php
include '../DB/conexion.php';
 
$q=$_POST['q'];
$con=new Conexion();
 
$res = $con->prepare("SELECT tv.patente,tv.marca,tv.modelo FROM tbl_vehiculos tv INNER JOIN tbl_persona_auto tpa on tv.patente = tpa.patente_auto WHERE tpa.cod_persona = :persona");
$res->bindParam(':persona', $q);
$res->execute();

$respuesta = $res->fetchAll();

?>

<select class="form-control" id="sel2" name="sel2">
    <option value="0">Seleccione Vehiculo</option>
    <?php foreach($respuesta as $rspst){ ?>
    <option value="<?php echo $rspst[0]; ?>"><?php echo $rspst[0]; ?></option>
    <?php } ?>
</select>


