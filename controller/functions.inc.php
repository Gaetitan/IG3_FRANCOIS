<?php
	function getFrenchDate($date){
		$membres=explode('-', $date);
		$membres2=explode(' ', $membres[2]);
		$heure=explode(':', $membres2[1]);
		$date=$membres2[0].'/'.$membres[1].'/'.$membres[0].' à '.$heure[0].'h'.$heure[1];
		return $date;
	}

	function myMd5($mdp){
		return md5("B0b".$mdp."p0!yEtc#");
	}
	
	function mySha1($cookie){
		return sha1("Sw@G@".$cookie."T&c#");
	}
	
?>