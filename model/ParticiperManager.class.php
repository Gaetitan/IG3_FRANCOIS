<?php

class ParticiperManager{
	
	private $db;
	
	public function __construct($db){
		$this->db=$db;
	}
	
	public function add($participer){
		$sql="INSERT INTO participer (barathonid, partid) VALUES (:numeroBarathon, :numeroParticipant)";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numeroBarathon', $participer->getNumeroBarathon(), PDO::PARAM_STR);
		$req->bindValue(':numeroParticipant', $participer->getNumeroParticipant(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function delete($participer){
			$sql="DELETE FROM participer WHERE barathonid=:numero";
			$req=$this->db->prepare($sql);
			$req->bindValue(':numero', $participer->getNumeroBarathon(), PDO::PARAM_STR);
			$req->execute();
			$req->closeCursor();
	}
	
	public function getListByParticipant($numeroParticipant){
		$listeParticiper=array();
		
		$sql='SELECT barathonid as numeroBarathon, partid as numeroParticipant FROM participer WHERE partid=:numeroParticipant';
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
		
		$sql='SELECT barathonid as numeroBarathon, partid as numeroParticipant FROM participer WHERE barathonid=:numeroBarathon';
		$req=$this->db->prepare($sql);
		$req->bindValue(':numeroBarathon', $numeroBarathon, PDO::PARAM_STR);
		$req->execute();
		
		while($participer=$req->fetch(PDO::FETCH_OBJ)){
			$listeParticiper[]=new Participer($participer);
		}
		
		return $listeParticiper;
		
		$req->closeCursor();
	}
	
	public function getOne($numeroBarathon, $numeroParticipant){
		$sql='SELECT barathonid as numeroBarathon, partid as numeroParticipant FROM participer WHERE barathonid=:numeroBarathon AND partid=:numeroParticipant';
		$req=$this->db->prepare($sql);
		$req->bindValue(':numeroBarathon', $numeroBarathon, PDO::PARAM_STR);
		$req->bindValue(':numeroParticipant', $numeroParticipant, PDO::PARAM_STR);
		$req->execute();
		
		$participer=new Participer($req->fetch(PDO::FETCH_OBJ));
		if($participer->getNumeroBarathon()===null && $participer->getNumeroParticipant()===null) {
			$participer=null;
		}
		return $participer;
		
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