<?php
require_once('conexion.php');

class PartesVehiculo{
	
	private $codigo;
	private $nombre;
	
	public function __construct($codigo,$nombre){
		$this->codigo = $codigo;
		$this->nombre = $nombre;
	}
	
	public static function listarTodo(){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_parteVehiculo_all()");
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
		echo '<script language="javascript">alert("ERROR Rubro");</script>'; 
		}
	}
	public static function buscarNombre($codigo){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_parteVehiculo_codigo(?)");
		$sql->bindParam('1', $codigo);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
		echo '<script language="javascript">alert("ERROR Rubro");</script>'; 
		}
	}
}
?>