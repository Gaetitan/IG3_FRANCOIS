<?php
	$db=new Mypdo();
	$manager_barathon=new BarathonManager($db);
	$manager_bar=new BarManager($db);
	
	$bar_villes=$manager_bar->getVilles();
	
	if(isset($_POST['nom_barathon'])){
		if($manager_barathon->getOneByNom($_POST['nom_barathon']) !== null){
			echo "Un barathon portant ce nom existe déjà !";
		}
		else{
			$barathon=new Barathon(array('nom' => $_POST['nom_barathon'],
								'ville' => $_POST['ville_barathon'],
								'nbPlaces_base' => $_POST['nbPlaces_barathon'],
								'nbPlaces' => $_POST['nbPlaces_barathon'],
								'prix' => $_POST['prix_barathon'],
								'date' => $_POST['date_barathon'],
								'orgaId' =>$_COOKIE['idOrga']));
			$manager_barathon->add($barathon);
			echo "Le barathon a bien été créé !";
		}
	}
	
	include_once('view/pages/creerBarathon.php');
?>