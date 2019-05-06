<?php
require_once('../../DB/db_vehiculos.php');
require_once('../../DB/db_imagenes.php');
error_reporting(E_ALL ^ E_NOTICE);
$vehiculo = Vehiculo::listarTodo();

?>

<table class="demo-tbl col-lg-12">
    <tr class="tbl-item">
        <th>Imagen</th>
        <th>Patente</th>
        <th>Año</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Kilometros</th>
        <th>Tipo</th>
        <th>Rubro</th>
    </tr>
    <?php foreach($vehiculo as $vhc){
        $img = Imagenes::listarImagenPatente($vhc[1]);
        ?>
    <tr class="tbl-item">
        <?php for($i = 0;$i < 1; $i++){ ?>
        <td class="img col-lg-3"><img src="<?php echo $img[$i][1].'/'.$img[$i][2];?>" width="200" height="165"/></td>
        <?php }?>
        <td class="td-block"><p class="patente"><?php echo $vhc[1];?></p>
        <td class="td-block"><p class="marca"><?php echo $vhc[2];?></p>
        <td class="td-block"><p class="modelo"><?php echo $vhc[3];?></p>
        <td class="td-block"><p class="color"><?php echo $vhc[4];?></p>
        <td class="td-block"><p class="kilometros"><?php echo $vhc[5];?></p>
        <td class="td-block"><p class="tipo"><?php echo $vhc[6];?></p>
        <td class="td-block"><p class="rubro"><?php echo $vhc[7];?></p>
        <td class="td-block"><p class="rubro"><?php echo $vhc[8];?></p>
    </tr>
    <?php } ?>
</table>