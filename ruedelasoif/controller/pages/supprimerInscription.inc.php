<?php
	$db=new Mypdo();
	$manager_participer=new ParticiperManager($db);
	$manager_part=new ParticipantManager($db);
	$manager_barathon=new BarathonManager($db);
	$supprime=False;
	
	$participant=$manager_part->getOneByCookie($_COOKIE['idPart']);
	$listeParticiper=$manager_participer->getListByParticipant($participant->getNumero());
	
	$barathons=array();
	foreach($listeParticiper as $eltParticiper){
		$barathons[]=$manager_barathon->getOneById($eltParticiper->getNumeroBarathon());
	}
	
	if(isset($_POST['inscription'])){
		$participerSuppr=$manager_participer->getOne($_POST['inscription'], $participant->getNumero());
		$manager_participer->delete($participerSuppr);
		$supprime=True;
	}
	
	include_once('view/pages/supprimerInscription.php');
?>