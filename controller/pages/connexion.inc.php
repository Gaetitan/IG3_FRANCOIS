<?php	
	$db=new Mypdo();
	$manager_part=new ParticipantManager($db);
	$manager_orga=new OrganisateurManager($db);
	
	if(isset($_POST['email_part'])){
		if($manager_part->getOneByEmail($_POST['email_part']) === null){
			echo "Ce participant n'existe pas ! Veuillez créer un compte.";
		}
		else{
			if(md5("B0b".$_POST['mdp_part']."p0!yEtc#")===$manager_part->getOneByEmail($_POST['email_part'])->getMdp()){
				$cookie=$manager_part->getOneByEmail($_POST['email_part'])->getNumero();
				setcookie("idPart", $cookie, time()+365*24*3600);
				header('Location: http://localhost/ruedelasoif/index.php');
			}
			else{
				echo "Mot de passe incorrect. Veuillez saisir à nouveau vos informations.";
			}
		}
	}
	if(isset($_POST['email_orga'])){
		if($manager_orga->getOneByEmail($_POST['email_orga']) === null){
			echo "Cet organisateur n'existe pas ! Veuillez créer un compte.";
		}
		else{
			if(md5("B0b".$_POST['mdp_orga']."p0!yEtc#")===$manager_orga->getOneByEmail($_POST['email_orga'])->getMdp()){
				$cookie=$manager_orga->getOneByEmail($_POST['email_orga'])->getNumero();
				setcookie("idOrga", $cookie, time()+365*24*3600);
				header('Location: http://localhost/ruedelasoif/index.php');
			}
			else{
				echo "Mot de passe incorrect. Veuillez saisir à nouveau vos informations.";
			}
		}
	}
	
	include_once('view/pages/connexion.php');
?>