<?php
include_once('conexion.php');
	
class DanosCarroceria{
	
	private $codigo;
	private $nombre;
	private $precio;
	private $observaciones;
	private $parte_vehiculo;
	private $cotizacion;
	
	public function __construct($codigo,$nombre,$precio,$observaciones,$parte_vehiculo,$cotizacion){
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->observaciones = $observaciones;
		$this->parte_vehiculo = $parte_vehiculo;
		$this->cotizacion = $cotizacion;
	}
	
	public static function agregarDanos($parte_vehiculo,$cotizacion,$precio,$categoria){
		$conexion = new Conexion();	
		$sql = $conexion->prepare("CALL insert_danosCarroceria(?,?,?,?)");
							   
		$sql->bindParam('1', $parte_vehiculo);
		$sql->bindParam('2', $cotizacion);
		$sql->bindParam('3', $precio);
		$sql->bindParam('4', $categoria);
		
		if($sql->execute()){
			return 1;
		}
		else{
			return 2;
		}
	}
	
	public static function buscarDaños($cotizacion){
		$conexion = new Conexion();	
		$sql = $conexion->prepare("CALL select_danosCA_cotizacion(?)");
							   
		$sql->bindParam('1', $cotizacion);
		
		$sql->execute();
		
		$respuesta = $sql->fetchAll();
		
		if($respuesta){
			return $respuesta;
		}
		else{ 
			return null;
		}
	}
	
	public static function buscarDañosCoti($cotizacion){
		$conexion = new Conexion();	
		$sql = $conexion->prepare("CALL select_danos_CotiDetalle(?)");
							   
		$sql->bindParam('1', $cotizacion);
		
		$sql->execute();
		
		$respuesta = $sql->fetchAll();
		
		if($respuesta){
			return $respuesta;
		}
		else{ 
			return null;
		}
	}
	
}
?>