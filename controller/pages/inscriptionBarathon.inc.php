<?php
	$db=new Mypdo();
	$manager_participer=new ParticiperManager($db);
	$manager_barathon=new BarathonManager($db);
	
	$barathon=$manager_barathon->getOneById($_POST['num_barathon']);
	
	if(empty($_COOKIE['idPart'])){
		header('Location: http://ruedelasoif-gaetitan.rhcloud.com/index.php?page=connexion');
	}
	elseif(!empty($_COOKIE['idPart'])){
		if(!$manager_participer->isPresent($barathon->getNumero(), $_COOKIE['idPart'])){
			$manager_participer->add($barathon->getNumero(), $_COOKIE['idPart']);
			echo "Vous avez été inscrit à ce barathon.";
		}
		else{
			echo "Vous êtes déja inscrit à ce barathon.";
		}
	}
	include_once('view/pages/inscriptionBarathon.php');
?>