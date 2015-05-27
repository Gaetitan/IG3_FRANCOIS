<?php
	if(!empty($_COOKIE['idPart'])){
		setcookie("idPart");
	}
	if(!empty($_COOKIE['idOrga'])){
		setcookie("idOrga");
	}
	header('Location: http://localhost/ruedelasoif/index.php');
	include_once("view/pages/deconnexion.php");
?>