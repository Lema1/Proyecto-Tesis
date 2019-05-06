<?php
require_once('../../DB/db_vehiculos.php');
require_once('../../DB/db_imagenes.php');
error_reporting(E_ALL ^ E_NOTICE);

$patente = $_POST['inputPatente'];
$año = $_POST['inputAno'];
$marca = $_POST['inputMarca'];
$modelo = $_POST['inputModelo'];
$color = $_POST['inputColor'];
$kilometros = $_POST['inputKilometros'];

$stipo = $_POST['sel_tipo'];

$cliente = $_POST['selCliente'];

$vehiculo = Vehiculo::agregarVehiculo($patente,$año,$marca,$modelo,$color,$kilometros,$stipo,$cliente);


if($vehiculo == 1){
    
    $cantidad= count($_FILES["fotos"]["tmp_name"]); //cuenta la cantidad de fotos

    for($i = 0; $i < $cantidad; $i++) //recorre la cantidad de fotos contadas y las agrega
    {
    $nombre = $_FILES['fotos']['name'][$i];
    $tipo = $_FILES['fotos']['type'][$i];
    $ruta_provisional = $_FILES['fotos']['tmp_name'][$i];
    $size = $_FILES['fotos']['size'][$i];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $destino = "../../Fotos_Vehiculo/$patente"; // ruta para guardar las imagenes
    $destinoDB = "Fotos_Vehiculo/$patente"; // ruta para guardar en la db
    
        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') // valida que sea una imagen
        {
          echo "Error, el archivo no es una imagen"; 
        }
        else if ($size > 1024*1024)
        {
          echo "Error, el tamaño máximo permitido es un 1MB";
        }
        else if($width < 20 || $height < 20)
        {
            echo "Error la anchura y la altura mínima permitida es 60px";
        }
        else
        {
            if(!is_dir($destino)){ // si la carpeta no existe la crea y mueve el archivo
                $carpeta = mkdir($destino, 0777,true);
                if($carpeta){
                    # echo "carpeta creada";
                    move_uploaded_file($ruta_provisional, $destino.'/'.$nombre);
                }
            }else{ //si esta creada la carpeta solo mueve el archivo
                # echo "carpeta ya existe";
                move_uploaded_file($ruta_provisional, $destino.'/'.$nombre);
            }
            $imagen = Imagenes::agregarImagen($destinoDB,$nombre,$patente); // agrega la ruta de las fotos a la db
        }
    }
    header("refresh:0; url=../../vehiculo.php");
    
}
if($vehiculo == 2)
{
    echo 'false';
}

?>