<?php

class OrganisateurManager{
	
	private $db;
	
	public function __construct($db){
		$this->db=$db;
	}
	
	public function add($organisateur){
		$sql="INSERT INTO organisateur (organom, orgaemail, orgamdp) VALUES  (:nom, :email, :mdp)";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $organisateur->getNom(), PDO::PARAM_STR);
		$req->bindValue(':email', $organisateur->getEmail(), PDO::PARAM_STR);
		$req->bindValue(':mdp', $organisateur->getMdp(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function update($organisateur){
		$sql="UPDATE organisateur SET organom=:nom, orgaemail=:email, orgamdp=:mdp";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $organisateur->getNom(), PDO::PARAM_STR);
		$req->bindValue(':email', $organisateur->getEmail(), PDO::PARAM_STR);
		$req->bindValue(':mdp', $organisateur->getMdp(), PDO::PARAM_STR);
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
		$sql="SELECT orgaid as numero, organom as nom, orgaemail as email, orgamdp as mdp FROM organisateur WHERE orgaid=:numero";
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
		$sql="SELECT orgaid as numero, organom as nom, orgaemail as email, orgamdp as mdp FROM organisateur WHERE orgaemail=:email";
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
	
	public function getList(){
		$listeOrganisateur=array();
		
		$sql='SELECT orgaid as numero, orga as nom, orgaemail as email, orgamdp as mdp FROM organisateur
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