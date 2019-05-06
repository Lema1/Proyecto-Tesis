<?php
require_once('../../DB/db_vehiculos.php');
require_once('../../DB/db_cotizacion.php');
error_reporting(E_ALL ^ E_NOTICE);

$patente = $_POST['q'];
$buscar = $_POST['r']; //si es 2 no mostrar coti
echo '<script language="javascript">alert("ERROR update");</script>';
$vehiculo = Vehiculo::listarVehiculoPatente($patente);
?>
<table class="table">
    <tr>
        <th>Año</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
    </tr>

<?php
if($vehiculo){
foreach($vehiculo as $vehi){?>
    <tr>
        <td><?php echo $vehi[2];?></td>
        <td><?php echo $vehi[3];?></td>
        <td><?php echo $vehi[4];?></td>
        <td><?php echo $vehi[5];?></td>
    </tr>
<?php }}?>
</table>
<?php if($buscar == 1){ ?>
<div>
    Cotizacion
    <?php
    $coti = Cotizacion::buscarCotizacionPatente($vehiculo[0][1]);
    ?>
    <select class="form-control" name="cotizacion" onchange="buscarCoti(this.value)">
        <option value="0">Seleccione Cotizacion</option>
        <?php
        foreach($coti as $vhl){?>
        <option value="<?php echo $vhl[0]?>"><?php echo $vhl[0].' || '.$vhl[3];?></option>
        <?php }
        ?>
    </select>
    <div id="cotizacion"></div>
</div>
<?php } ?>

