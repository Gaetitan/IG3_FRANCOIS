<?php
	$db=new Mypdo();
	$manager=new BarManager($db);
	$existe=False;
	$ajoute=False;
	
	if(isset($_POST['nom_bar'])){
		if($manager->getOneByNom($_POST['nom_bar']) !== null){
			$existe=True;
		}
		else{
			$bar=new Bar(array('nom' => $_POST['nom_bar'],
								'numAdresse' => $_POST['numadresse_bar'],
								'rue' => $_POST['rue_bar'],
								'ville' => $_POST['ville_bar'],
								'codePostal' => $_POST['codepostal_bar']));
			$manager->add($bar);
			$ajoute=True;
		}
	}
	
	include_once('view/pages/ajouterBar.php');
?>