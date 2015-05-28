<?php
	$db=new Mypdo();
	$manager=new BarathonManager($db);
	$manager_concerner=new ConcernerManager($db);
	$manager_bar=new BarManager($db);
	$manager_orga=new OrganisateurManager($db);
	
	$barathon=$manager->getOneById($_POST['num_barathon']);
	
	$orga=$manager_orga->getOneById($barathon->getOrgaId());
	
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