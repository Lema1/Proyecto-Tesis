
<?php
require_once('conexion.php');
class Tipo{
	
	private $codigo;
	private $nombre;
	
	public function __construct($codigo,$nombre){
		$this->codigo = $codigo;
		$this->nombre = $nombre;
	}
	
	public static function listarTodo(){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_tipoVehiculo_all()");
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
		echo '<script language="javascript">alert("ERROR");</script>'; 
		}
	}
	
	public static function listarTipoCodigo($cod){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_tipoVehiculo_codigo(?)");
		$sql->bindParam('1', $cod);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            echo '<script language="javascript">alert("ERROR Listar Tipo");</script>'; 
		}
	}
	
	public static function agregarTipo($nombre){
		$conexion = new Conexion();	
		$sql = $conexion->prepare("CALL insert_tipoVehiculo(?)");
							   
		$sql->bindParam('1', $nombre);
		
		$sql->execute();

		if ($sql){
			header("refresh:0");
		}
		else{
			echo '<script language="javascript">alert("Error agregar tipo");</script>';
			header("refresh:2; url=nuevo-cliente.php");
		}
	}
	
}
?>