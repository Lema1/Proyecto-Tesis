<?php
require_once('../../DB/db_inventario.php');
error_reporting(E_ALL ^ E_NOTICE);
$cantidad = $_POST['cantidad'];
$insumo = $_POST['insumo'];
$fecha = date("Y-m-d h:i:s");
echo $cantidad.'|'.$insumo;

$agregar = Inventario::agregarCantidad($insumo,$fecha,$cantidad);

if($agregar){
    header("refresh:0; url=../../inventario.php");
}


?>