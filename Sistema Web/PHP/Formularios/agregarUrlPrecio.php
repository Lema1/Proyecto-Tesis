<?php
require_once('../../DB/db_repuestos.php');
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set("America/Santiago");

$cod = $_POST['cod'];
$url = $_POST['url'];
$precio = $_POST['precio'];


if($cod && $url && $precio){
    for($x=0;$x<count($cod);$x++){
        if($url[$x] && $precio[$x]){
    //        echo $cod[$x].' '.$url[$x].' '.$precio[$x];
            $update = Repuestos::updateRepu($cod[$x],$url[$x],$precio[$x]);
            
        }
    }
    header('refresh:0; url=../../dashboard.php');
}

?>