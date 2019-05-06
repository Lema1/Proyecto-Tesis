<?php
include_once('conexion.php');

class Orden{
    
    private $codigo;
	private $cotizacion;
	private $fecha_ingreso;
	private $fecha_entrega;
	
	public function __construct($codigo,$cotizacion,$fecha_ingreso,$fecha_entrega){
		$this->codigo = $codigo;
		$this->cotizacion = $cotizacion;
		$this->fecha_ingreso = $fecha_ingreso;
		$this->fecha_entrega = $fecha_entrega;
	}
    
    public static function nuevaOrden($cotizacion,$fecha){
		$conexion = new Conexion();
		$sql = $conexion->prepare("call insert_ordenRepara(?,?)");
        
        $sql->bindParam('1', $cotizacion);
        $sql->bindParam('2', $fecha);
        
		$sql->execute();
        
		if ($sql){
			return true;
		}
		else { 
		echo '<script language="javascript">alert("ERROR agregar orden");</script>'; 
		}
	}
	
	public static function buscarOrden($cotizacion){
		$conexion = new Conexion();
		$sql = $conexion->prepare("call select_orden_Coti(?)");
        
        $sql->bindParam('1', $cotizacion);
        
		$sql->execute();
        $respuesta = $sql->fetchAll();
		
		if ($respuesta){
			return $respuesta;
		}
		else { 
		echo '<script language="javascript">alert("ERROR agregar orden");</script>'; 
		}
	}
    
    
}

?>