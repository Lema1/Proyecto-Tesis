<?php
require_once('../../../DB/db_danosCarroceria.php');
require_once('../../../DB/db_danosMecanica.php');
require_once('../../../DB/db_cotizacion.php');
require_once('../../../DB/db_imagenes.php');
require_once('../../../DB/db_tareas.php');
require_once('../../../DB/db_repuestos.php');
date_default_timezone_set("America/Santiago");
error_reporting(E_ALL ^ E_NOTICE);

$vehiculo = $_POST['vehiculo'];
$cliente = $_POST['cliente'];
$fecha = date("Y-m-d h:i:s");
$observaciones = "obs";
$repMeca = $_POST['mecanica'];
$repCarro = $_POST['carroceria'];

?>
<script languaje='javascript'>//funcion que abre una pestaña con la cotizacion
    function cargar(coti){
        window.open('../../PDF/nuevoPDF.php?coti='+coti,'_blank');
    }
</script>
<?php

/* cotizacion carroceria */
//cambiar el tema de los focos !!!!!
if($cliente){
    if($vehiculo){
        if($repCarro || $repMeca){
            $ncoti = Cotizacion::nuevaCotizacion($vehiculo,$cliente,$fecha);
        }
        else{
            ECHO 'ERROR';
            //ERROR
        }
        // SELECCIONO CARROCERIA - SE EVALUA QUE FUE SELECCIONADO
        if($repCarro){
            echo 'selec carro</br>';
            // PARTE DELANTERA
            //PARACHOQUE DELANTERO
            if($_POST['PDPD_checkD'] || $_POST['PDPD_checkP']){
                if($_POST['PDPD_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(1,$ncoti,$_POST['PDPD_desabolla'],1);
                }
                if($_POST['PDPD_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(1,$ncoti,$_POST['PDPD_pintura'],2);
                }
                Imagen('imgPDPD',$vehiculo,$ncoti);
            }
            //CAPO
            if($_POST['PDC_checkD'] || $_POST['PDC_checkP']){
                if($_POST['PDC_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(3,$ncoti,$_POST['PDC_desabolla'],1);
                }
                if($_POST['PDC_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(3,$ncoti,$_POST['PDC_pintura'],2);
                }
                Imagen('imgPDC',$vehiculo,$ncoti);
            }
            //MASCARA
            if($_POST['PDM_checkD'] || $_POST['PDM_checkP']){
                if($_POST['PDM_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(2,$ncoti,$_POST['PDM_desabolla'],1);
                }
                if($_POST['PDM_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(2,$ncoti,$_POST['PDM_pintura'],2);
                }
                Imagen('imgPDM',$vehiculo,$ncoti);
            }
            //FIN PARTE DELANTERA
            //LATERAL DERECHO
            //COSTADO TRASERO
            if($_POST['LDCT_checkD'] || $_POST['LDCT_checkP']){
                if($_POST['LDCT_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(8,$ncoti,$_POST['LDCT_desabolla'],1);
                }
                if($_POST['LDCT_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(8,$ncoti,$_POST['LDCT_pintura'],2);
                }
                
                Imagen('imgLDCT',$vehiculo,$ncoti);
            }
            //PUERTA 2
            if($_POST['LDP2_checkD'] || $_POST['LDP2_checkP']){
                if($_POST['LDP2_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(7,$ncoti,$_POST['LDP2_desabolla'],1);
                }
                if($_POST['LDP2_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(7,$ncoti,$_POST['LDP2_pintura'],2);
                }
                
                Imagen('imgLDP2',$vehiculo,$ncoti);
            }
            //PUERTA 1
            if($_POST['LDP1_checkD'] || $_POST['LDP1_checkP']){
                if($_POST['LDP1_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(6,$ncoti,$_POST['LDP1_desabolla'],1);
                }
                if($_POST['LDP1_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(6,$ncoti,$_POST['LDP1_pintura'],2);
                }
                
                Imagen('imgLDP1',$vehiculo,$ncoti);
            }
            //COSTADO DELANTERO
            if($_POST['LDCD_checkD'] || $_POST['selLDCDpintar']){
                if($_POST['LICD_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(9,$ncoti,$_POST['LICD_desabolla'],1);
                }
                if($_POST['LICD_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(9,$ncoti,$_POST['LICD_pintura'],2);
                }
                
                Imagen('imgLDCD',$vehiculo,$ncoti);
            }
            
            //FIN LATERAL DERECHO
            //LATERAL IZQUIERDO
            //COSTADO DELANTERO
            if($_POST['LICD_checkD'] || $_POST['LICD_checkP']){
                if($_POST['LICD_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(12,$ncoti,$_POST['LICD_desabolla'],1);
                }
                if($_POST['LICD_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(12,$ncoti,$_POST['LICD_pintura'],2);
                }
                
                Imagen('imgLICD',$vehiculo,$ncoti);
            }
            //PUERTA 1 
            if($_POST['LIP1_checkD'] || $_POST['LIP1_checkP']){
                if($_POST['LIP1_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(10,$ncoti,$_POST['LIP1_desabolla'],1);
                }
                if($_POST['LIP1_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(10,$ncoti,$_POST['LIP1_pintura'],2);
                }
                Imagen('imgLIP1',$vehiculo,$ncoti);
            }
            //PUERTA 2
            if($_POST['LIP2_checkD'] || $_POST['LIP2_checkP']){
                if($_POST['LIP2_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(11,$ncoti,$_POST['LIP2_desabolla'],1);
                }
                if($_POST['LIP2_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(11,$ncoti,$_POST['LIP2_pintura'],2);
                }
                Imagen('imgLIP2',$vehiculo,$ncoti);
            }
            //COSTADO TRASERO
            if($_POST['LICT_checkD'] || $_POST['LICT_checkP']){
                if($_POST['LICT_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(13,$ncoti,$_POST['LICT_desabolla'],1);
                }
                if($_POST['LICT_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(13,$ncoti,$_POST['LICT_pintura'],2);
                }
                Imagen('imgLICT',$vehiculo,$ncoti);
            }
            
            //FIN LATERAL IZQUIERDO
            //PARTE TRASERA
            //PARACHOQUE
            if($_POST['PTP_checkD'] || $_POST['PTP_checkP']){
                if($_POST['PTP_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(4,$ncoti,$_POST['PTP_desabolla'],1);
                }
                if($_POST['PTP_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(4,$ncoti,$_POST['PTP_pintura'],2);
                }
                Imagen('imgPTP',$vehiculo,$ncoti);
            }
            //MALETERO
            if($_POST['PTM_checkD'] || $_POST['PTM_checkP']){
                if($_POST['PTM_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(5,$ncoti,$_POST['PTP_desabolla'],1);
                }
                if($_POST['PTM_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(5,$ncoti,$_POST['PTM_pintura'],2);
                }
                Imagen('imgPTM',$vehiculo,$ncoti);
            }
            //FIN PARTE TRASERA
            //PARTE ARRIBA
            //TECHO
            if($_POST['PST_checkD'] || $_POST['PST_checkP']){
                if($_POST['PST_desabolla']){
                    $desabollar = DanosCarroceria::agregarDanos(14,$ncoti,$_POST['PST_desabolla'],1);
                }
                if($_POST['PST_pintura']){
                    $pintar = DanosCarroceria::agregarDanos(14,$ncoti,$_POST['PST_pintura'],2);
                }
                Imagen('imgPAT',$vehiculo,$ncoti);
            }
            //FIN PARTE ARRIBA
        }
        if($repMeca){
            echo 'selec mecanica</br>';
            //SE VERIFICA QUE SE SELECCIONO DEL FORMULARIO
            //SISTEMA DE FRENOS
            if($_POST['SF_checkDF']){
                if($_POST['SF_discoFr']){
                    $mecanica = DanosMecanica::agregarDanos(15,$ncoti,$_POST['SF_discoFr']);
                    $repuesto = Repuestos::agregarRepu('Disco Freno',$mecanica);
                }
            }
            if($_POST['SF_checkPF']){
                if($_POST['SF_pastillaFr']){
                    $mecanica = DanosMecanica::agregarDanos(15,$ncoti,$_POST['SF_pastillaFr']);
                    $repuesto = Repuestos::agregarRepu('Pastillas de freno',$mecanica);
                }
            }
            if($_POST['SF_checkCF']){
                if($_POST['SF_caliperFR']){
                    $mecanica = DanosMecanica::agregarDanos(15,$ncoti,$_POST['SF_caliperFR']);
                    $repuesto = Repuestos::agregarRepu('Calipers de freno',$mecanica);
                }
            }
            if($_POST['SF_checkBF']){
                if($_POST['SF_bombaFR']){
                    $mecanica = DanosMecanica::agregarDanos(15,$ncoti,$_POST['SF_bombaFR']);
                    $repuesto = Repuestos::agregarRepu('Bomba freno',$mecanica);
                }
            }
            //COMBUSTION Y ESCAPE
            if($_POST['CE_checkBB']){
                if($_POST['CE_bombaBe']){
                    $mecanica = DanosMecanica::agregarDanos(16,$ncoti,$_POST['CE_bombaBe']);
                    $repuesto = Repuestos::agregarRepu('Bomba de bencina',$mecanica);
                }
            }
            if($_POST['CE_checkBI']){
                if($_POST['CE_bombaIny']){
                    $mecanica = DanosMecanica::agregarDanos(16,$ncoti,$_POST['CE_bombaIny']);
                    $repuesto = Repuestos::agregarRepu('Bomba inyectora',$mecanica);
                }
            }
            if($_POST['CE_checkC']){
                if($_POST['CE_carburador']){
                    $mecanica = DanosMecanica::agregarDanos(16,$ncoti,$_POST['CE_carburador']);
                    $repuesto = Repuestos::agregarRepu('Carburador',$mecanica);
                }
            }
            if($_POST['CE_checkY']){
                if($_POST['CE_inyector']){
                    $mecanica = DanosMecanica::agregarDanos(16,$ncoti,$_POST['CE_inyector']);
                    $repuesto = Repuestos::agregarRepu('Inyectores',$mecanica);
                }
            }
            //SUSPENSION Y DIRECCION
            if($_POST['SD_checkA']){
                if($_POST['SD_amorti']){
                    $mecanica = DanosMecanica::agregarDanos(17,$ncoti,$_POST['SD_amorti']);
                    $repuesto = Repuestos::agregarRepu('Amortiguadores',$mecanica);
                }
            }
            if($_POST['SD_checkB']){
                if($_POST['SD_bandeja']){
                    $mecanica = DanosMecanica::agregarDanos(17,$ncoti,$_POST['SD_bandeja']);
                    $repuesto = Repuestos::agregarRepu('Bandejas',$mecanica);
                }
            }
            if($_POST['SD_checkBDH']){
                if($_POST['SD_bombaDH']){
                    $mecanica = DanosMecanica::agregarDanos(17,$ncoti,$_POST['SD_bombaDH']);
                    $repuesto = Repuestos::agregarRepu('Bomba dirección hidráulica',$mecanica);
                }
            }
            if($_POST['SD_checkCD']){
                if($_POST['SD_cremalleraD']){
                    $mecanica = DanosMecanica::agregarDanos(17,$ncoti,$_POST['SD_cremalleraD']);
                    $repuesto = Repuestos::agregarRepu('Cremalleras de dirección',$mecanica);
                }
            }
            if($_POST['SD_checkFCD']){
                if($_POST['SD_fuelleCD']){
                    $mecanica = DanosMecanica::agregarDanos(17,$ncoti,$_POST['SD_fuelleCD']);
                    $repuesto = Repuestos::agregarRepu('Fuelles cremalleras de dirección',$mecanica);
                }
            }
            if($_POST['SD_checkM']){
                if($_POST['CE_bombaBe']){
                    $mecanica = DanosMecanica::agregarDanos(17,$ncoti,$_POST['CE_bombaBe']);
                    $repuesto = Repuestos::agregarRepu('Muñones',$mecanica);
                }
            }
            if($_POST['SD_checkTD']){
                if($_POST['SD_terminalD']){
                    $mecanica = DanosMecanica::agregarDanos(17,$ncoti,$_POST['SD_terminalD']);
                    $repuesto = Repuestos::agregarRepu('Terminales de dirección',$mecanica);
                }
            }
            //RODAMIENTO Y RETENES
            if($_POST['RR_checkKR']){
                if($_POST['RR_kitRoda']){
                    $mecanica = DanosMecanica::agregarDanos(18,$ncoti,$_POST['RR_kitRoda']);
                    $repuesto = Repuestos::agregarRepu('Kit de rodamiento de rueda',$mecanica);
                }
            }
            if($_POST['RR_checkReCC']){
                if($_POST['RR_retenCajaC']){
                    $mecanica = DanosMecanica::agregarDanos(18,$ncoti,$_POST['RR_retenCajaC']);
                    $repuesto = Repuestos::agregarRepu('Retén caja cambios',$mecanica);
                }
            }
            if($_POST['RR_checkReC']){
                if($_POST['RR_retenCig']){
                    $mecanica = DanosMecanica::agregarDanos(18,$ncoti,$_POST['RR_retenCig']);
                    $repuesto = Repuestos::agregarRepu('Retén de cigüeñal',$mecanica);
                }
            }
            if($_POST['RR_checkReR']){
                if($_POST['RR_retenR']){
                    $mecanica = DanosMecanica::agregarDanos(18,$ncoti,$_POST['RR_retenR']);
                    $repuesto = Repuestos::agregarRepu('Retén de rueda',$mecanica);
                }
            }
            if($_POST['RR_checkRoCC']){
                if($_POST['RR_rodaCC']){
                    $mecanica = DanosMecanica::agregarDanos(18,$ncoti,$_POST['RR_rodaCC']);
                    $repuesto = Repuestos::agregarRepu('Rodamiento caja de cambio',$mecanica);
                }
            }
            if($_POST['RR_checkRoD']){
                if($_POST['RR_rodaD']){
                    $mecanica = DanosMecanica::agregarDanos(18,$ncoti,$_POST['RR_rodaD']);
                    $repuesto = Repuestos::agregarRepu('Rodamiento de dirección',$mecanica);
                }
            }
            if($_POST['RR_checkRoE']){
                if($_POST['RR_rodaE']){
                    $mecanica = DanosMecanica::agregarDanos(18,$ncoti,$_POST['RR_rodaE']);
                    $repuesto = Repuestos::agregarRepu('Rodamiento de embrague',$mecanica);
                }
            }
            //CALEFACCION Y VENTILACION
            if($_POST['CV_checkBA']){
                if($_POST['CV_bombaA']){
                    $mecanica = DanosMecanica::agregarDanos(19,$ncoti,$_POST['CV_bombaA']);
                    $repuesto = Repuestos::agregarRepu('Bomba de agua',$mecanica);
                }
            }
            if($_POST['CV_checkCAA']){
                if($_POST['CV_condensaAA']){
                    $mecanica = DanosMecanica::agregarDanos(19,$ncoti,$_POST['CV_condensaAA']);
                    $repuesto = Repuestos::agregarRepu('Condensador de aire acondicionado',$mecanica);
                }
            }
            if($_POST['CV_checkM']){
                if($_POST['CV_manguera']){
                    $mecanica = DanosMecanica::agregarDanos(19,$ncoti,$_POST['CV_manguera']);
                    $repuesto = Repuestos::agregarRepu('Mangueras',$mecanica);
                }
            }
            if($_POST['CV_checkRC']){
                if($_POST['CV_radiadorC']){
                    $mecanica = DanosMecanica::agregarDanos(19,$ncoti,$_POST['CV_radiadorC']);
                    $repuesto = Repuestos::agregarRepu('Radiador calefacción',$mecanica);
                }
            }
            if($_POST['CV_checkRM']){
                if($_POST['CV_radiadorM']){
                    $mecanica = DanosMecanica::agregarDanos(19,$ncoti,$_POST['CV_radiadorM']);
                    $repuesto = Repuestos::agregarRepu('Radiador motor',$mecanica);
                }
            }
            if($_POST['CV_checkTP']){
                if($_POST['CV_tapaR']){
                    $mecanica = DanosMecanica::agregarDanos(19,$ncoti,$_POST['CV_tapaR']);
                    $repuesto = Repuestos::agregarRepu('Tapa Radiador',$mecanica);
                }
            }
            //ESPEJOS Y CRISTALES
            if($_POST['EC_checkERE']){
                if($_POST['EC_espejoREx']){
                    $mecanica = DanosMecanica::agregarDanos(20,$ncoti,$_POST['EC_espejoREx']);
                    $repuesto = Repuestos::agregarRepu('Espejo retrovisor exterior',$mecanica);
                }
            }
            if($_POST['EC_checkERI']){
                if($_POST['EC_espejoRIn']){
                    $mecanica = DanosMecanica::agregarDanos(20,$ncoti,$_POST['EC_espejoRIn']);
                    $repuesto = Repuestos::agregarRepu('Espejo retrovisor interior',$mecanica);
                }
            }
            if($_POST['EC_checkP']){
                if($_POST['EC_Parabri']){
                    $mecanica = DanosMecanica::agregarDanos(20,$ncoti,$_POST['EC_Parabri']);
                    $repuesto = Repuestos::agregarRepu('Parabrisas',$mecanica);
                }
            }
            if($_POST['EC_checkV']){
                if($_POST['EC_ventana']){
                    $mecanica = DanosMecanica::agregarDanos(20,$ncoti,$_POST['EC_ventana']);
                    $repuesto = Repuestos::agregarRepu('Ventanas',$mecanica);
                }
            }
            if($_POST['EC_checkFD']){
                if($_POST['EC_focoD']){
                    $mecanica = DanosMecanica::agregarDanos(20,$ncoti,$_POST['EC_focoD']);
                    $repuesto = Repuestos::agregarRepu('Foco Delantero',$mecanica);
                }
            }
            if($_POST['EC_checkFT']){
                if($_POST['EC_focoT']){
                    $mecanica = DanosMecanica::agregarDanos(20,$ncoti,$_POST['EC_focoT']);
                    $repuesto = Repuestos::agregarRepu('Foco Trasero',$mecanica);
                }
            }
        }
        echo "<script languaje='javascript'>cargar($ncoti);</script>";//se llama a la funcion js para que abra una pestaña con el pdf de la cotizacion
            header("refresh:1; url=../../../cotizacion.php");
    }else{
         header("refresh:1; url=../../../cotizacion.php"); 
    }
}else{
    header("refresh:2; url=../../../cotizacion.php");
}

function Imagen($imgParte,$vehiculo,$ncoti){
    $cantidad= count($_FILES[$imgParte]["tmp_name"]); //cuenta la cantidad de fotos

    for($i = 0; $i < $cantidad; $i++) //recorre la cantidad de fotos contadas y las agrega
    {
    $nombre = $_FILES[$imgParte]['name'][$i];
    $tipo = $_FILES[$imgParte]['type'][$i];
    $ruta_provisional = $_FILES[$imgParte]['tmp_name'][$i];
    $size = $_FILES[$imgParte]['size'][$i];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $destino = "../../../Fotos_Vehiculo/$vehiculo/$ncoti"; // ruta para guardar las imagenes
    $destinoDB = "Fotos_Vehiculo/$vehiculo/$ncoti"; // ruta para guardar en la db
    
        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') // valida que sea una imagen
        {
          echo "Error, el archivo no es una imagen"; 
        }
        else if ($size > 1024*1024)
        {
          echo "Error, el tamaño máximo permitido es un 1MB";
        }
        else if ($width > 2000 || $height > 2000)
        {
            echo "Error la anchura y la altura maxima permitida es 500px";
        }
        else if($width < 60 || $height < 60)
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
            $imagen = Imagenes::agregarImagen($destinoDB,$nombre,$vehiculo); // agrega la ruta de las fotos a la db
        }
    }
}

?>