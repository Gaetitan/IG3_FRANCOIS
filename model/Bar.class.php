<?php

class Bar{
	
	private $numero;
	private $nom;
	private $numAdresse;
	private $rue;
	private $ville;
	private $codePostal;
	
	public function __construct($valeurs=array()){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}
	
	public function affecte($donnees){
		foreach ($donnees as $attribut => $valeur){
			switch($attribut){
				case 'numero' : $this->setNumero($valeur);
				break;
				case 'nom' : $this->setNom($valeur);
				break;
				case 'numAdresse' : $this->setNumAdresse($valeur);
				break;
				case 'rue' : $this->setRue($valeur);
				break;
				case 'ville' : $this->setVille($valeur);
				break;
				case 'codePostal' : $this->setCodePostal($valeur);
				break;
			}
		}
	}
	
	public function getNumero(){
		return $this->numero;
	}
	
	public function getNom(){
		return $this->nom;
	}
	
	public function getNumAdresse(){
		return $this->numAdresse;
	}
	
	public function getRue(){
		return $this->rue;
	}
	
	public function getVille(){
		return $this->ville;
	}
	
	public function getCodePostal(){
		return $this->codePostal;
	}
	
	public function setNumero($numero){
		$this->numero=$numero;
	}
	
	public function setNom($nom){
		$this->nom=$nom;
	}
	
	public function setNumAdresse($numAdresse){
		$this->numAdresse=$numAdresse;
	}
	
	public function setRue($rue){
		$this->rue=$rue;
	}
	
	public function setVille($ville){
		$this->ville=$ville;
	}
	
	public function setCodePostal($codePostal){
		$this->codePostal=$codePostal;
	}
	
}

?>