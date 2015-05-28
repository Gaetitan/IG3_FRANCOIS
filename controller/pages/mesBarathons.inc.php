<?php
	$db=new Mypdo();
	$manager_orga=new OrganisateurManager($db);
	$manager_part=new ParticipantManager($db);
	$manager_barathon=new BarathonManager($db);
	$manager_participer=new ParticiperManager($db);
	
	
	if(!empty($_COOKIE['idPart'])&&empty($_COOKIE['idOrga'])){
		$participant=$manager_part->getOneByCookie($_COOKIE['idPart']);
		$listeParticiper=$manager_participer->getListByParticipant($participant->getNumero());
		
		$barathons=array();
		foreach($listeParticiper as $participer){
			$barathons[]=new Barathon($manager_barathon->getOneById($participer->getNumeroBarathon()));
		}
	}
	
	if(empty($_COOKIE['idPart'])&&!empty($_COOKIE['idOrga'])){
		$organisateur=$manager_orga->getOneByCookie($_COOKIE['idOrga']);
		$barathons=$manager_barathon->getListByOrgaId($organisateur->getNumero());
	}

	include_once('view/pages/mesBarathons.php');
?>