<?php

class Barathon{
	
	private $numero;
	private $nom;
	private $ville;
	private $nbPlaces_base;
	private $nbPlaces;
	private $prix;
	private $date;
	private $orgaId;
	
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
				case 'ville' : $this->setVille($valeur);
				break;
				case 'nbPlaces_base' : $this->setNbPlaces_base($valeur);
				break;
				case 'nbPlaces' : $this->setNbPlaces($valeur);
				break;
				case 'prix' : $this->setPrix($valeur);
				break;
				case 'date' : $this->setDate($valeur);
				break;
				case 'orgaId' : $this->setOrgaId($valeur);
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
	
	public function getVille(){
		return $this->ville;
	}
	
	public function getNbPlaces_base(){
		return $this->nbPlaces_base;
	}
	
	public function getNbPlaces(){
		return $this->nbPlaces;
	}
	
	public function getPrix(){
		return $this->prix;
	}
	
	public function getDate(){
		return $this->date;
	}
	
	public function getOrgaId(){
		return $this->orgaId;
	}
	
	public function setNumero($numero){
		$this->numero=$numero;
	}
	
	public function setNom($nom){
		$this->nom=$nom;
	}
	
	public function setVille($ville){
		$this->ville=$ville;
	}
	
	public function setNbPlaces_base($nbPlaces_base){
		$this->nbPlaces_base=$nbPlaces_base;
	}
	
	public function setNbPlaces($nbPlaces){
		$this->nbPlaces=$nbPlaces;
	}
	
	public function setPrix($prix){
		$this->prix=$prix;
	}
	
	public function setDate($date){
		$this->date=$date;
	}
	
	public function setOrgaId($orgaId){
		$this->orgaId=$orgaId;
	}
	
}

?>