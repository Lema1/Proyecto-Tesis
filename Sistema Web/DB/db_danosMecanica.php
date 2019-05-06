<?php
include_once('conexion.php');
	
class DanosMecanica{
	
	private $codigo;
	private $parte_vehiculo;
	private $cotizacion;
    private $cantidad;
    private $categoria;
	
	public function __construct($codigo,$parte_vehiculo,$cotizacion,$cantidad,$categoria){
		$this->codigo = $codigo;
		$this->parte_vehiculo = $parte_vehiculo;
		$this->cotizacion = $cotizacion;
        $this->nombre = $cantidad;
		$this->precio = $categoria;
	}
	
	public static function agregarDanos($parte_vehiculo,$cotizacion,$cantidad){
		$conexion = new Conexion();	
		$sql = $conexion->prepare("CALL insert_danoMecanica(?,?,?,@id)");
							   
		$sql->bindParam('1', $parte_vehiculo);
		$sql->bindParam('2', $cotizacion);
		$sql->bindParam('3', $cantidad);
		
		$sql->execute();
        
        $sql->closeCursor();
		
		$row = $conexion->query("SELECT @id AS id")->fetch(PDO::FETCH_ASSOC);
        
		if ($row){
			return $row['id'];
		}
		else{ 
			return null;
		}
	}
    
    public static function buscarDaños($cotizacion){
		$conexion = new Conexion();	
		$sql = $conexion->prepare("CALL select_danosME_cotizacion(?)");
							   
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