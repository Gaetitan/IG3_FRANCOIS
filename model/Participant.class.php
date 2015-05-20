<?php

class Participant{
	
	private $numero;
	private $nom;
	private $prenom;
	private $email;
	private $mdp;
	
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
				case 'prenom' : $this->setPrenom($valeur);
				break;
				case 'email' : $this->setEmail($valeur);
				break;
				case 'mdp' : $this->setMdp($valeur);
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
	
	public function getPrenom(){
		return $this->prenom;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getMdp(){
		return $this->mdp;
	}
	
	public function setNumero($numero){
		$this->numero=$numero;
	}
	
	public function setNom($nom){
		$this->nom=$nom;
	}
	
	public function setPrenom($prenom){
		$this->prenom=$prenom;
	}
	
	public function setEmail($email){
		$this->email=$email;
	}
	
	public function setMdp($mdp){
		$this->mdp=$mdp;
	}
	
}

?>