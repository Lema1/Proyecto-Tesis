<?php
require_once('../../DB/db_tareas.php');
require_once('../../DB/db_flujoTrabajo.php');
require_once('../../DB/db_cotizacion.php');
require_once('../../DB/db_vehiculos.php');
require_once('../../DB/db_espacios.php');
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set("America/Santiago");
session_start();

$codigoTarea = $_GET['cod'];
$coti= $_GET['coti'];
$tipo = $_GET['tipo'];
$p=0;
$x=0;
$f=0;
if($codigoTarea){
    
    $finalizr = Tareas::FinalizarTarea($codigoTarea);
    //echo 'tarea finalizada </br>';
    //echo $codigoTarea.' '.$coti.' '.$tipo;
    
    if($finalizr){
        //desabolladura
        if($tipo==1){
            $taDesa = Tareas::comprobarTareaDesa($coti);
            foreach($taDesa as $td){
                if($td[1]==1||$td[1]==0){
                    $p=$p+1;
                    header('refresh:0; url=../../FlujoProcesos.php');
                    //echo 'quedan tareas pendientes';
                }
            }
            if($p==0){
                $tareMeca = Tareas::comprobarTareaMeca($coti);
                $tarePint = Tareas::comprobarTareaPint($coti);
                
                if($tareMeca){
                    $updtFlujo = FlujoTrabajo::moverFlujo(3,$coti);
                    echo '<script language="javascript">alert("Vehiculo Cambiado a Mecanica");</script>';
                    header('refresh:0; url=enviarmail.php?coti='.$coti.'&cambio=1');
                    //echo 'cambio a flujo mecanica';
                }
                elseif($tarePint){
                    $updtFlujo = FlujoTrabajo::moverFlujo(2,$coti);
                    echo '<script language="javascript">alert("Vehiculo Cambiado a Pintura");</script>';
                    header('refresh:0; url=enviarmail.php?coti='.$coti.'&cambio=2');
                    //echo 'cambio flujo pintura';
                }
                else{
                    $updtFlujo = FlujoTrabajo::moverFlujo(4,$coti);
                    header('refresh:0; url=enviarmail.php?coti='.$coti.'&cambio=3');
                }
            }
        }
        //Mecanica
        elseif($tipo==3){
            $taMeca = Tareas::comprobarTareaMeca($coti);
            
            foreach($taMeca as $tm){
                if($tm[1]==1||$tm[1]==0){
                    $x=$x+1;
                    header('refresh:0; url=../../FlujoProcesos.php');
                    //echo 'quedan tareas pendientes';
                }
            }
            if($x==0){
                $tarePint = Tareas::comprobarTareaPint($coti);
                
                if($tarePint){
                    $updtFlujo = FlujoTrabajo::moverFlujo(2,$coti);
                    header('refresh:0; url=enviarmail.php?coti='.$coti.'&cambio=4');
                    //echo 'cambio flujo pintura';
                }
                else{
                    $updtFlujo = FlujoTrabajo::moverFlujo(4,$coti);
                    header('refresh:0; url=enviarmail.php?coti='.$coti.'&cambio=5');
                }
            }
        }
        //pintura
        elseif($tipo==2){
            $taPint = Tareas::comprobarTareaPint($coti);
            
            foreach($taPint as $tp){
                if($tp[1]==1||$tp[1]==0){
                    $f=$f+1;
                    header('refresh:0; url=../../FlujoProcesos.php');
                    //echo 'quedan tareas pendientes';
                }
            }
            if($f==0){
                $updtFlujo = FlujoTrabajo::moverFlujo(4,$coti);
                header('refresh:0; url=enviarmail.php?coti='.$coti.'&cambio=6');
                //echo 'cambio flujo limpieza';
                
            }
        }
    }
}

if($tipo==4){
    $updtFlujo = FlujoTrabajo::moverFlujo(5,$coti);
    if($updtFlujo){
        header('refresh:0; url=enviarmail.php?coti='.$coti.'&cambio=7');
        //echo 'cambio flujo a espera de entrega';
    }
}

if($tipo==5){
    echo 'entrega de vehiculo';
    // cambiar los estados de todo al entregar el vehiculo
    
    $updtFlujo = FlujoTrabajo::moverFlujo(6,$coti);
    if($updtFlujo){
        $vehi = $_GET['vehi'];
        $updtCoti = Cotizacion::uptadteCotizacion(3,$coti);
        $updtVegi = Vehiculo::uptadteEstado($vehi,3);
        //luego de modificados los estados se saca el vehiculo del espacio
        
        $espacio = Espacios::buscarEspacioPatente($vehi);
        
        $entregar = Espacios::updateEspacio($espacio,$vehi,2,$coti);
    

        if($entregar == 1){
            
            header('refresh:0; url=enviarmail.php?coti='.$coti.'&cambio=8');
        }
        if($entregar == 2)
        {
            echo 'false';
        }
        
        echo 'vehiculo entregado';
    }
}

?>

