<?php
	$db=new Mypdo();
	$manager=new BarathonManager($db);
	
	$barathon=$manager->getOneById($_POST['num_barathon']);
	
	include_once("view/pages/descriptionBarathon.php");
?>