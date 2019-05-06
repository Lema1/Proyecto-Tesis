<?php
require_once('../../DB/db_personas.php');
require_once('../../DB/db_vehiculos.php');
error_reporting(E_ALL ^ E_NOTICE);
$rut = $_POST['q'];
$buscar = $_POST['r'];//1 buscar cliente

$cliente = Persona::buscarPersona($rut);
if($rut){
?>
<table class="table">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fecha Nacimiento</th>
    </tr>

<?php

foreach($cliente as $vehi){?>
    <tr>
        <td><?php echo $vehi[1];?></td>
        <td><?php echo $vehi[2];?></td>
        <td><?php echo $vehi[3];?></td>
    </tr>
<?php }?>
</table>

<div>
    Vehiculo
    <?php
    $vehicu = Vehiculo::buscarXRut($rut);
    ?>
    <select class="form-control selectpicker" name="vehiculo" onchange="cargaVehiculo(this.value);">
        <option value="0">Seleccione vehiculo</option>
        <?php foreach($vehicu as $v){ ?>
        <option value="<?php echo $v[0];?>"><?php echo $v[0].' || '.$v[1].' || '.$v[2];?></option>
        <?php }?>
    </select>
    <div id="vehiculo"></div>
</div>
<?php }?>