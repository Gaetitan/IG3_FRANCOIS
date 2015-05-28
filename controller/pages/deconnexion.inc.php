<?php
	$db=new Mypdo();
	$manager_part=new ParticipantManager($db);
	$manager_orga=new OrganisateurManager($db);

	if(!empty($_COOKIE['idPart'])){
		$participant=$manager_part->getOneByCookie($_COOKIE['idPart']);
		$participant->setCookie(NULL);
		$manager_part->update($participant);
		setcookie("idPart");
	}
	if(!empty($_COOKIE['idOrga'])){
		$organisateur=$manager_orga->getOneByCookie($_COOKIE['idOrga']);
		$organisateur->setCookie(NULL);
		$manager_orga->update($organisateur);
		setcookie("idOrga");
	}
	header('Location: http://localhost/ruedelasoif/index.php');
	include_once("view/pages/deconnexion.php");
?>