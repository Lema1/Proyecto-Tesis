<?php
require_once('conexion.php');
error_reporting(E_ALL ^ E_NOTICE);
class Reserva{
	
	private $codigo;
	private $nombre;
	
	public function __construct($codigo,$nombre){
		$this->codigo = $codigo;
		$this->nombre = $nombre;
	}
	
	public static function listarReserva(){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("select tr.rut,tp.nombre,tr.fecha from tbl_reservas tr inner join tbl_persona tp on tr.rut = tp.rut");
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            echo '<script language="javascript">alert("ERROR Listar reserva");</script>'; 
		}
	}
	
}
?>