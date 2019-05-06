<?php
require_once('../../DB/db_personas.php');
error_reporting(E_ALL ^ E_NOTICE);
$persona = Persona::listarTodo();
?>
<table class="demo-tbl">
    <tr>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fecha de Nacimiento</th>
        <th>Direccion</th>
        <th>Telefono1</th>
        <th>Telefono2</th>
        <th>Email</th>
    </tr>
    <?php foreach($persona as $prs){ ?>
    <tr class="tbl-item">
        <td class="td-block"><p class="rut"><?php echo $prs[0];?></p>
        <td class="td-block"><p class="nombre"><?php echo $prs[1];?></p>
        <td class="td-block"><p class="apellido"><?php echo $prs[2];?></p>
        <td class="td-block"><p class="fecha"><?php echo $prs[3];?></p>
        <td class="td-block"><p class="direccion"><?php echo $prs[4];?></p>
        <td class="td-block"><p class="telefono1"><?php echo $prs[5];?></p>
        <td class="td-block"><p class="telefono2"><?php echo $prs[6];?></p>
        <td class="td-block"><p class="email"><?php echo $prs[7];?></p>
    </tr>
    <?php } ?>
</table>