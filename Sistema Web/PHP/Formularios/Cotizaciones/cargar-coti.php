<?php 
require_once('../../../DB/db_vehiculos.php');
//error_reporting(E_ALL ^ E_NOTICE);
$patente = $_GET['q'];
$vehiculo = Vehiculo::listarVehiculoPatente($patente);

foreach($vehiculo as $vh){
    echo $vh[7];
    
    if($vh[7]==1){
        $tipo= 'coti-autos';?>
        <script>
        cargaAuto();
        </script>
   <?php }
    if($vh[7]==2){
        $tipo= 'coti-moto';?>
        <script>
        $(document).ready(function() {
            $("#datoscoti").load("coti-moto.php");
        });
        </script>
   <?php
    }
    if($vh[7]==3){
        $tipo= 'coti-camion';?>
        <script>
        $(document).ready(function() {
            $("#datoscoti").load("coti-camion.php");
        });
        </script>
   <?php
    }
}
echo '<script language="javascript">alert("ERROR update");</script>';
?>
<div id="datoscoti"></div>
