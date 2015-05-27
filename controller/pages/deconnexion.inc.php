<?php
	if(!empty($_COOKIE['idPart'])){
		setcookie("idPart");
	}
	if(!empty($_COOKIE['idOrga'])){
		setcookie("idOrga");
	}
	header('Location: http://ruedelasoif-gaetitan.rhcloud.com/index.php');
	include_once("view/pages/deconnexion.php");
?>