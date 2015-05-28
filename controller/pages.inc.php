<?php
	
	if(!empty($_GET["page"])){
		$page=$_GET["page"];
	}
	else{
		$page='accueil';
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
			
		case 'deconnexion':
			include_once('pages/deconnexion.inc.php');
			break;	
			
		case 'descriptionBarathon':
			include_once('pages/descriptionBarathon.inc.php');
			break;
			
		case 'creerBarathon':
			include_once('pages/creerBarathon.inc.php');
			break;	
			
		case 'ajouterBar':
			include_once('pages/ajouterBar.inc.php');
			break;
			
		case 'selectionnerBars':
			include_once('pages/selectionnerBars.inc.php');
			break;
			
		case 'inscriptionBarathon':
			include_once('pages/inscriptionBarathon.inc.php');
			break;

		case 'mesBarathons':
			include_once('pages/mesBarathons.inc.php');
			break;
			
		case 'supprimerBarathon':
			include_once('pages/supprimerBarathon.inc.php');
			break;
			
		case 'supprimerInscription':
			include_once('pages/supprimerInscription.inc.php');
			break;
			
		default:
			include_once('pages/accueil.inc.php');
	}
	

?>