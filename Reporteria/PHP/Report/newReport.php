<?php
require_once('../../Conexiones/con-SV-BI.php');
$fecha1 = intval(date('m',strtotime($_POST['inputFechaD'])));
$fecha2 = intval(date('m',strtotime($_POST['inputFechaH'])));



	function vehiMES($mes){
		$conBI = new ConexionBI();
		$sql = $conBI->prepare("CALL extract_vehi_repara(?)");
		
        $sql->bindParam('1', $mes);
		
		$sql->execute();
		$respuesta = $sql->fetchAll();
		
		if($respuesta){
			return $respuesta;
		}
		else{
			return 2;
		}
	}
	
	$datosVehi = array();
	$datosVehi[0][0] = 'Enero';
	$datosVehi[1][0] = 'Febrero';
	$datosVehi[2][0] = 'Marzo';
	$datosVehi[3][0] = 'Abril';
	$datosVehi[4][0] = 'Mayo';
	$datosVehi[5][0] = 'Junio';
	$datosVehi[6][0] = 'Julio';
	$datosVehi[7][0] = 'Agosto';
	$datosVehi[8][0] = 'Septiembre';
	$datosVehi[9][0] = 'Octubre';
	$datosVehi[10][0] = 'Noviembre';
	$datosVehi[11][0] = 'Diciembre';
	
	for($x=$fecha1;$x<=$fecha2;$x++){
		$dtMes = vehiMES($x);
		
		$datosVehi[($x)][1] = $dtMes[0][0];
	}
	
	function vehiMarca($desde,$hasta){
		$conBI = new ConexionBI();
		$sql = $conBI->prepare("CALL vhi_repara_marca(?,?)");
		$sql->bindParam('1', $desde);
		$sql->bindParam('2', $hasta);
		
		$sql->execute();
		$respuesta = $sql->fetchAll();
		
		if($respuesta){
			return $respuesta;
		}
		else{
			return 2;
		}
	}
	
	$dtVHMarca = vehiMarca($fecha1,$fecha2);
	
	
	function vehiModelo($desde,$hasta){
    $conWEB = new ConexionBI();
    $sql = $conWEB->prepare("CALL vhi_repara_modelo(?,?)");
    $sql->bindParam('1', $desde);
	$sql->bindParam('2', $hasta);
	
    $sql->execute();
    $respuesta = $sql->fetchAll();
    
    if ($respuesta){
        return $respuesta;
    }
    else { 
        return false;
    }
}
$dtVHModelo = vehiModelo($fecha1,$fecha2);
	
?>


<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
	google.charts.setOnLoadCallback(drawChart2);
	google.charts.setOnLoadCallback(drawChart3);
    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        
		['Mes', 'Cantidad', { role: 'style' }],
		<?php for($l=$fecha1;$l<=$fecha2;$l++){ ?>
        ['<?php echo $datosVehi[$l][0];?>', <?php echo $datosVehi[$l][1];?>, '#b87333', ],
		<?php }?>
      ]);

      var options = {
		width: 700,
		height: 350,
        title: "Autos Totales Reparados desde <?php echo date('d-m-y',strtotime($_POST['inputFechaD']));?> hasta <?php echo date('d-m-y',strtotime($_POST['inputFechaH']))?>",
        bar: {groupWidth: '95%'},
        legend: 'none',
      };

      var chart_div = document.getElementById('chart_div');
      var chart = new google.visualization.ColumnChart(chart_div);

      // Wait for the chart to finish drawing before calling the getImageURI() method.
      google.visualization.events.addListener(chart, 'ready', function () {
		chart_div.innerHTML = '<input type="text" name="char1" value="' + chart.getImageURI() + '" hidden="hidden">';
        console.log(chart_div.innerHTML);
      });

      chart.draw(data, options);
	  
	  
  }
  function drawChart2() {

      var data = google.visualization.arrayToDataTable([
        ['Marca', 'Cantidad', { role: 'style' }],
		<?php foreach($dtVHMarca as $dtvhmr){ ?>
		['<?php echo $dtvhmr[0];?>', <?php echo $dtvhmr[1];?>, '#b87333', ],
		<?php }?>
      ]);

      var options = {
		width: 700,
		height: 350,
        title: "Autos Reparados x Marca desde <?php echo date('d-m-y',strtotime($_POST['inputFechaD']));?> hasta <?php echo date('d-m-y',strtotime($_POST['inputFechaH']))?>",
        bar: {groupWidth: '95%'},
        legend: 'none',
      };

      var chart_div = document.getElementById('chart_div2');
      var chart = new google.visualization.ColumnChart(chart_div);

      // Wait for the chart to finish drawing before calling the getImageURI() method.
      google.visualization.events.addListener(chart, 'ready', function () {
		chart_div.innerHTML = '<input type="text" name="char2" value="' + chart.getImageURI() + '" hidden="hidden">';
        console.log(chart_div.innerHTML);
      });

      chart.draw(data, options);
	  
	  
  }
  
  function drawChart3() {

      var data = google.visualization.arrayToDataTable([
        ['Marca', 'Cantidad', { role: 'style' }],
		<?php foreach($dtVHModelo as $dtvhmod){ ?>
		['<?php echo $dtvhmod[0].' '.$dtvhmod[1];?>', <?php echo $dtvhmod[2];?>, '#b87333', ],
		<?php }?>
      ]);

      var options = {
		width: 800,
		height: 350,
        title: "Autos Reparados x Marca Modelo desde <?php echo date('d-m-y',strtotime($_POST['inputFechaD']));?> hasta <?php echo date('d-m-y',strtotime($_POST['inputFechaH']))?>",
        bar: {groupWidth: '95%'},
        legend: 'none',
      };

      var chart_div = document.getElementById('chart_div3');
      var chart = new google.visualization.ColumnChart(chart_div);

      // Wait for the chart to finish drawing before calling the getImageURI() method.
      google.visualization.events.addListener(chart, 'ready', function () {
		chart_div.innerHTML = '<input type="text" name="char3" value="' + chart.getImageURI() + '" hidden="hidden">';
        console.log(chart_div.innerHTML);
      });

      chart.draw(data, options);
	  
	    
  }
</script>

<script language="javascript" type="text/javascript">
      var formulario = document.getElementById('frm-char'); // el id del formulario
      var redirect = function(){
	   			setTimeout("document.getElementById('frm-char').submit()",1500)
      }
</script>
<?php
$desde = date('d-m-y',strtotime($_POST['inputFechaD']));
$hasta = date('d-m-y',strtotime($_POST['inputFechaH']));

?>

<body onload="redirect();">
<form action="newPDFReport.php" id="frm-char" name="frm-char" method="post">
	<div id='chart_div'></div>
	<div id='chart_div2'></div>
	<div id='chart_div3'></div>
	<input type="text" name="fechaD" id="fechaD" value="<?php echo $desde;?>" hidden="hidden">
	<input type="text" name="fechaH" id="fechaH" value="<?php echo $hasta;?>" hidden="hidden">
	
</form>
</body>