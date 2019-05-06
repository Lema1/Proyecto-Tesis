<?php
require_once('../Conexiones/db_login.php');
error_reporting(E_ALL ^ E_NOTICE);
/*echo '<?xml version="1.0" encoding="ISO-8859-1"?>';*/

$usuario = $_POST['inputUsuario'];
$pass = $_POST['inputPassword'];

$login = Login::iniciar($usuario,$pass);
echo $login;
// $login retorna el rut del usuario para agregarlo a una variable session


if($login){
    session_start();
    $_SESSION['user'] = $login;
    header("refresh:0; url=../Dashboard.php");
}
elseif($login == 0)
{
    echo "false";
}

?>