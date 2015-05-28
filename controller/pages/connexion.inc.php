<?php	
	$db=new Mypdo();
	$manager_part=new ParticipantManager($db);
	$manager_orga=new OrganisateurManager($db);
	$existe=True;
	$bonIdentifiant=True;
	
	if(isset($_POST['email_part'])){
		$participant=$manager_part->getOneByEmail($_POST['email_part']);
		if($participant === null){
			$existe=False;
		}
		else{
			if(myMd5($_POST['mdp_part'])===$participant->getMdp()){
				$cookie=mySha1($participant->getNumero());
				$participant->setCookie($cookie);var_dump($manager_part);
				$manager_part->update($participant);
				setcookie("idPart", $cookie, time()+365*24*3600);
				//header('Location: http://ruedelasoif-gaetitan.rhcloud.com/index.php');
			}
			else{
				$bonIdentifiant=False;
			}
		}
	}
	if(isset($_POST['email_orga'])){
		$organisateur=$manager_orga->getOneByEmail($_POST['email_orga']);
		if($organisateur === null){
			$existe=False;
		}
		else{
			if(myMd5($_POST['mdp_orga'])===$organisateur->getMdp()){
				$cookie=mySha1($organisateur->getNumero());
				$organisateur->setCookie($cookie);
				$manager_orga->update($organisateur);
				setcookie("idOrga", $cookie, time()+365*24*3600);
				header('Location: http://ruedelasoif-gaetitan.rhcloud.com/index.php');
			}
			else{
				$bonIdentifiant=False;
			}
		}
	}
	
	include_once('view/pages/connexion.php');
?>