<?php
	$db=new Mypdo();
	$manager_barathon=new BarathonManager($db);
	$manager_orga=new OrganisateurManager($db);
	$supprime=False;
	
	$organisateur=$manager_orga->getOneByCookie($_COOKIE['idOrga']);
	$barathons=$manager_barathon->getListByOrgaId($organisateur->getNumero());
	
	if(isset($_POST['barathon'])){
		$barathon=$manager_barathon->getOneById($_POST['barathon']);
		$manager_barathon->delete($barathon);
		$supprime=True;
	}
	
	include_once('view/pages/supprimerBarathon.php');
?>