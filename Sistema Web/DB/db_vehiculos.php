<?php
include_once('conexion.php');

class Vehiculo{
	
	private $patente;
	private $año;
	private $marca;
	private $modelo;
	private $color;
	private $kilometros;
	private $tipo;
	
	public function __construct($patente,$año,$marca,$modelo,$color,$kilometros,$tipo){
		$this->patente = $patente;
		$this->año = $año;
		$this->marca = $marca;
		$this->modelo = $modelo;
		$this->color = $color;
		$this->kilometros = $kilometros;
		$this->tipo = $tipo;
	}
	
	public static function agregarVehiculo($patente,$año,$marca,$modelo,$color,$kilometros,$tipo,$cliente){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL insert_vehiculo(?,?,?,?,?,?,?)");
		
		$sql->bindParam('1', $patente);
		$sql->bindParam('2', $año); 
		$sql->bindParam('3', $marca);
		$sql->bindParam('4', $modelo); 
		$sql->bindParam('5', $color); 
		$sql->bindParam('6', $kilometros);
		$sql->bindParam('7',  $tipo);
		
		if($sql->execute()){
				$sql2 = $conexion->prepare("INSERT INTO tbl_persona_auto (cod_persona, patente_auto) VALUES (:cliente, :patente)");
				
				$sql2->bindParam(':cliente', $cliente, PDO::PARAM_STR);
				$sql2->bindParam(':patente', $patente, PDO::PARAM_STR);
				
				$sql2->execute();
				
			return 1;
		}
		else{
			return 2;
		}
	}
	
	public static function listarTodo(){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_vehiculo_all()");
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
			return false;
		}
	}
	
	public static function listarVehiculoPatente($patente){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_vehiculo_patente(?)");
		$sql->bindParam('1', $patente);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return false;
		}
	}
	
	public static function buscarXRut($rut){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_vehiculo_rut(?)");
		$sql->bindParam('1', $rut);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return false;
		}
	}
	
	public static function listarVehiculoEstado($estado){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_vehiculo_estado(?)");
		$sql->bindParam('1', $estado);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return false;
		}
	}
	
	public static function listarVehiparaReparar(){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_vehiparaReparar()");
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return false;
		}
	}
	
	public static function updateVehiculo($codigo,$patente,$año,$marca,$modelo,$color,$kilometros,$tipo){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL update_vehiculo(?,?,?,?,?,?,?,?)");
		$sql->bindParam('1', $patente);
		$sql->bindParam('2', $año); 
		$sql->bindParam('3', $marca);
		$sql->bindParam('4', $modelo); 
		$sql->bindParam('5', $color); 
		$sql->bindParam('6', $kilometros);
		$sql->bindParam('7', $tipo);
		$sql->bindParam('8', $codigo);
									  
		$sql->execute();
		if ($sql){
			header("refresh:0");
		}
		else{ 
			echo '<script language="javascript">alert("Error Update");</script>';
			header("refresh:2");
		}
	}
	
	public static function uptadteEstado($patente,$estado){
        $conexion = new Conexion();	
		$sql = $conexion->prepare("CALL update_vehiculo_estado(?,?)");
            
			$sql->bindParam('1', $patente);
			$sql->bindParam('2', $estado);
                                          
        $respuesta = $sql->execute();
		
		if ($respuesta){
			return $respuesta;
		}
		else { 
			echo '<script language="javascript">alert("ERROR update");</script>'; 
		}
    }
	
	public static function listarVehiculoCotiza($coti){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_vehiculo_coti(?)");
		$sql->bindParam('1', $coti);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return false;
		}
	}
	
}
?>