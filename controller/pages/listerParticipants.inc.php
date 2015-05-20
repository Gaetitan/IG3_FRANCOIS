<?php
	$db=new Mypdo();
	$manager=new ParticipantManager($db);
	$listeParticipants=$manager->getList();
	include_once("view/pages/listerParticipants.php");
?>