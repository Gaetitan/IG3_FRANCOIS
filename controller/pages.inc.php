<?php
	include_once("controller/config.inc.php");
	
	if(!empty($_GET["page"])){
		$page=$_GET["page"];
	}
	else{
		$page=0;
	}
	
	switch($page){
		case 0:
			include_once('pages/accueil.inc.php');
			break;
			
		case 1:
			include_once('pages/listerParticipants.inc.php');
			break;
			
			
			
		default:
			include_once('pages/accueil.inc.php');
	}
	

?>