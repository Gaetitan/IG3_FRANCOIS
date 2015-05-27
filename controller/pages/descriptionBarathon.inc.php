<?php
	$db=new Mypdo();
	$manager=new BarathonManager($db);
	$manager_concerner=new ConcernerManager($db);
	$manager_bar=new BarManager($db);
	
	$barathon=$manager->getOneById($_POST['num_barathon']);
	
	$listeConcerner=$manager_concerner->getListByBarathon($barathon->getNumero());
	$bars=$manager_bar->getList();

	$barsConcernes=array();
	foreach($bars as $bar){
		foreach($listeConcerner as $concerner){
			if($bar->getNumero()===$concerner->getNumeroBar()){
				$barsConcernes[]=new Bar($bar);
			}
		}
	}
	
	include_once("view/pages/descriptionBarathon.php");
?>