<?php
	$db=new Mypdo();
	$manager_participer=new ParticiperManager($db);
	$manager_barathon=new BarathonManager($db);
	$manager_part=new ParticipantManager($db);
	
	$barathon=$manager_barathon->getOneById($_POST['num_barathon']);
	
	$dejaInscrit=False;
	$inscrit=False;
	$inscriptionsTerminees=False;
	
	if($barathon->getNbPlaces()==0){
		$inscriptionsTerminees=True;
	}
	else{
		if(empty($_COOKIE['idPart'])){
			header('Location: http://ruedelasoif-gaetitan.rhcloud.com/index.php?page=connexion');
		}
		else{
			$participant=$manager_part->getOneByCookie($_COOKIE['idPart']);
			if(!$manager_participer->isPresent($barathon->getNumero(), $participant->getNumero())){
				$participer=new Participer(array('numeroBarathon' => $barathon->getNumero(),
																						'numeroParticipant'=>$participant->getNumero()));
				$manager_participer->add($participer);
				$inscrit=True;
			}
			else{
				$dejaInscrit=True;
			}
		}
	}
	include_once('view/pages/inscriptionBarathon.php');
?>