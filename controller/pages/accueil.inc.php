<?php
	$db=new Mypdo();
	$manager=new BarathonManager($db);
	$manager_part=new ParticipantManager($db);
	$manager_orga=new OrganisateurManager($db);
	
	$barathons=$manager->getList();
	
	if(!empty($_COOKIE['idPart'])&&empty($_COOKIE['idOrga'])){
		$participant=$manager_part->getOneByCookie($_COOKIE['idPart']);
	}
	
	if(empty($_COOKIE['idPart'])&&!empty($_COOKIE['idOrga'])){
		$organisateur=$manager_orga->getOneByCookie($_COOKIE['idOrga']);
	}
	
	include_once("view/pages/accueil.php");
?>