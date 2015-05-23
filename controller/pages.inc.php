<?php
	
	if(!empty($_GET["page"])){
		$page=$_GET["page"];
	}
	else{
		$page='0';
	}
	
	switch($page){
		case 'accueil':
			include_once('pages/accueil.inc.php');
			break;
			
		case 'creerCompte':
			include_once('pages/creerCompte.inc.php');
			break;

		case 'connexion':
			include_once('pages/connexion.inc.php');
			break;
			
		case 'descriptionBarathon':
			include_once('pages/descriptionBarathon.inc.php');
			break;
			
		default:
			include_once('pages/accueil.inc.php');
	}
	

?>