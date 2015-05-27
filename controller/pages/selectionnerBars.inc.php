<?php
	$db=new Mypdo();
	$manager_concerner=new ConcernerManager($db);
	$manager_bar=new BarManager($db);
	$manager_barathon=new BarathonManager($db);

	$barathons=$manager_barathon->getListByOrgaId($_COOKIE['idOrga']);
	$bars=$manager_bar->getList();
	$listeConcerner=$manager_concerner->getList();
	
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