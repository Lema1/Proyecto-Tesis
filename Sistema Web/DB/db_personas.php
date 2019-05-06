<?php
include_once('conexion.php');
	
class Persona{
	
	private $rut;
	private $nombre;
	private $apellido;
	private $fecha;
	private $direccion;
	private $tel1;
	private $tel2;
	private $email;
	private $tipo;
	
	public function __construct($rut,$nombre,$apellido,$fecha,$direccion,$tel1,$tel2,$email,$tipo){
		$this->rut = $rut;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fecha = $fecha;
		$this->direccion = $direccion;
		$this->tel1 = $tel1;
		$this->tel2 = $tel2;
		$this->email = $email;
		$this->tipo = $tipo;
	}
	
	public static function agregarCliente($rut,$nombre,$apellido,$fecha,$direccion,$tel1,$tel2,$email,$tipo){
		$conexion = new Conexion();
	
		$sql = $conexion->prepare("CALL insert_persona(?,?,?,?,?,?,?,?,?)");
								   
			$sql->bindParam('1', $rut);
			$sql->bindParam('2', $nombre);
			$sql->bindParam('3', $apellido);
			$sql->bindParam('4', $fecha);
			$sql->bindParam('5', $direccion);
			$sql->bindParam('6', $tel1);
			$sql->bindParam('7', $tel2);
			$sql->bindParam('8', $email);
			$sql->bindParam('9', $tipo);
			
		if($sql->execute()){
			return 1;
		}
		else{ 
			return 0;
		}
	}
	
	public static function listarTodo(){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_persona_all()");
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
		echo '<script language="javascript">alert("ERROR");</script>'; 
		}
	}
	
	public static function listarPorTipo($tipo){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_persona_tipo(?)");
		$sql->bindParam('1', $tipo);
		
		$sql->execute();
		
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
		echo '<script language="javascript">alert("ERROR");</script>'; 
		}
	}
	
	public static function buscarPersona($rut){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_persona_rut(?)");
		$sql->bindParam('1', $rut);
		
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
			echo '<script language="javascript">alert("ERROR buscar persona");</script>'; 
		}
	}
	public static function modificarPersona($rut, $nombre, $fecha, $direccion, $tel1, $tel2, $email){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL update_persona(?,?,?,?,?,?,?)");
		$sql->bindParam('1', $nombre);
		$sql->bindParam('2', $fecha);
		$sql->bindParam('3', $direccion);
		$sql->bindParam('4', $tel1);
		$sql->bindParam('5', $tel2);
		$sql->bindParam('6', $email);
		$sql->bindParam('7', $rut);
		
		$sql->execute();
		if ($sql){
			header("refresh:0");
		}
		else{ 
			echo '<script language="javascript">alert("Error Update");</script>';
			header("refresh:2");
		}
	}
}
?>