<?php
require_once('../../DB/db_espacios.php');
require_once('../../DB/db_danosCarroceria.php');
require_once('../../DB/db_danosMecanica.php');
require_once('../../DB/db_tareas.php');
require_once('../../DB/db_orden_reparacion.php');
require_once('../../DB/db_cotizacion.php');
require_once('../../DB/db_flujoTrabajo.php');
date_default_timezone_set("America/Santiago");
error_reporting(E_ALL ^ E_NOTICE);

$vehi1 = $_POST['vehiculo'];

$cotizacion = $_POST['cotizacion'];
$fecha = date("Y-m-d h:i:s");
//echo $vehiculo.' || '.$cotizacion.'</br>';

$esp_dispoEspera = Espacios::bucarDisponible(0);
$esp_dispoTrabajo = Espacios::bucarDisponible(1);

$danosCarro = DanosCarroceria::buscarDaños($cotizacion);
$danosMeca = DanosMecanica::buscarDaños($cotizacion);

?>
<script languaje='javascript'>
    function cargar(coti){
        window.open('../PDF/ordenPDF.php?coti='+coti,'_blank');
    }
</script>
<?php

if($danosCarro || $danosMeca){
        if($esp_dispoTrabajo){
            for($x=0;$x<count($esp_dispoTrabajo);$x++){
                echo 'asignando a espacio a: '.$esp_dispoTrabajo[$x][0].'</br>';
                $update = Espacios::updateEspacio($esp_dispoTrabajo[$x][0],$vehi1,1,$cotizacion);
                if($update == 1){
                    if($danosCarro){
                        foreach($danosCarro as $dnCA){
                            $nuevaTarea = Tareas::nuevaTareaCarro($dnCA[0],$dnCA[3]);
                        }
                    }
                    if($danosMeca){
                        foreach($danosMeca as $dnME){
                            $nuevaTarea = Tareas::nuevaTareaMeca($dnME[0],3);
                        }
                    }
                    $orden = Orden::nuevaOrden($cotizacion,$fecha);
                    
                    $udpcoti = Cotizacion::uptadteCotizacion(1,$cotizacion);
                    
                    $tareDesa = Tareas::comprobarTareaDesa($cotizacion);
                    $tareMeca = Tareas::comprobarTareaMeca($cotizacion);
                    $tarePint = Tareas::comprobarTareaPint($cotizacion);
                    
                    if($tareDesa){
                        $ingFlujo = FlujoTrabajo::ingresarFlujo($vehi1,$cotizacion,$fecha,1);
                        //si trae algo asignar a flujo estado desabolladura
                    }
                    elseif($tareMeca){
                        $ingFlujo = FlujoTrabajo::ingresarFlujo($vehi1,$cotizacion,$fecha,3);
                    }
                    elseif($tarePint){
                        $ingFlujo = FlujoTrabajo::ingresarFlujo($vehi1,$cotizacion,$fecha,2);
                    }
                    echo '<script language="javascript">alert("Espacio de trabajo asignado");</script>';
                    header('refresh:0; url=../../taller.php');
                    return 1;
                }
            }
        }
        else{
            //echo 'sin espacios disponibles</br>';
            if($esp_dispoEspera){
                //echo 'moviendo a espera';
                for($x=0;$x<count($esp_dispoEspera);$x++){
                //echo 'asignando a espacio a: '.$esp_dispoEspera[$x][0].'</br>';
                $update = Espacios::updateEspacio($esp_dispoEspera[$x][0],$vehi1,1,$cotizacion);
                if($update == 1){
                    $ingFlujo = FlujoTrabajo::ingresarFlujo($vehi1,$cotizacion,$fecha,0);
                    echo '<script language="javascript">alert("Asignado a espacio de espera");</script>';
                    header('refresh:0; url=../../taller.php');
                    return 1;
                }
            }
            }else{
                echo '<script language="javascript">alert("sin espacios para dejar en espera");</script>';
                header('refresh:0; url=../../taller.php');
            }
        }
    
}
else{
    echo '<script language="javascript">alert("Error: cotizacion sin daños");</script>';
    header('refresh:0; url=../../taller.php');
}

?>
