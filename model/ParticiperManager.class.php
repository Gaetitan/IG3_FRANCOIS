<?php

class ParticiperManager{
	
	private $db;
	
	public function __construct($db){
		$this->db=$db;
	}
	
	public function add($numeroBarathon, $numeroParticipant){
		$sql="INSERT INTO participer (barathonid, partid) VALUES (:numeroBarathon, :numeroParticipant)";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numeroBarathon', $numeroBarathon, PDO::PARAM_STR);
		$req->bindValue(':numeroParticipant', $numeroParticipant, PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function getListByParticipant($numeroParticipant){
		$listeParticiper=array();
		
		$sql='SELECT barathonid as numeroBarathon, partid as numeroParticipant WHERE partid=:numeroParticipant';
		$req=$this->db->prepare($sql);
		$req->bindValue(':numeroParticipant', $numeroParticipant, PDO::PARAM_STR);
		$req->execute();
		
		while($participer=$req->fetch(PDO::FETCH_OBJ)){
			$listeParticiper[]=new Participer($participer);
		}
		
		return $listeParticiper;
		
		$req->closeCursor();
	}
	
	public function getListByBarathon($numeroBarathon){
		$listeParticiper=array();
		
		$sql='SELECT barathonid as numeroBarathon, partid as numeroParticipant WHERE barathonid=:numeroBarathon';
		$req=$this->db->prepare($sql);
		$req->bindValue(':numeroBarathon', $numeroBarathon, PDO::PARAM_STR);
		$req->execute();
		
		while($participer=$req->fetch(PDO::FETCH_OBJ)){
			$listeParticiper[]=new Participer($participer);
		}
		
		return $listeParticiper;
		
		$req->closeCursor();
	}
	
	public function isPresent($numeroBarathon, $numeroParticipant){
		$sql="SELECT barathonid as numeroBarathon, partid as numeroParticipant FROM participer WHERE barathonid=:numeroBarathon AND partid=:numeroParticipant";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numeroBarathon', $numeroBarathon, PDO::PARAM_STR);
		$req->bindValue(':numeroParticipant', $numeroParticipant, PDO::PARAM_STR);
		$req->execute();
		
		$isPresent=$req->fetch(PDO::FETCH_OBJ);
		
		return !empty($isPresent);	
	}
}

?>