<?php
require_once('../../DB/db_tareas.php');
require_once('../../DB/db_cotizacion.php');
error_reporting(E_ALL ^ E_NOTICE);
$danos = unserialize( $_POST['danos'] );
$coti = $_POST['cotizacion'];

foreach($danos as $dn){
    $ntarea = Tareas::nuevaTarea($dn[0]);
}

if($ntarea){
    
    $ucoti = Cotizacion::uptadteCotizacion(1,$coti);
    
    if($ucoti == 1){
        
        header("refresh:0; url=../../taller.php");
    }
    else{
        echo '<script language="javascript">alert("Error2");</script>';
        header("refresh:2; url=../../taller.php");
    }
    
}else{
    echo '<script language="javascript">alert("Error1");</script>';
    header("refresh:2; url=../../taller.php");
}


?>