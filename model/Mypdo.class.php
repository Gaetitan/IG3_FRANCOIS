<?php
	class Mypdo extends PDO {
		
		protected $dbo;
		
		public function __construct(){
			
			
			try{
				$this->dbo=parent::__construct('mysql:host=127.13.150.2:3306;dbname=ruedelasoif;','adminpj7zaGH','zkP4DLFTP6D2');
				$req = "SET NAMES UTF8;";
				$resu = PDO::query($req);
			}
			catch(PDOException $e){
					echo 'Echec de connexion : '.$e->getMessage();
			}
		}

	}

?>