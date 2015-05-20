<?php
class Mypdo extends PDO {
	
	protected $dbo;
	
	public function __construct(){
		try{
			$this->dbo=parent::__construct('mysql:host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASSWD);
			$req = "SET NAMES UTF8;";
			$resu = PDO::query($req);
		}
		catch(PDOException $e){
				echo 'Echec de connexion : '.$e->getMessage();
		}
	}

}

?>