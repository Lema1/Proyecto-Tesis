<?php
include_once('conexion.php');

class FlujoTrabajo{
	
	private $codigo;
	private $vehiculo;
	private $cotizacion;
    private $fecha;
    private $estado;
	
	public function __construct($codigo,$vehiculo,$cotizacion,$fecha,$estado){
		$this->codigo = $codigo;
		$this->vehiculo = $vehiculo;
		$this->cotizacion = $cotizacion;
        $this->fecha = $fecha;
        $this->estado = $estado;
	}
    
    public static function ingresarFlujo($vehiculo,$cotizacion,$fecha,$estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL insert_flujoTrabajo(?,?,?,?)");
        $sql->bindParam('1', $vehiculo);
        $sql->bindParam('2', $cotizacion);
        $sql->bindParam('3', $fecha);
        $sql->bindParam('4', $estado);
        
		if($sql->execute()){
			return true;
		}
		else { 
			return null;
		}
    }
    
    public static function listarEstado($estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_flujoEstado(?)");
        $sql->bindParam('1', $estado);
		
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
			return null;
		}
	}
    
    public static function moverFlujo($estado,$cotizacion){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL update_moverFlujo(?,?)");
        $sql->bindParam('1', $estado);
        $sql->bindParam('2', $cotizacion);
		if($sql->execute()){
			return true;
		}
		else { 
			return null;
		}
	}
    
    
}
?>