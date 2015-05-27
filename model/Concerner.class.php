<?php

class Concerner{
	
	private $numeroBarathon;
	private $numeroBar;

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
				case 'numeroBar' : $this->setNumeroBar($valeur);
				break;
			}
		}
	}
	
	public function getNumeroBarathon(){
		return $this->numeroBarathon;
	}
	
	public function getNumeroBar(){
		return $this->numeroBar;
	}
	
	public function setNumeroBarathon($numeroBarathon){
		$this->numeroBarathon=$numeroBarathon;
	}
	
	public function setNumeroBar($numeroBar){
		$this->numeroBar=$numeroBar;
	}

}

?>