<?php
include_once('conexion.php');

class Espacios{
	
	private $codigo;
	private $vehiculo;
	private $estado;
	
	public function __construct($codigo,$vehiculo,$estado){
		$this->codigo = $codigo;
		$this->vehiculo = $vehiculo;
		$this->estado = $estado;
	}
    
	public static function updateEspacio($cod,$vehiculo,$accion,$coti){
		$conexion = new Conexion();
        if($accion == 1){
            //agregar a espacio
            $sql = $conexion->prepare("UPDATE tbl_espacios SET vehiculo=:vehicu, estado=2 where codigo=:cod");	   
            $sql->bindParam(':vehicu', $vehiculo);
            $sql->bindParam(':cod', $cod);
                                          
            $sql->execute();
            if ($sql){
                
                $sql2 = $conexion->prepare("CALL update_vehiculo_estado(?,2)");
                $sql2->bindParam('1', $vehiculo);
                $sql2->execute();
                return 1;
            }
            else{ 
                echo '<script language="javascript">alert("Error");</script>';
                return 2;
            }
        }
        if($accion == 2){
            //eliminar de espacio
            $sql3 = $conexion->prepare("UPDATE tbl_espacios SET vehiculo=null, estado=1 where codigo=:cod");
            $sql3->bindParam(':cod', $cod);
                                          
            $sql3->execute();
			//echo 'asd1';
            if($sql3){
                
                $sql4 = $conexion->prepare("CALL update_vehiculo_estado(?,3)");
                $sql4->bindParam('1', $vehiculo);
                $sql4->execute();
				//echo 'asd2';
				if($sql4){
					$sql5 = $conexion->prepare("CALL update_cotizacion_estado(2,?)");
					$sql5->bindParam('1', $coti);
					$sql5->execute();
					//echo 'asd3';
					if($sql5){
						return 1;
					}
				}
            }
            else{ 
                echo '<script language="javascript">alert("Error2");</script>';
                return 2;
            }
        }
	}
    
	public static function listarTodo(){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_espacios_all()");
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
			echo '<script language="javascript">alert("ERROR Listar Espacios");</script>';
			return null;
		}
	}
	
	public static function listarXCategoria($cate){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_espacio_categoria(?)");
        $sql->bindParam('1', $cate);
		
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
			echo '<script language="javascript">alert("ERROR Listar Espacios");</script>';
			return null;
		}
	}
	
	public static function espacioVehiculo($cod){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_espacioVehiculo(?)");
        
		$sql->bindParam('1', $cod);
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
			return null;
		}
	}
	
	public static function bucarDisponible($categoria){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_espacio_disponible(?)");
        
		$sql->bindParam('1', $categoria);
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
			return null;
		}
	}
	
	public static function buscarEspacioTrabajando(){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_espacio_trabajando()");
        
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta;
		}
		else { 
			return null;
		}
	}
	
	public static function buscarEspacioPatente($patente){
		$conexion = new Conexion();
		$sql = $conexion->prepare("CALL select_espacio_patente(?)");
        $sql->bindParam('1', $patente);
		$sql->execute();
		$respuesta = $sql->fetchAll();
        
		if ($respuesta){
			return $respuesta[0][0];
		}
		else { 
			return null;
		}
	}
}
?>