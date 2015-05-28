<?php
	$db=new Mypdo();
	$manager_part=new ParticipantManager($db);
	$manager_orga=new OrganisateurManager($db);
	$existe=False;
	$cree=False;
	
	if(isset($_POST['nom_part'])){var_dump($participant);
		if($manager_part->getOneByEmail($_POST['email_part']) !== null){
			$existe=True;
		}
		else{
			$participant=new Participant(array('nom' => $_POST['nom_part'],
											'prenom' => $_POST['prenom_part'],
											'email' => $_POST['email_part'],
											'mdp' => myMd5($_POST['mdp_part']),
											'cookie' => NULL));
											var_dump($participant);
			$manager_part->add($participant);
			$cree=True;
		}
	}
	if(isset($_POST['nom_orga'])){
		if($manager_orga->getOneByEmail($_POST['email_orga']) !== null){
			$existe=True;
		}
		else{
			$organisateur=new Organisateur(array('nom'=>$_POST['nom_orga'],
											'email'=>$_POST['email_orga'],
											'mdp'=>myMd5($_POST['mdp_orga']),
											'cookie' => NULL));
			$manager_orga->add($organisateur);
			$cree=True;
		}
	}
	
	include_once("view/pages/creerCompte.php");
?>