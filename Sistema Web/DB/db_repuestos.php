<?php
include_once('conexion.php');
	
class Repuestos{
	
	private $codigo;
	private $nombre;
	private $danoMeca;
	private $url;
	private $precio;
	
	public function __construct($codigo,$nombre,$danoMeca,$url,$precio){
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->danoMeca= $danoMeca;
		$this->url= $url;
		$this->precio= $precio;
	}
	
	public static function agregarRepu($nombre,$danoMeca){
        $conexion = new Conexion();	
		$sql = $conexion->prepare("CALL insert_repuesto(?,?)");
							   
		$sql->bindParam('1', $nombre);
        $sql->bindParam('2', $danoMeca);
		
		$res = $sql->execute();
		
		if($res){
			return 1;
		}else{
			return 0;
		}
    }
	
	public static function buscarRepuestos($coti){
        $conexion = new Conexion();	
		$sql = $conexion->prepare("CALL select_repuesto_coti(?)");
		$sql->bindParam('1', $coti);
        
		$sql->execute();
		
		$respuesta = $sql->fetchAll();
		if($respuesta){
			return $respuesta;
		}else{
			return false;
		}
    }
	
	public static function updateRepu($cod,$url,$precio){
        $conexion = new Conexion();	
		$sql = $conexion->prepare("CALL update_repuesto(?,?,?)");
							   
		$sql->bindParam('1', $cod);
        $sql->bindParam('2', $url);
		$sql->bindParam('3', $precio);
		
		$res = $sql->execute();
		
		if($res){
			return 1;
		}else{
			return 0;
		}
    }
}
?>