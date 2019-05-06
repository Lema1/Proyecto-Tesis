<?php
require_once('con-SV-BI.php');
class Login{
	
	private $user;
	private $pass;
	
	public function __construct($user,$pass){
		$this->user = $user;
		$this->pass = $pass;
	}
	
	public static function iniciar($user,$pass){
		$conexion = new ConexionBI();
		
		$sql = $conexion->prepare("CALL pregPASS(?)");	   
		$sql->bindParam('1', $user);
        
		$sql->execute();
        
        $respuesta = $sql->fetchAll();
		
		$sql->closeCursor();
		
		if(password_verify($pass, $respuesta[0][0])==1){	
			
			$sql2 = $conexion->prepare("CALL login_user(?,?)");
							   
			$sql2->bindParam('1', $user);
			$sql2->bindParam('2', $respuesta[0][0]);
			
			$sql2->execute();
			
			$respuesta2 = $sql2->fetchAll();
	
			if ($respuesta2[0][0]){
				
				return $respuesta2[0][0];
			}
			else { 
				return null;
			}
		}
	}
	
	public static function updateLogin($user,$pass,$persona){
		$conexion = new Conexion();
		
		$sql = $conexion->prepare("UPDATE tbl_login SET user=:user, password=:pass where persona=:prs");	   
		$sql->bindParam(':user', $user);
		$sql->bindParam(':pass', $pass);
		$sql->bindParam(':prs', $persona); 
									  
		$sql->execute();
		if ($sql){
			return $sql;
		}
		else{ 
			header("refresh:2; url=index.php");
		}
	}
	
}
?>