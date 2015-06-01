<?php
	$db=new Mypdo();
	$manager_orga=new OrganisateurManager($db);
	$manager_barathon=new BarathonManager($db);
	$manager_participer=new ParticiperManager($db);
	$manager_part=new ParticipantManager($db);
	$recupere=False;
	
	$organisateur=$manager_orga->getOneByCookie($_COOKIE['idOrga']);
	$listeBarathons=$manager_barathon->getListByOrgaId($organisateur->getNumero());
	$barathons=array();
	foreach($listeBarathons as $barathonOrga){
		$barathons[]=new Barathon($barathonOrga);
	}
	
	if(isset($_POST['barathon'])){
		$monBarathon=$manager_barathon->getOneById($_POST['barathon']);
		$listeParticiper=$manager_participer->getListByBarathon($_POST['barathon']);
		$mesParticiper=array();
		foreach($listeParticiper as $participer){
			$mesParticiper[]=new Participer($participer);
		}
		$participants=array();
		foreach($mesParticiper as $participePart){
			$participants[]=$manager_part->getOneById($participePart->getNumeroParticipant());
		}
		$recupere=True;
	}
	
	
	include_once('view/pages/participantsBarathon.php');
?>