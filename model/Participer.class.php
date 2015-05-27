<?php

class Participer{
	
	private $numeroBarathon;
	private $numeroParticipant;

	public function __construct($valeurs=array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}
	
	public function affecte($donnees){
		foreach ($donnees as $attribut => $valeur){
			switch($attribut){
				case 'numeroBarathon' : $this->setNumeroBarathon($valeur);
				break;
				case 'numeroParticipant' : $this->setNumeroParticipant($valeur);
				break;
			}
		}
	}
	
	public function getNumeroBarathon(){
		return $this->numeroBarathon;
	}
	
	public function getNumeroParticipant(){
		return $this->numeroParticipant;
	}
	
	public function setNumeroBarathon($numeroBarathon){
		$this->numeroBarathon=$numeroBarathon;
	}
	
	public function setNumeroParticipant($numeroParticipant){
		$this->numeroParticipant=$numeroParticipant;
	}

}

?>