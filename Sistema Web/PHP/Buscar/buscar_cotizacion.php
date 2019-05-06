<?php
include '../../DB/conexion.php';
include '../../DB/db_danosCarroceria.php';
include '../../DB/db_danosMecanica.php';
include '../../DB/db_partes_vehiculo.php';
error_reporting(E_ALL ^ E_NOTICE);
$q=$_POST['q'];
//echo $q;
$con=new Conexion();

$danosCA = DanosCarroceria::buscarDaños($q);
$danosME = DanosMecanica::buscarDaños($q);

?>

    <h3>Daños de Carroceria</h3>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($danosCA){
                foreach($danosCA as $dn){?>
                <tr>
                    <td><?php echo $dn[0]?></td>
                    <td><?php $partes = PartesVehiculo::buscarNombre($dn[1]);echo $partes[0][1];?></td>
                    <td><?php echo $dn[2]?></td>
                    <td><?php if($dn[3]==1){ echo 'Desabolladura';}elseif($dn[3]==2){ echo 'Pintura'; }?></td>
                    
                </tr>
                <?php }}?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>

<div class="row">
    <h3>Daños de Mecanicos</h3>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>obs</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($danosME){
                foreach($danosME as $dn){?>
                <tr>
                    <td><?php echo $dn[0]?></td>
                    <td><?php $partes = PartesVehiculo::buscarNombre($dn[1]);echo $partes[0][1];?></td>
                    <td><?php echo $dn[2]?></td>
                    <td><?php echo $dn[3]?></td>
                    
                </tr>
                <?php }}?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>