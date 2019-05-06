<?php
include_once('conexion.php');
	
class Tareas{
	
	private $codigo;
	private $estado;
	private $fecha_inicio;
	private $fecha_termino;
	private $mecanico;
    private $danos;
	
	public function __construct($codigo,$estado,$fecha_inicio,$fecha_termino,$mecanico,$danos){
		$this->codigo = $codigo;
		$this->estado = $estado;
		$this->fecha_inicio = $fecha_inicio;
		$this->fecha_termino = $fecha_termino;
		$this->mecanico = $mecanico;
        $this->danos = $danos;
	}
	
	public static function nuevaTareaMeca($dano){
        $conexion = new Conexion();	
		$sql = $conexion->prepare("CALL insert_tareaMeca(?)");
							   
		$sql->bindParam('1', $dano);
		
		$res = $sql->execute();
		
		if($res){
			return 1;
		}else{
			return null;
		}
    }
	public static function nuevaTareaCarro($dano,$categoria){
        $conexion = new Conexion();	
		$sql = $conexion->prepare("CALL insert_tareaCarro(?,?)");
							   
		$sql->bindParam('1', $dano);
		$sql->bindParam('2', $categoria);
		
		$res = $sql->execute();
		
		if($res){
			return 1;
		}else{
			return null;
		}
    }
	
	public static function listarTareas(){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_tareas_all()");
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            echo '<script language="javascript">alert("ERROR Listar Tipo");</script>'; 
		}
	}
	
	public static function asignarMecanico($codigo,$mecanico){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL update_tareas_asignarMecanico(?,?)");	   
		
		$sql->bindParam('1', $codigo);
		$sql->bindParam('2', $mecanico); 
									  
		if($sql->execute()){
			return true;
		}
		else{ 
			echo '<script language="javascript">alert("Error Update");</script>';
		}
	}
	
	public static function buscarTareaCADesa($coti){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_tareas_CarroDesa(?)");
		
		$sql->bindParam('1', $coti);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return null;
		}
	}
	public static function buscarTareaCAPint($coti){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_tareas_CarroPint(?)");
		
		$sql->bindParam('1', $coti);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return null;
		}
	}
	
	public static function buscarTareaME($coti){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_tareas_Mecanica(?)");
		
		$sql->bindParam('1', $coti);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return null;
		}
	}
	
	public static function comprobarTareaDesa($cotizacion){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_comprobarTareaDesa(?)");
		
		$sql->bindParam('1', $cotizacion);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return null;
		}
	}
	
	public static function comprobarTareaPint($cotizacion){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_comprobarTareaPint(?)");
		
		$sql->bindParam('1', $cotizacion);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return null;
		}
	}
	
	public static function comprobarTareaMeca($cotizacion){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_comprobarTareaMeca(?)");
		
		$sql->bindParam('1', $cotizacion);
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            return null;
		}
	}
	
	public static function FinalizarTarea($tarea){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL update_finalizarTarea(?)");
		$sql->bindParam('1', $tarea);
		
		$sql->execute();
		if ($sql){
			return true;
		}
		else{ 
			echo '<script language="javascript">alert("Error Update");</script>';
			header("refresh:2");
		}
	}
	
	
}
?>