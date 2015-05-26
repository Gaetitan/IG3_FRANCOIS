<?php
	class Mypdo extends PDO {
		
		protected $dbo;
		
		public function __construct(){
			$DBHOST='127.7.12.2:3306';
			$DBNAME='ruedelasoif';
			$DBUSER='adminmHMNRlx';
			$DBPASSWD='lB4zMWx59WJk';
			
			try{
				$this->dbo=parent::__construct('mysql:host='.$DBHOST.'; dbname='.$DBNAME, $DBUSER, $DBPASSWD);
				$req = "SET NAMES UTF8;";
				$resu = PDO::query($req);
			}
			catch(PDOException $e){
					echo 'Echec de connexion : '.$e->getMessage();
			}
		}

	}

?>