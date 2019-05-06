<?php
require_once('../../DB/db_tareas.php');
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set("America/Santiago");

$meca = $_POST['mecanico'];
$tarea = $_POST['tarea'];
/*
echo $meca[0].' '.$meca[1].' '.$meca[2];
echo '</br>';
echo $tarea[0].' '.$tarea[1].' '.$tarea[2];
echo '</br>';

echo count($meca).'</br>';
*/
if($meca && $tarea){
    for($x=0;$x<count($meca);$x++){
        if($meca[$x]){
            $update = Tareas::asignarMecanico($tarea[$x],$meca[$x]);
        }
    }
    header('refresh:0; url=../../FlujoProcesos.php');
}
?>

<?php
//funcion sumar fechas
function sumar($hora1, $hora2){
    list($h, $m, $s) = explode(':', $hora2); //Separo los elementos de la segunda hora
    $a = new DateTime($hora1); //Creo un objeto DateTime
    $b = new DateInterval(sprintf('PT%sH%sM%sS', $h, $m, $s)); //Creo un objeto DateInterval
    $a->add($b); //Sumo las horas
    return $a->format('H:i:s'); //Retorno la suma
}
?>