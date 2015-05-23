<?php

class BarathonManager{
	
	private $db;
	
	public function __construct($db){
		$this->db=$db;
	}
	
	public function add($barathon){
		$sql="INSERT INTO barathon (barathonnom, barathonville, barathonnbplaces_base, barathonnbplaces, barathonprix, barathondate, orgaid) VALUES  (:nom, :ville, :nbPlaces_base, :nbPlaces, :prix, :date, :orgaId)";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $barathon->getNom(), PDO::PARAM_STR);
		$req->bindValue(':ville', $barathon->getVille(), PDO::PARAM_STR);
		$req->bindValue(':nbPlaces_base', $barathon->getNbPlaces_base(), PDO::PARAM_STR);
		$req->bindValue(':nbPlaces', $barathon->getNbPlaces(), PDO::PARAM_STR);
		$req->bindValue(':prix', $barathon->getPrix(), PDO::PARAM_STR);
		$req->bindValue(':date', $barathon->getDate(), PDO::PARAM_STR);
		$req->bindValue(':orgaId', $barathon->getOrgaId(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function update($barathon){
		$sql="UPDATE barathon SET barathonnom=:nom, barathonville=:ville, barathonnbplaces_base=:nbPlaces_base, nbplaces=:nbPlaces, barathonprix=:prix, barathondate=:date, orgaid=orgaId";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $barathon->getNom(), PDO::PARAM_STR);
		$req->bindValue(':ville', $barathon->getVille(), PDO::PARAM_STR);
		$req->bindValue(':nbPlaces_base', $barathon->getNbPlaces_base(), PDO::PARAM_STR);
		$req->bindValue(':nbPlaces', $barathon->getNbPlaces(), PDO::PARAM_STR);
		$req->bindValue(':prix', $barathon->getPrix(), PDO::PARAM_STR);
		$req->bindValue(':date', $barathon->getDate(), PDO::PARAM_STR);
		$req->bindValue(':orgaId', $barathon->getOrgaId(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function delete($barathon){
			$sql="DELETE FROM barathon WHERE barathonid=:numero";
			$req=$this->db->prepare($sql);
			$req->bindValue(':numero', $numero, PDO::PARAM_STR);
			$req->execute();
			$req->closeCursor();
	}
	
	public function getOneById($numero){
		$sql="SELECT barathonid as numero, barathonnom as nom, barathonville as ville, barathonnbplaces_base as nbPlaces_base, barathonnbplaces as nbPlaces, barathonprix as prix, barathondate as date, orgaid as orgaId FROM barathon WHERE barathonid=:numero";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numero', $numero, PDO::PARAM_STR);
		$req->execute();
		
		$barathon=new Barathon($req->fetch(PDO::FETCH_OBJ));
		if($barathon->getNumero()===null) {
			$barathon=null;
		}
		return $barathon;
		$req->closeCursor();
	}
	
	public function getOneByVille($ville){
		$sql="SELECT barathonid as numero, barathonnom as nom, barathonville as ville, barathonnbplaces_base as nbPlaces_base, barathonnbplaces as nbPlaces, barathonprix as prix, barathondate as date, orgaid as orgaId FROM barathon WHERE barathonville=:ville";
		$req=$this->db->prepare($sql);
		$req->bindValue(':ville', $ville, PDO::PARAM_STR);
		$req->execute();
		
		$bar=new Bar($req->fetch(PDO::FETCH_OBJ));
		if($bar->getNumero()===null) {
			$participant=null;
		}
		return $participant;
		$req->closeCursor();
	}
	
	public function getList(){
		$listeBarathon=array();
		
		$sql='SELECT barathonid as numero, barathonnom as nom, barathonville as ville, barathonnbplaces_base as nbPlaces_base, barathonnbplaces as nbPlaces, barathonprix as prix, barathondate as date, orgaid as orgaId FROM barathon
		ORDER BY date ASC';
		$req=$this->db->prepare($sql);
		$req->execute();
		
		while($barathon=$req->fetch(PDO::FETCH_OBJ)){
			$listeBarathon[]=new Barathon($barathon);
		}
		
		return $listeBarathon;
		
		$req->closeCursor();
	}
}

?>