<?php
require_once("../../DB/db_inventario.php");
date_default_timezone_set("America/Santiago");
error_reporting(E_ALL ^ E_NOTICE);
$cod = $_POST['cod'];
$mes = date("m");
$cantActual = $_POST['cant'];

$sum3Posi = 0;//suma datos POSITIVOS de 3 meses antes
$sum3Nega = 0;//suma datos POSITIVOS de 3 meses antes

for($x=1;$x<4;$x++){ // sumatoria de los gastos e ingresos de los utimos 3 meses
    $datosMes = Inventario::listaMensual($cod,$mes-$x);
    
    foreach($datosMes as $dtm){
        if($dtm[3]>0){
            $sum3Posi = $sum3Posi + $dtm[3];
        }else{
            $sum3Nega = $sum3Nega + $dtm[3];;
        }
    }
}

if($cantActual<($sum3Nega*-1)/3){?>
    <img src="images/danger.png" class="img-responsive"/>
<?php }
elseif($cantActual/2<($sum3Nega*-1)/3){?>
    <img src="images/warning.png" class="img-responsive"/>
<?php }
elseif($cantActual/2>=($sum3Nega*-1)/3){?>
    <img src="images/ticket.png" class="img-responsive"/>
<?php }

?>
