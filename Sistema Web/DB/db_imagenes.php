<?php
include_once('conexion.php');

class Imagenes{
	
	private $codigo;
	private $ruta;
	private $nombre;
	private $vehiculo;
	
	public function __construct($codigo,$ruta,$nombre,$vehiculo){
		$this->codigo = $codigo;
		$this->ruta = $ruta;
		$this->nombre = $nombre;
		$this->vehiculo = $vehiculo;
	}
    
    public static function agregarImagen($ruta,$nombre,$vehiculo){
		$conexion = new Conexion();	
		$sql = $conexion->prepare("CALL insert_imagenes(?,?,?)");
						
        $sql->bindParam('1', $ruta);
        $sql->bindParam('2', $nombre);
        $sql->bindParam('3', $vehiculo); 
	
		if($sql->execute()){
			return 1;
		}
		else{ 
			return 2;
		}
	}
	
	public static function listarImagenPatente($patente){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_imagenes_buscarPatente(?)");
        
		$sql->bindParam('1', $patente);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return 2;
		}
	}
}
?>