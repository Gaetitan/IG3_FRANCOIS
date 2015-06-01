<?php

class ConcernerManager{
	
	private $db;
	
	public function __construct($db){
		$this->db=$db;
	}
	
	public function add($concerner){
		$sql="INSERT INTO concerner (barathonid, barid) VALUES (:numeroBarathon, :numeroBar)";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numeroBarathon', $concerner->getNumeroBarathon(), PDO::PARAM_STR);
		$req->bindValue(':numeroBar', $concerner->getNumeroBar(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function getList(){
		$listeConcerner=array();
		
		$sql='SELECT barathonid as numeroBarathon, barid as numeroBar FROM concerner
		ORDER BY barathonid ASC';
		$req=$this->db->prepare($sql);
		$req->execute();
		
		while($concerner=$req->fetch(PDO::FETCH_OBJ)){
			$listeConcerner[]=new Concerner($concerner);
		}
		
		return $listeConcerner;
		
		$req->closeCursor();
	}
	
	public function getListByBarathon($numeroBarathon){
		$listeConcerner=array();
		
		$sql='SELECT barathonid as numeroBarathon, barid as numeroBar FROM concerner WHERE barathonid=:numeroBarathon';
		$req=$this->db->prepare($sql);
		$req->bindValue(':numeroBarathon', $numeroBarathon, PDO::PARAM_STR);
		$req->execute();
		
		while($concerner=$req->fetch(PDO::FETCH_OBJ)){
			$listeConcerner[]=new Concerner($concerner);
		}
		
		return $listeConcerner;
		
		$req->closeCursor();
	}
	
	public function isPresent($numeroBarathon, $numeroBar){
		$sql="SELECT barathonid as numeroBarathon, barid as numeroBar FROM concerner WHERE barathonid=:numeroBarathon AND barid=:numeroBar";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numeroBarathon', $numeroBarathon, PDO::PARAM_STR);
		$req->bindValue(':numeroBar', $numeroBar, PDO::PARAM_STR);
		$req->execute();
		
		$isPresent=$req->fetch(PDO::FETCH_OBJ);
		
		return !empty($isPresent);	
	}
	
}
?>