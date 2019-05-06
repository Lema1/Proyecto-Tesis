<?php
require_once('../../DB/db_espacios.php');
error_reporting(E_ALL ^ E_NOTICE);

    $espacio = $_GET['espacio'];
    $patente = $_GET['patente'];
    $coti = $_GET['coti'];
    
    //echo $espacio.' || '.$patente.' || '.$coti;
    
    $update = Espacios::updateEspacio($espacio,$patente,2,$coti);
    

    if($update == 1){
        
        header("refresh:0; url=../../taller.php");
    }
    if($update == 2)
    {
        echo 'false';
    }
    
?>