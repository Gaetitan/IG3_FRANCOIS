<?php

class ParticipantManager{
	
	private $db;
	
	public function __construct($db){
		$this->db=$db;
	}
	
	public function add($participant){
		$sql="INSERT INTO PARTICIPANT (partnom, partprenom, partemail, partmdp, partcookie) VALUES  (:nom, :prenom, `:email`, :mdp, :cookie)";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $participant->getNom(), PDO::PARAM_STR);
		$req->bindValue(':prenom', $participant->getPrenom(), PDO::PARAM_STR);
		$req->bindValue(':email', $participant->getEmail(), PDO::PARAM_STR);
		$req->bindValue(':mdp', $participant->getMdp(), PDO::PARAM_STR);
		$req->bindValue(':cookie', $participant->getCookie(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function update($participant){
		$sql="UPDATE participant SET partnom=:nom, partprenom=:prenom, partemail=:email, partmdp=:mdp, partcookie=:cookie WHERE partid=:numero";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numero', $participant->getNumero(), PDO::PARAM_STR);
		$req->bindValue(':nom', $participant->getNom(), PDO::PARAM_STR);
		$req->bindValue(':prenom', $participant->getPrenom(), PDO::PARAM_STR);
		$req->bindValue(':email', $participant->getEmail(), PDO::PARAM_STR);
		$req->bindValue(':mdp', $participant->getMdp(), PDO::PARAM_STR);
		$req->bindValue(':cookie', $participant->getCookie(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function delete($numero){
			$sql="DELETE FROM participant WHERE partid=:numero";
			$req=$this->db->prepare($sql);
			$req->bindValue(':numero', $numero, PDO::PARAM_STR);
			$req->execute();
			$req->closeCursor();
	}
	
	public function getOneById($numero){
		$sql="SELECT partid as numero, partnom as nom, partprenom as prenom, partemail as email, partmdp as mdp, partcookie as cookie FROM participant WHERE partid=:numero";
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
		$sql="SELECT partid as numero, partnom as nom, partprenom as prenom, partemail as email, partmdp as mdp, partcookie as cookie FROM participant WHERE partemail=:email";
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
	
	public function getOneByCookie($cookie){
		$sql="SELECT partid as numero, partnom as nom, partprenom as prenom, partemail as email, partmdp as mdp, partcookie as cookie FROM participant WHERE partcookie=:cookie";
		$req=$this->db->prepare($sql);
		$req->bindValue(':cookie', $cookie, PDO::PARAM_STR);
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
		
		$sql='SELECT partid as numero, partnom as nom, partprenom as prenom, partemail as email, partmdp as mdp, partcookie as cookie FROM participant
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