<?php

class ParticipantManager{
	
	private $db;
	
	public function __construct($db){
		$this->db=$db;
	}
	
	public function add($participant){
		$sql="INSERT INTO participant (partnom, partprenom, partemail, partmdp) VALUES  (:nom, :prenom, :email, :mdp)";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $participant->getNom(), PDO::PARAM_STR);
		$req->bindValue(':prenom', $participant->getPrenom(), PDO::PARAM_STR);
		$req->bindValue(':email', $participant->getEmail(), PDO::PARAM_STR);
		$req->bindValue(':mdp', $participant->getMdp(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function update($participant){
		$sql="UPDATE participant SET partnom=:nom, partprenom=:prenom, partemail=:email, partmdp=:mdp";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $participant->getNom(), PDO::PARAM_STR);
		$req->bindValue(':prenom', $participant->getPrenom(), PDO::PARAM_STR);
		$req->bindValue(':email', $participant->getEmail(), PDO::PARAM_STR);
		$req->bindValue(':mdp', $participant->getMdp(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function delete($participant){
			$sql="DELETE FROM participant WHERE partid=:numero";
			$req=$this->ds->prepare($sql);
			$req->bindValue(':numero', $numero, PDO::PARAM_STR);
			$req->execute();
			$req->closeCursor();
	}
	
	public function getOneById($numero){
		$sql="SELECT partnum as numero, partnom as nom, partprenom as prenom, partemail as email, partmdp as mdp FROM participant WHERE partid=:numero";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numero', $numero, PDO::PARAM_STR);
		$req->execute();
		
		$participant=new Participant($req->fetch(PDO::FETCH_OBJ));
		if($participant->getNumero()===null) {
			$participant=null;
		}
		return $participant;
		$req->closeCursor();
	}
	
	public function getOneByEmail($email){
		$sql="SELECT partnum as numero, partnom as nom, partprenom as prenom, partemail as email, partmdp as mdp FROM participant WHERE partemail=:email";
		$req=$this->db->prepare($sql);
		$req->bindValue(':email', $email, PDO::PARAM_STR);
		$req->execute();
		
		$participant=new Participant($req->fetch(PDO::FETCH_OBJ));
		if($participant->getNumero()===null) {
			$participant=null;
		}
		return $participant;
		$req->closeCursor();
	}
	
	public function getList(){
		$listeParticipant=array();
		
		$sql='SELECT partid as numero, partnom as nom, partprenom as prenom, partemail as email, partmdp as mdp FROM participant
		ORDER BY partnom ASC';
		$req=$this->db->prepare($sql);
		$req->execute();
		
		while($participant=$req->fetch(PDO::FETCH_OBJ)){
			$listeParticipant[]=new Participant($participant);
		}
		
		return $listeParticipant;
		
		$req->closeCursor();
	}
}

?>