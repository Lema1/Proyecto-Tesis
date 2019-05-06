<?php
include_once('conexion.php');

class Cotizacion{
    
    private $codigo;
	private $vehiculo;
    private $cliente;
	private $fecha;
	private $estado;
	
	public function __construct($codigo,$vehiculo,$cliente,$fecha,$estado){
		$this->codigo = $codigo;
		$this->vehiculo = $vehiculo;
        $this->cliente = $cliente;
		$this->fecha = $fecha;
		$this->estado = $estado;
	}
    
    public static function nuevaCotizacion($vehiculo,$cliente,$fecha){
        $conexion = new Conexion();	
		$sql = $conexion->prepare("CALL insert_cotizacion(?,?,?,@id)");
							   
		$sql->bindParam('1', $vehiculo);
        $sql->bindParam('2', $cliente);
		$sql->bindParam('3', $fecha);
		
		$sql->execute();
		
		$sql->closeCursor();
		
		$row = $conexion->query("SELECT @id AS id")->fetch(PDO::FETCH_ASSOC);
        
		if ($row){
						
			echo '<script language="javascript">alert("agregar cotizacion");</script>';
			
			return $row['id'];
		}
		else{ 
			echo '<script language="javascript">alert("Error agregar cotizacion");</script>';
		}
    }
	
	public static function buscarCotizacionPatente($vehiculo){
        $conexion = new Conexion();	
		$sql = $conexion->prepare("CALL select_cotizacion_patente(?)");
							   
		$sql->bindParam('1', $vehiculo);
		
		$sql->execute();
		
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
			echo '<script language="javascript">alert("ERROR Listar");</script>'; 
		}
    }
	
	public static function uptadteCotizacion($estado,$codigo){
        $conexion = new Conexion();	
		$sql = $conexion->prepare("CALL update_cotizacion_estado(?,?)");
            
			$sql->bindParam('1', $estado);
			$sql->bindParam('2', $codigo);
                                          
        $respuesta = $sql->execute();
		
		if ($respuesta){
			return $respuesta;
		}
		else { 
			echo '<script language="javascript">alert("ERROR update");</script>'; 
		}
    }
	
	public static function select_coti_cod($codigo){
        $conexion = new Conexion();	
		$sql = $conexion->prepare("CALL select_cotizacion_cod(?)");
            
		$sql->bindParam('1', $codigo);
                                          
        $sql->execute();
		$respuesta = $sql->fetchAll();
		if ($respuesta){
			return $respuesta;
		}
		else { 
			echo '<script language="javascript">alert("ERROR update");</script>'; 
		}
    }
	
	public static function select_coti_pendiente(){
		$conexion = new Conexion();	
		$sql = $conexion->prepare("CALL select_coti_Pendiente()");
                                          
        $sql->execute();
		$respuesta = $sql->fetchAll();
		if ($respuesta){
			return $respuesta;
		}
		else { 
			echo '<script language="javascript">alert("ERROR update");</script>'; 
		}
    }
	
	public static function select_mail_codigo($cod){
		$conexion = new Conexion();	
		$sql = $conexion->prepare("CALL select_mail_cotizacion($cod)");
        $sql->bindParam('1', $cod);
		
        $sql->execute();
		$respuesta = $sql->fetchAll();
		if ($respuesta){
			return $respuesta;
		}
		else { 
			echo '<script language="javascript">alert("ERROR update");</script>'; 
		}
    }
	
	
}
?>