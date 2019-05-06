<?php
require_once('../../DB/conexion.php');
require_once('../../DB/db_cotizacion.php');
require_once('../../DB/db_personas.php');
require_once('../../DB/db_vehiculos.php');
require_once('../../DB/db_danosCarroceria.php');
require_once('../../dompdf/autoload.inc.php');
use Dompdf\Dompdf;
error_reporting(E_ALL ^ E_NOTICE);
$coti = $_GET['coti'];

$datosCoti = Cotizacion::select_coti_cod($coti);

$cliente = Persona::buscarPersona($datosCoti[0][2]);
$vehiculo = Vehiculo::listarVehiculoPatente($datosCoti[0][1]);
$danos = DanosCarroceria::buscarDañosCoti($coti);


$codigoHTML='
<head>
    <title>Cotizacion '.$coti.'</title>
    <meta charset="utf-8">
</head>

<body>
    <div class="coti">
        <div class"numerocoti">
            <h3>Cotzacion '.$coti.'</h3>
        </div>
        <div class="datosPer">
            <h3>Datos Persona</h3>
            <table style="width:100%">
                <thead>
                    <tr> 
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>'.$cliente[0][0].'</td>
                        <td>'.$cliente[0][1].'</td>
                        <td>'.$cliente[0][2].'</td>
                        <td>'.$cliente[0][4].'</td>
                        <td>'.$cliente[0][5].'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="datosVehi">
            <h3>Datos Vehiculo</h3>
            <table style="width:100%">
                <thead>
                    <tr> 
                        <th>Patente</th>
                        <th>Ano</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>'.$vehiculo[0][1].'</td>
                        <td>'.$vehiculo[0][2].'</td>
                        <td>'.$vehiculo[0][3].'</td>
                        <td>'.$vehiculo[0][4].'</td>
                        <td>'.$vehiculo[0][5].'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="reparaciones">
        <h3>Reparaciones</h3>
        <table style="width:100%">
        <thead>
            <tr> 
                <th>Codigo</th>
                <th>Parte Vehiculo</th>
                <th>Categoria</th>
                <th>Costo</th>
            </tr>
        </thead>
        <tbody>';
            for($x=0;$x<count($danos);$x++){
                $codigoHTML.='
                <tr>
                    <td>'.$danos[$x][0].'</td>
                    <td>'.$danos[$x][1].'</td>
                    <td>'.$danos[$x][3].'</td>
                    <td>'.$danos[$x][4].'</td>
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
