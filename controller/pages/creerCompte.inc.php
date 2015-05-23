<?php
	$db=new Mypdo();
	$manager_part=new ParticipantManager($db);
	$manager_orga=new OrganisateurManager($db);
	
	
	if(isset($_POST['nom_part'])){
		if($manager_part->getOneByEmail($_POST['email_part']) !== null){
			echo "Ce participant existe déjà !";
		}
		else{
			$participant=new Participant(array('nom' => $_POST['nom_part'],
											'prenom' => $_POST['prenom_part'],
											'email' => $_POST['email_part'],
											'mdp' => md5("B0b".$_POST['mdp_part']."p0!yEtc#")));
			$manager_part->add($participant);
			echo "Votre compte participant a bien été créé !";
		}
	}
	if(isset($_POST['nom_orga'])){
		if($manager_orga->getOneByEmail($_POST['email_orga']) !== null){
			echo "Cet organisateur existe déjà !";
		}
		else{
			$organisateur=new Organisateur(array('nom'=>$_POST['nom_orga'],
											'email'=>$_POST['email_orga'],
											'mdp'=>md5("B0b".$_POST['mdp_orga']."p0!yEtc#")
											));
			$manager_orga->add($organisateur);
			echo "Votre compte organisateur a bien été créé !";
		}
	}
	
	include_once("view/pages/creerCompte.php");
?>