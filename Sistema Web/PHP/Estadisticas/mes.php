<?php
require_once('../../DB/db_inventario.php');
error_reporting(E_ALL ^ E_NOTICE);
$mes = $_GET['selMes'];

$codigos = Inventario::codigos();
$gastos = array();
$posi=0;
$nega=0;
$cod=0;
$nom="";

/*for($x=0;$x<count($codigos);$x++){
    $datosMes = Inventario::listaMensual($codigos[$x][0],$mes);
    foreach($datosMes as $dms){
        if($dms[0]){
         echo $dms[0];echo '||';
         echo $dms[1];echo '||';
         echo $dms[2];echo '||';
         echo $dms[3];echo '</br>';
         
        }
    }
}*/

for($x=0;$x<count($codigos);$x++){
    $datosMes = Inventario::listaMensual($codigos[$x][0],$mes);
    //separar en positivo y negativo en el arreglo; 0:positivo, 1:negativo
    foreach($datosMes as $dms){
        if($dms[0]){
            $cod = $datosMes[$x][0];
            $nom = $datosMes[$x][1];
            if($dms[3]>0){
                $posi = $posi + $dms[3];
            }else{
                $nega = $nega + $dms[3];
            }
        }
    }
    
    if($cod!=0){
        $gastos[$x][0]=$cod;
        $gastos[$x][1]=$nom;
        $gastos[$x][2]=$posi;
        $gastos[$x][3]=$nega;
    }
    $posi = 0;
    $nega = 0;
    $cod=0;
    $nom="";
}
/*echo '</br></br> COD || NOM || POSI || NEGA </br>';
    foreach($gastos as $gt){
        echo $gt[0],$gt[1],$gt[2],$gt[3];echo '</br>';
    }*/
?>

<script type=\"text/javascript\">
    $('#dateForm').submit();
  </script>
<html>

<head>
    <title>Bar Chart</title>
    <script src="../../Chart.js-2.5.0/dist/Chart.bundle.js"></script>
    <script src="../../Chart.js-2.5.0/samples/utils.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>

<body>
    <form method="post" action="../../inventario.php"  id="dateForm">
        <textarea hidden="hidden" name="datos"><?php echo serialize($gastos);?></textarea>
        <input hidden="hidden" type="submit">
    </form>

    <!--<div id="container" style="width: 75%;">
        <canvas id="canvas"></canvas>
    </div>-->
    <script>
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["dateForm"].submit();
    </script>
</body>
</html>
<script>
    var color = Chart.helpers.color;
    var barChartData = {
        labels: [
                 <?php
                 foreach($gastos as $gt){?>
                    '<?php echo $gt[1]?>',
                 <?php
                 }
                 ?>
                 ],
        datasets: [{
            label: 'Agregados',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [
                <?php
                foreach($gastos as $gas){?>
                    '<?php echo $gas[2]?>',
                <?php }
                ?>
            ]
        }, {
            label: 'Usados',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [
                <?php
                foreach($gastos as $gas){?>
                    '<?php echo $gas[3]?>',
                <?php }
                ?>
            ]
        }]

    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Registros del Mes: '
                }
            }
        });

    };
</script>