<?php
require_once('../../DB/conexion.php');
require_once('../../DB/db_orden_reparacion.php');
require_once('../../DB/db_cotizacion.php');
require_once('../../DB/db_tareas.php');
require_once('../../dompdf/autoload.inc.php');
use Dompdf\Dompdf;
session_start();
error_reporting(E_ALL ^ E_NOTICE);
$coti = $_GET['coti'];

$orden = Orden::buscarOrden($coti);
$dtCoti = Cotizacion::select_coti_cod($coti);
$tareas = Tareas::buscarTarea($coti);


$codigoHTML='
<head>
    <title>Orden de Reparacion '.$orden[0][0].'</title>
</head>

<body>
    <div class="coti">
        <div class"numerocoti">
            <h3>Orden de Reparacion '.$orden[0][0].'</h3>
        </div>
        <div class="datos">
        <h3>Datos</h3>
        <table style="width:100%">
        <thead>
            <tr>
                <th>Cotizacion</th>
                <th>Vehiculo</th>
                <th>Cliente</th>
                <th>Fecha de Inicio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>'.$orden[0][1].'</td>
                <td>'.$dtCoti[0][1].'</td>
                <td>'.$dtCoti[0][2].'</td>
                <td>'.$orden[0][2].'</td>
            </tr>
        </tbody>
        </table>
        </div>
        
        <div class="tareas">
        <h3>Tareas</h3>
        <table style="width:100%">
        <thead>
            <tr> 
                <th>Codigo</th>
                <th>PArte Vehiculo</th>
                <th>Categoria</th>
                <th>Duracion</th>
            </tr>
        </thead>
        <tbody>';
        for($x=0;$x<count($tareas);$x++){
        $codigoHTML.='
            <tr>
                <td>'.$tareas[$x][0].'</td>
                <td>'.$tareas[$x][2].'</td>
                <td>'.$tareas[$x][4].'</td>
                <td>'.$tareas[$x][5].'</td>
            </tr>';
        }
        $codigoHTML.='
        </tbody>
        </table>
        </div>
    </div>
</body>

</html>';

$dompdf=new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf ->set_paper("A4", "portrait");
$dompdf->load_html(utf8_encode($codigoHTML));
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream('Cotizacion',array("Attachment" => 0));
?>
