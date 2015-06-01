<?php
	$db=new Mypdo();
	$manager_barathon=new BarathonManager($db);
	$manager_bar=new BarManager($db);
	$manager_orga=new OrganisateurManager($db);
	
	$bar_villes=$manager_bar->getVilles();
	
	$existe=False;
	$cree=False;
	$datePassee=False;
	
	if(isset($_POST['nom_barathon'])){
		if($manager_barathon->getOneByNom($_POST['nom_barathon']) !== null){
			$existe=True;
		}
		else{
			$date=date("Y-m-dTH:i");
			if($_POST['date_barathon']<$date){
				$datePassee=True;
			}
			else{
				$orga=$manager_orga->getOneByCookie($_COOKIE['idOrga']);
				$barathon=new Barathon(array('nom' => $_POST['nom_barathon'],
									'ville' => $_POST['ville_barathon'],
									'nbPlaces_base' => $_POST['nbPlaces_barathon'],
									'nbPlaces' => $_POST['nbPlaces_barathon'],
									'prix' => $_POST['prix_barathon'],
									'date' => $_POST['date_barathon'],
									'orgaId' =>$orga->getNumero()));
									
				$manager_barathon->add($barathon);
				$cree=True;
			}
		}
	}
	
	include_once('view/pages/creerBarathon.php');
?>