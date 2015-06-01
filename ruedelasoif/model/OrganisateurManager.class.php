<?php

class OrganisateurManager{
	
	private $db;
	
	public function __construct($db){
		$this->db=$db;
	}
	
	public function add($organisateur){
		$sql="INSERT INTO organisateur (organom, orgaemail, orgamdp, orgacookie) VALUES  (:nom, :email, :mdp, :cookie)";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $organisateur->getNom(), PDO::PARAM_STR);
		$req->bindValue(':email', $organisateur->getEmail(), PDO::PARAM_STR);
		$req->bindValue(':mdp', $organisateur->getMdp(), PDO::PARAM_STR);
		$req->bindValue(':cookie', $organisateur->getCookie(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function update($organisateur){
		$sql="UPDATE organisateur SET organom=:nom, orgaemail=:email, orgamdp=:mdp, orgacookie=:cookie WHERE orgaid=:numero";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numero', $organisateur->getNumero(), PDO::PARAM_STR);
		$req->bindValue(':nom', $organisateur->getNom(), PDO::PARAM_STR);
		$req->bindValue(':email', $organisateur->getEmail(), PDO::PARAM_STR);
		$req->bindValue(':mdp', $organisateur->getMdp(), PDO::PARAM_STR);
		$req->bindValue(':cookie', $organisateur->getCookie(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function delete($numero){
			$sql="DELETE FROM organisateur WHERE orgaid=:numero";
			$req=$this->db->prepare($sql);
			$req->bindValue(':numero', $numero, PDO::PARAM_STR);
			$req->execute();
			$req->closeCursor();
	}

	public function getOneById($numero){
		$sql="SELECT orgaid as numero, organom as nom, orgaemail as email, orgamdp as mdp, orgacookie as cookie FROM organisateur WHERE orgaid=:numero";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numero', $numero, PDO::PARAM_STR);
		$req->execute();
		
		$organisateur=new Organisateur($req->fetch(PDO::FETCH_OBJ));
		if($organisateur->getNumero()===null) {
			$organisateur=null;
		}
		return $organisateur;
		$req->closeCursor();
	}
	
	public function getOneByEmail($email){
		$sql="SELECT orgaid as numero, organom as nom, orgaemail as email, orgamdp as mdp, orgacookie as cookie FROM organisateur WHERE orgaemail=:email";
		$req=$this->db->prepare($sql);
		$req->bindValue(':email', $email, PDO::PARAM_STR);
		$req->execute();
		
		$organisateur=new Organisateur($req->fetch(PDO::FETCH_OBJ));
		if($organisateur->getNumero()===null) {
			$organisateur=null;
		}
		return $organisateur;
		$req->closeCursor();
	}
	
	public function getOneByCookie($cookie){
		$sql="SELECT orgaid as numero, organom as nom, orgaemail as email, orgamdp as mdp, orgacookie as cookie FROM organisateur WHERE orgacookie=:cookie";
		$req=$this->db->prepare($sql);
		$req->bindValue(':cookie', $cookie, PDO::PARAM_STR);
		$req->execute();
		
		$organisateur=new Organisateur($req->fetch(PDO::FETCH_OBJ));
		if($organisateur->getNumero()===null) {
			$organisateur=null;
		}
		return $organisateur;
		$req->closeCursor();
	}
	
	public function getList(){
		$listeOrganisateur=array();
		
		$sql='SELECT orgaid as numero, orga as nom, orgaemail as email, orgamdp as mdp, orgacookie as cookie FROM organisateur
		ORDER BY organom ASC';
		$req=$this->db->prepare($sql);
		$req->execute();
		
		while($organisateur=$req->fetch(PDO::FETCH_OBJ)){
			$listeOrganisateur[]=new Organisateur($organisateur);
		}
		
		return $listeOrganisateur;
		
		$req->closeCursor();
	}
}

?>