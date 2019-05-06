<?php 
class ConexionBI extends PDO
{
	private $tipo = "mysql";
	private $host = "localhost";
	private $db = "taller_bi";
	private $usuario = "supervisor";
	private $password = "supervisor";
	
	public function __construct(){
		try{
			parent::__construct($this->tipo.':host='.$this->host.';dbname='.$this->db, $this->usuario, $this->password);
		}catch(PDOException $e){
			echo 'ERROR'. $e->getMessage();
			exit;
		}	
	}
	
	public function logout(){
    	session_destroy(); 
    	header('location: login.php');
	}

}
?>