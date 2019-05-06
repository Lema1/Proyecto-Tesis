<?php
require_once('../../DB/db_login.php');
require_once('../../DB/db_personas.php');
error_reporting(E_ALL ^ E_NOTICE);
/*echo '<?xml version="1.0" encoding="ISO-8859-1"?>';*/

$usuario = $_POST['inputUsuario'];
$pass = $_POST['inputPassword'];

$login = Login::iniciar($usuario,$pass);

// $login retorna el rut del usuario para agregarlo a una variable session


if($login!=0 || $login>0){
    session_start();
    $_SESSION['rut'] = $login;
    $persona = Persona::buscarPersona($login);
    $_SESSION['nombre'] =$persona[0][1];
    $_SESSION['apellido'] =$persona[0][2];
    
    echo "true";
    
}
elseif($login == 0)
{
    echo "false";
}

?>