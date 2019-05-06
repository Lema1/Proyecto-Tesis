<?php
require_once('../../DB/db_tareas.php');
require_once('../../DB/db_personas.php');
error_reporting(E_ALL ^ E_NOTICE);

?>

listar mecanicos

<?php
function sumar($hora1, $hora2){
    list($h, $m, $s) = explode(':', $hora2); //Separo los elementos de la segunda hora
    $a = new DateTime($hora1); //Creo un objeto DateTime
    $b = new DateInterval(sprintf('PT%sH%sM%sS', $h, $m, $s)); //Creo un objeto DateInterval
    $a->add($b); //Sumo las horas
    return $a->format('H:i:s'); //Retorno la suma
}
?>