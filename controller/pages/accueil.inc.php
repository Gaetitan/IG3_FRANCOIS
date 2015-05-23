<?php
	$db=new Mypdo();
	$manager=new BarathonManager($db);
	
	$barathons=$manager->getList();
	
	include_once("view/pages/accueil.php");
?>