<?php
require('../../fpdf/fpdf.php');
require_once('../../Conexiones/con-SV-BI.php');
date_default_timezone_set("America/Santiago");

$fechaD = $_POST['fechaD'];
$fechaH = $_POST['fechaH'];
echo $fechaD.' | '.$fechaH;
$creacion = date("y-m-d");
echo ' '.$creacion;
class PDF extends FPDF
{
// Page header
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

function guardarPDF($nombre,$fecha,$tipo){
    $conBI = new ConexionBI();
    $sql = $conBI->prepare("CALL nuevo_reporte(?,?,?)");
    $sql->bindParam('1', $nombre);
    $sql->bindParam('2', $fecha);
    $sql->bindParam('3', $tipo);
    
    if($sql->execute()){
        return true;
    }
    else{
        return null;
    }
}
//recepcion de datos!!!

$char1 = $_POST['char1'];

//echo '<img src="'.$char1.'">';

$char2 = $_POST['char2'];

//echo '<img src="'.$char2.'">';

$char3 = $_POST['char3'];

//echo '<img src="'.$char3.'">';

const TEMPIMGLOC = 'tempimg.png';
const TEMPIMGLOC2 = 'tempimg2.png';
const TEMPIMGLOC3 = 'tempimg3.png';
//creacion de img mediante dataURI
//Grafico 1
$dataURI    = $char1;
$dataPieces = explode(',',$dataURI);
$encodedImg = $dataPieces[1];
$decodedImg = base64_decode($encodedImg);
// Grafico 2
$dataURI2    = $char2;
$dataPieces2 = explode(',',$dataURI2);
$encodedImg2 = $dataPieces2[1];
$decodedImg2 = base64_decode($encodedImg2);
//grafico 3
$dataURI3    = $char3;
$dataPieces3 = explode(',',$dataURI3);
$encodedImg3 = $dataPieces3[1];
$decodedImg3 = base64_decode($encodedImg3);

//  Check if image was properly decoded
if( $decodedImg!==false )
{
    //  Save image to a temporary location
    if( file_put_contents('tempimg.png',$decodedImg)!==false )
    {
      if( file_put_contents(TEMPIMGLOC2,$decodedImg2)!==false )
      {
      //crear los archivos de reporte y guardar los nombres y las rutas en la db
      if( file_put_contents(TEMPIMGLOC3,$decodedImg3)!==false )
      {
        //  Open new PDF document and print image
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->Image(TEMPIMGLOC);
        $pdf->Image(TEMPIMGLOC2);
        $pdf->AddPage();
        $pdf->Image(TEMPIMGLOC3);
        $pdf->Output('../../Reportes/Rep1/VehRepa-'.$fechaD.'-'.$fechaH.'(cr-'.$creacion.').pdf','F');

        //  Delete image from server
        
        
      }
      }
    }
}
//guardando nuevo reporte
$nom = 'VehRepa-'.$fechaD.'-'.$fechaH.'';

$guardarPDF = guardarPDF($nom,$creacion,1);

if($guardarPDF){
    header("refresh:0; url=../../Dashboard.php");
}
?>