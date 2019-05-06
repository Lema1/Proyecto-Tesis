<?php
require_once('../../DB/db_personas.php');
error_reporting(E_ALL ^ E_NOTICE);
/*echo '<?xml version="1.0" encoding="ISO-8859-1"?>';*/

$rut = $_POST['inputRut'];
$nombre = $_POST['inputNombre'];
$apellido = $_POST['inputApellido'];
$fecha = $_POST['inputFecha'];
$direccion = !empty($_POST['inputDireccion'])   ? $_POST['inputDireccion']   : NULL;
$tel1 = $_POST['inputTelefono1'];
$tel2 = !empty($_POST['inputTelefono2'])   ? $_POST['inputTelefono2']   : NULL;
$email = $_POST['inputEmail'];
$tipo = $_POST['inputTipo'];

if(validaRut($rut)==0){
    
    echo '<script language="javascript">alert("Error de Rut || Formato: 11111111-1");</script>';
    if($tipo==2){
        header("refresh:0; url=../../mecanicos.php");
    }
    else{
        header("refresh:0; url=../../clientes.php");
    }
    
}
else{
    $cliente = Persona::agregarCliente($rut,$nombre,$apellido,$fecha,$direccion,$tel1,$tel2,$email,$tipo);

    if($cliente!=0 || $cliente==1){
        
        if($tipo==2){
            echo '<script language="javascript">alert("Mecanico Agregado");</script>';
            header("refresh:0; url=../../mecanicos.php");
        }
        else{
            echo '<script language="javascript">alert("Cliente Agregado");</script>';
            header("refresh:0; url=../../clientes.php");
        }
        
        //echo "true";
    }
    if($cliente==2 || $cliente==0)
    {
        
        if($tipo==2){
            echo '<script language="javascript">alert("Error al Agregar Mecanico");</script>';
            header("refresh:0; url=../../mecanicos.php");
        }
        else{
            echo '<script language="javascript">alert("Error al Agregar Cliente");</script>';
            header("refresh:0; url=../../clientes.php");
        }
    }
}



?>

<?php

function validaRut($rut){
    if(strpos($rut,"-")==false){
        $RUT[0] = substr($rut, 0, -1);
        $RUT[1] = substr($rut, -1);
    }else{
        $RUT = explode("-", trim($rut));
    }
    $elRut = str_replace(".", "", trim($RUT[0]));
    $factor = 2;
    for($i = strlen($elRut)-1; $i >= 0; $i--):
        $factor = $factor > 7 ? 2 : $factor;
        $suma += $elRut{$i}*$factor++;
    endfor;
    $resto = $suma % 11;
    $dv = 11 - $resto;
    if($dv == 11){
        $dv=0;
    }else if($dv == 10){
        $dv="k";
    }else{
        $dv=$dv;
    }
   if($dv == trim(strtolower($RUT[1]))){
       return 1;
   }else{
       return 0;
   }
}
?>