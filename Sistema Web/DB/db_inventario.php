<?php
require_once('conexion.php');

class Inventario{
 
    private $codigo;
	private $cotizacion;
    private $repuesto;
	private $cantidad;
	
	public function __construct($codigo,$cotizacion,$repuesto,$cantidad){
		$this->codigo = $codigo;
		$this->cotizacion = $cotizacion;
        $this->repuesto = $repuesto;
		$this->repuesto = $cantidad;
	}
    
    public static function agregarInsumo($nombre,$descripcion,$precio,$cantidad){
		$conexion = new Conexion();	
		$sql = $conexion->prepare("CALL insert_insumo(?,?,?,?)");
							   
		$sql->bindParam('1', $nombre);
        $sql->bindParam('2', $descripcion);
        $sql->bindParam('3', $precio);
		$sql->bindParam('4', $cantidad);
		

		if($sql->execute()){
			header("refresh:0; url=../../inventario.php");
			return true;
		}
		else{ 
			echo '<script language="javascript">alert("Error agregar rubro");</script>';
			//header("refresh:0; url=../../inventario.php");
		}
	}
	
	public static function updateInsumo($codigo,$nombre,$descrp,$precio,$cantidad){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("UPDATE tbl_insumos SET nombre=:nom, 	descripcion=:descr, precio=:preci, cantidad=:canti
								  WHERE codigo=:cod");	   
		$sql->bindParam(':nom', $nombre);
		$sql->bindParam(':descr', $descrp);
		$sql->bindParam(':preci', $precio);
		$sql->bindParam(':canti', $cantidad);
		$sql->bindParam(':cod', $codigo);
									  
		$sql->execute();
		if ($sql){
			header("refresh:0");
		}
		else{ 
			echo '<script language="javascript">alert("Error Update");</script>';
			header("refresh:2; url=nuevo-cliente.php");
		}
	}
	
	public static function agregarCantidad($codigo,$fecha,$cantidad){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL insert_gasto_insumo(?,?,?)");	   
		$sql->bindParam('1', $codigo);
		$sql->bindParam('2', $fecha);
		$sql->bindParam('3', $cantidad);
									  
		$sql->execute();
		if ($sql){
			return 1;
		}
		else{ 
			return null;
		}
	}
    
    public static function listarTodo(){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL select_insumos_all()");
		
		$sql->execute();

		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            echo '<script language="javascript">alert("ERROR Listar Insumo");</script>'; 
		}
	}
	
	public static function codigos(){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("SELECT ti.codigo,ti.nombre  FROM tbl_insumos ti");
		
		$sql->execute();

		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
            echo '<script language="javascript">alert("ERROR Listar Insumo");</script>'; 
		}
	}
	
	public static function listaMensual($codigo,$mes){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL insumo_mes(?,?)");
		$sql->bindParam('1', $codigo);
		$sql->bindParam('2', $mes);
		
		$sql->execute();
		
		$respuesta = $sql->fetchAll();
        return $respuesta;
		if($respuesta){
			return $respuesta;
		}
		else { 
            echo '<script language="javascript">alert("ERROR Listar Insumo");</script>'; 
		}
	}
	
	public static function listaAnual($codigo,$ano){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL insumo_ano(?,?)");
		$sql->bindParam('1', $codigo);
		$sql->bindParam('2', $ano);
		
		$sql->execute();
		
		$respuesta = $sql->fetchAll();
        return $respuesta;
		if($respuesta){
			return $respuesta;
		}
		else { 
            echo '<script language="javascript">alert("ERROR Listar Insumo");</script>'; 
		}
	}
	
	public static function listaDia($codigo,$dia){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("CALL insumo_dia(?,?)");
		$sql->bindParam('1', $codigo);
		$sql->bindParam('2', $dia);
		
		$sql->execute();
		
		$respuesta = $sql->fetchAll();
        return $respuesta;
		if($respuesta){
			return $respuesta;
		}
		else { 
            echo '<script language="javascript">alert("ERROR Listar Insumo");</script>'; 
		}
	}

}
?>