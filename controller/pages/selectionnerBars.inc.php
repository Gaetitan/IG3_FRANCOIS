<?php
	$db=new Mypdo();
	$manager_concerner=new ConcernerManager($db);
	$manager_bar=new BarManager($db);
	$manager_barathon=new BarathonManager($db);
	$manager_orga=new OrganisateurManager($db);

	$orga=$manager_orga->getOneByCookie($_COOKIE['idOrga']);
	$barathons=$manager_barathon->getListByOrgaId($orga->getNumero());
	$bars=$manager_bar->getList();
	
	foreach($barathons as $barathon){
		foreach($bars as $bar){
			if($bar->getVille()===$barathon->getVille()){
				$isPresent[$barathon->getNumero()][$bar->getNumero()]=$manager_concerner->isPresent($barathon->getNumero(), $bar->getNumero());
			}
		}
	}
	
	foreach($barathons as $barathon){
		foreach($bars as $bar){
			if($bar->getVille()===$barathon->getVille()){
				if(isset($_POST['num_bar_'.$bar->getNumero()])){
					$concerner=new Concerner(array('numeroBarathon' => $_POST['num_barathon'],
											'numeroBar' => $_POST['num_bar_'.$bar->getNumero()]));
					$manager_concerner->add($concerner);
				}
			}
		}
	}
	
	include_once('view/pages/selectionnerBars.php');
?>