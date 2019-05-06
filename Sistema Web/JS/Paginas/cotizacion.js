function habilitarCheck(){
			
if( $('#SF_checkDF').prop('disabled') || $('#SF_checkPF').prop('disabled') || $('#SF_checkCF').prop('disabled') || $('#SF_checkBF').prop('disabled')){
            /* campos de sistema de freno */
            $('#SF_checkDF').prop('disabled',false);
            $('#SF_checkPF').prop('disabled',false);
            $('#SF_checkCF').prop('disabled',false);
            $('#SF_checkBF').prop('disabled',false);
            
            if($('#SF_checkDF').is(':checked')){
                        $('#SF_discoFr').prop('disabled',false);
            }
            if($('#SF_checkPF').is(':checked')){
                        $('#SF_pastillaFr').prop('disabled',false);
            }
            if($('#SF_checkCF').is(':checked')){
                        $('#SF_caliperFR').prop('disabled',false);
            }
            if($('#SF_checkBF').is(':checked')){
                        $('#SF_bombaFR').prop('disabled',false);
            }
            
            /* campos de combustion y escape */
            $('#CE_checkBB').prop('disabled',false);
            $('#CE_checkBI').prop('disabled',false);
            $('#CE_checkC').prop('disabled',false);
            $('#CE_checkY').prop('disabled',false);
            
            if($('#CE_checkBB').is(':checked')){
                        $('#CE_bombaBe').prop('disabled',false);
            }
            if($('#CE_checkBI').is(':checked')){
                        $('#CE_bombaIny').prop('disabled',false);
            }
            if($('#CE_checkC').is(':checked')){
                        $('#CE_carburador').prop('disabled',false);
            }
            if($('#CE_checkY').is(':checked')){
                        $('#CE_inyector').prop('disabled',false);
            }
            /*  campos de suspension y direccion */
            $('#SD_checkA').prop('disabled',false);
            $('#SD_checkB').prop('disabled',false);
            $('#SD_checkBDH').prop('disabled',false);
            $('#SD_checkCD').prop('disabled',false);
            $('#SD_checkFCD').prop('disabled',false);
            $('#SD_checkM').prop('disabled',false);
            $('#SD_checkTD').prop('disabled',false);
            
            if($('#SD_checkA').is(':checked')){
                        $('#SD_amorti').prop('disabled',false);
            }
            if($('#SD_checkB').is(':checked')){
                        $('#SD_bandeja').prop('disabled',false);
            }
            if($('#SD_checkBDH').is(':checked')){
                        $('#SD_bombaDH').prop('disabled',false);
            }
            if($('#SD_checkCD').is(':checked')){
                        $('#SD_cremalleraD').prop('disabled',false);
            }
            if($('#SD_checkFCD').is(':checked')){
                        $('#SD_fuelleCD').prop('disabled',false);
            }
            if($('#SD_checkM').is(':checked')){
                        $('#SD_munones').prop('disabled',false);
            }
            if($('#SD_checkTD').is(':checked')){
                        $('#SD_terminalD').prop('disabled',false);
            }
            /* campos de rodamientos y retenes */
            $('#RR_checkKR').prop('disabled',false);
            $('#RR_checkReCC').prop('disabled',false);
            $('#RR_checkReC').prop('disabled',false);
            $('#RR_checkReR').prop('disabled',false);
            $('#RR_checkRoCC').prop('disabled',false);
            $('#RR_checkRoD').prop('disabled',false);
            $('#RR_checkRoE').prop('disabled',false);
            
            if($('#RR_checkKR').is(':checked')){
                        $('#RR_kitRoda').prop('disabled',false);
            }
            if($('#RR_checkReCC').is(':checked')){
                        $('#RR_retenCajaC').prop('disabled',false);
            }
            if($('#RR_checkReC').is(':checked')){
                        $('#RR_retenCig').prop('disabled',false);
            }
            if($('#RR_checkReR').is(':checked')){
                        $('#RR_retenR').prop('disabled',false);
            }
            if($('#RR_checkRoCC').is(':checked')){
                        $('#RR_rodaCC').prop('disabled',false);
            }
            if($('#RR_checkRoD').is(':checked')){
                        $('#RR_rodaD').prop('disabled',false);
            }
            if($('#RR_checkRoE').is(':checked')){
                        $('#RR_rodaE').prop('disabled',false);
            }
            /* calefaccion y ventilacion */
            $('#CV_checkBA').prop('disabled',false);
            $('#CV_checkCAA').prop('disabled',false);
            $('#CV_checkRC').prop('disabled',false);
            $('#CV_checkRM').prop('disabled',false);
            $('#CV_checkM').prop('disabled',false);
            $('#CV_checkTP').prop('disabled',false);
            
            if($('#CV_checkBA').is(':checked')){
                        $('#CV_bombaA').prop('disabled',false);
            }
            if($('#CV_checkCAA').is(':checked')){
                        $('#CV_condensaAA').prop('disabled',false);
            }
            if($('#CV_checkRC').is(':checked')){
                        $('#CV_radiadorC').prop('disabled',false);
            }
            if($('#CV_checkRM').is(':checked')){
                        $('#CV_radiadorM').prop('disabled',false);
            }
            if($('#CV_checkM').is(':checked')){
                        $('#CV_manguera').prop('disabled',false);
            }
            if($('#CV_checkTP').is(':checked')){
                        $('#CV_tapaR').prop('disabled',false);
            }
            /* espejos y cristales */
            $('#EC_checkERE').prop('disabled',false);
            $('#EC_checkERI').prop('disabled',false);
            $('#EC_checkP').prop('disabled',false);
            $('#EC_checkV').prop('disabled',false);
            $('#EC_checkFD').prop('disabled',false);
            $('#EC_checkFT').prop('disabled',false);
            
            if($('#EC_checkERE').is(':checked')){
                        $('#EC_espejoREx').prop('disabled',false);
            }
            if($('#EC_checkERI').is(':checked')){
                        $('#EC_espejoRIn').prop('disabled',false);
            }
            if($('#EC_checkP').is(':checked')){
                        $('#EC_Parabri').prop('disabled',false);
            }
            if($('#EC_checkV').is(':checked')){
                        $('#EC_ventana').prop('disabled',false);
            }
            if($('#EC_checkFD').is(':checked')){
                        $('#EC_focoD').prop('disabled',false);
            }
            if($('#EC_checkFT').is(':checked')){
                        $('#EC_focoT').prop('disabled',false);
            }
}
else{
            
            /* campos de sistema de freno */
            $('#SF_checkDF').prop('disabled',true);
            $('#SF_checkPF').prop('disabled',true);
            $('#SF_checkCF').prop('disabled',true);
            $('#SF_checkBF').prop('disabled',true);
            
            $('#SF_discoFr').prop('disabled',true);
            $('#SF_pastillaFr').prop('disabled',true);
            $('#SF_caliperFR').prop('disabled',true);
            $('#SF_bombaFR').prop('disabled',true);
            
            /* campos de combustion y escape */
            $('#CE_checkBB').prop('disabled',true);
            $('#CE_checkBI').prop('disabled',true);
            $('#CE_checkC').prop('disabled',true);
            $('#CE_checkY').prop('disabled',true);
            
            $('#CE_bombaBe').prop('disabled',true);
            $('#CE_bombaIny').prop('disabled',true);
            $('#CE_carburador').prop('disabled',true);
            $('#CE_inyector').prop('disabled',true);
            
            /*  campos de suspension y direccion */
            $('#SD_checkA').prop('disabled',true);
            $('#SD_checkB').prop('disabled',true);
            $('#SD_checkBDH').prop('disabled',true);
            $('#SD_checkCD').prop('disabled',true);
            $('#SD_checkFCD').prop('disabled',true);
            $('#SD_checkM').prop('disabled',true);
            $('#SD_checkTD').prop('disabled',true);
            
            $('#SD_amorti').prop('disabled',true);
            $('#SD_bandeja').prop('disabled',true);
            $('#SD_bombaDH').prop('disabled',true);
            $('#SD_cremalleraD').prop('disabled',true);
            $('#SD_fuelleCD').prop('disabled',true);
            $('#SD_munones').prop('disabled',true);
            $('#SD_terminalD').prop('disabled',true);
            /* campos de rodamientos y retenes */
            $('#RR_checkKR').prop('disabled',true);
            $('#RR_checkReCC').prop('disabled',true);
            $('#RR_checkReC').prop('disabled',true);
            $('#RR_checkReR').prop('disabled',true);
            $('#RR_checkRoCC').prop('disabled',true);
            $('#RR_checkRoD').prop('disabled',true);
            $('#RR_checkRoE').prop('disabled',true);
            
            $('#RR_kitRoda').prop('disabled',true);
            $('#RR_retenCajaC').prop('disabled',true);
            $('#RR_retenCig').prop('disabled',true);
            $('#RR_retenR').prop('disabled',true);
            $('#RR_rodaCC').prop('disabled',true);
            $('#RR_rodaD').prop('disabled',true);
            $('#RR_rodaE').prop('disabled',true);
            /* calefaccion y ventilacion */
            $('#CV_checkBA').prop('disabled',true);
            $('#CV_checkCAA').prop('disabled',true);
            $('#CV_checkRC').prop('disabled',true);
            $('#CV_checkRM').prop('disabled',true);
            $('#CV_checkM').prop('disabled',true);
            $('#CV_checkTP').prop('disabled',true);
            
            $('#CV_bombaA').prop('disabled',true);
            $('#CV_condensaAA').prop('disabled',true);
            $('#CV_radiadorC').prop('disabled',true);
            $('#CV_radiadorM').prop('disabled',true);
            $('#CV_manguera').prop('disabled',true);
            $('#CV_tapaR').prop('disabled',true);
            /* espejos y cristales */
            $('#EC_checkERE').prop('disabled',true);
            $('#EC_checkERI').prop('disabled',true);
            $('#EC_checkP').prop('disabled',true);
            $('#EC_checkV').prop('disabled',true);
            $('#EC_checkFD').prop('disabled',true);
            $('#EC_checkFT').prop('disabled',true);
            
            $('#EC_espejoREx').prop('disabled',true);
            $('#EC_espejoRIn').prop('disabled',true);
            $('#EC_Parabri').prop('disabled',true);
            $('#EC_ventana').prop('disabled',true);
            $('#EC_focoD').prop('disabled',true);
            $('#EC_focoT').prop('disabled',true);
}
}
		
		
            
function cargarClienteAU(str)
{
var xmlhttp;
 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        document.getElementById("cargarAU").innerHTML=xmlhttp.responseText;//ES EL ID DEL DIV EN EL CLUAL SE VA A CARGAR LA PAGINA
    }
}
xmlhttp.open("POST","PHP/Buscar/buscar_cliente.php",true);//ES LA PAGINA QUE SE VA A CAGAR EN EL DIV
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str+"&r=2");//ENVIA DATOS A LA PAGINA
}

function cargaVehiculo(str)
{
var xmlhttp;
 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        document.getElementById("vehiculo").innerHTML=xmlhttp.responseText;//ES EL ID DEL DIV EN EL CLUAL SE VA A CARGAR LA PAGINA
    }
}
xmlhttp.open("POST","PHP/Buscar/buscar_vehiculo.php",true);//ES LA PAGINA QUE SE VA A CAGAR EN EL DIV
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str+"&r=3");//ENVIA DATOS A LA PAGINA
}

function cargarClienteMO(str)
{
var xmlhttp;
 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        document.getElementById("cargarMO").innerHTML=xmlhttp.responseText;//ES EL ID DEL DIV EN EL CLUAL SE VA A CARGAR LA PAGINA
    }
}
xmlhttp.open("POST","PHP/Buscar/buscar_cliente.php",true);//ES LA PAGINA QUE SE VA A CAGAR EN EL DIV
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str+"&r=2");//ENVIA DATOS A LA PAGINA
}

function cargarClienteCA(str)
{
var xmlhttp;
 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        document.getElementById("cargarCA").innerHTML=xmlhttp.responseText;//ES EL ID DEL DIV EN EL CLUAL SE VA A CARGAR LA PAGINA
    }
}
xmlhttp.open("POST","PHP/Buscar/buscar_cliente.php",true);//ES LA PAGINA QUE SE VA A CAGAR EN EL DIV
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str+"&r=2");//ENVIA DATOS A LA PAGINA
}