<?php
	$db=new Mypdo();
	$manager_part=new ParticipantManager($db);
	$manager_orga=new OrganisateurManager($db);
	
	
	if(isset($_POST['email_part'])){
		if($manager_part->getOneByEmail($_POST['email_part']) === null){
			echo "Ce participant n'existe pas ! Veuillez créer un compte.";
		}
		else{
		
			echo "Vous êtes bien connecté en tant que participant !";
		}
	}
	if(isset($_POST['email_orga'])){
		if($manager_orga->getOneByEmail($_POST['email_orga']) === null){
			echo "Cet organisateur n'existe pas ! Veuillez créer un compte.";
		}
		$organisateur=new Organisateur(array('nom'=>$_POST['nom_orga'],
										'email'=>$_POST['email_orga'],
										'mdp'=>md5("B0b".$_POST['mdp_orga']."p0!yEtc#")
										));
		$manager_orga->add($organisateur);
		echo "Vous êtes bien connecté en tant qu'organisateur !";
	}
?>