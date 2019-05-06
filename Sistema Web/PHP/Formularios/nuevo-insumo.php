<?php
require_once('../../DB/db_inventario.php');
error_reporting(E_ALL ^ E_NOTICE);

$nombre = $_POST['nuevoNombre'];
$descri = $_POST['nuevaDescip'];
$precio = $_POST['nuevoPrecio'];
$cantidad = $_POST['nuevoCantidad'];

$agregar = Inventario::agregarInsumo($nombre,$descri,$precio,$cantidad);




?>