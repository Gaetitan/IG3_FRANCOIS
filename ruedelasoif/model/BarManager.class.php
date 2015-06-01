<?php

class BarManager{
	
	private $db;
	
	public function __construct($db){
		$this->db=$db;
	}
	
	public function add($bar){
		$sql="INSERT INTO bar (barnom, barnumadresse, barrueadresse, barvilleadresse, barcpadresse) VALUES  (:nom, :numAdresse, :rue, :ville, :codePostal)";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $bar->getNom(), PDO::PARAM_STR);
		$req->bindValue(':numAdresse', $bar->getNumAdresse(), PDO::PARAM_STR);
		$req->bindValue(':rue', $bar->getRue(), PDO::PARAM_STR);
		$req->bindValue(':ville', $bar->getVille(), PDO::PARAM_STR);
		$req->bindValue(':codePostal', $bar->getCodePostal(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function update($bar){
		$sql="UPDATE bar SET barnom=:nom, barnumadresse=:numAdresse, barrueadresse=:rue, barvilleadresse=:ville, barcpadresse=:codePostal";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $bar->getNom(), PDO::PARAM_STR);
		$req->bindValue(':numadresse', $bar->getNumAdresse(), PDO::PARAM_STR);
		$req->bindValue(':rue', $bar->getRue(), PDO::PARAM_STR);
		$req->bindValue(':ville', $bar->getVille(), PDO::PARAM_STR);
		$req->bindValue(':codePostal', $bar->getCodePostal(), PDO::PARAM_STR);
		$req->execute();
		$req->closeCursor();
	}
	
	public function delete($bar){
			$sql="DELETE FROM bar WHERE barid=:numero";
			$req=$this->db->prepare($sql);
			$req->bindValue(':numero', $numero, PDO::PARAM_STR);
			$req->execute();
			$req->closeCursor();
	}
	
	public function getOneById($numero){
		$sql="SELECT barid as numero, barnom as nom, barnumadresse as numAdresse, barrueadresse as rue, barvilleadresse as ville, barcpadresse as codePostal FROM bar WHERE barid=:numero";
		$req=$this->db->prepare($sql);
		$req->bindValue(':numero', $numero, PDO::PARAM_STR);
		$req->execute();
		
		$bar=new Bar($req->fetch(PDO::FETCH_OBJ));
		if($bar->getNumero()===null) {
			$bar=null;
		}
		return $bar;
		$req->closeCursor();
	}
	
	public function getOneByVille($ville){
		$sql="SELECT barid as numero, barnom as nom, barnumadresse as numAdresse, barrueadresse as rue, barvilleadresse as ville, barcpadresse as codePostal FROM bar WHERE barvilleadresse=:ville";
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
	
	public function getOneByNom($nom){
		$sql="SELECT barid as numero, barnom as nom, barnumadresse as numAdresse, barrueadresse as rue, barvilleadresse as ville, barcpadresse as codePostal FROM bar WHERE barnom=:nom";
		$req=$this->db->prepare($sql);
		$req->bindValue(':nom', $nom, PDO::PARAM_STR);
		$req->execute();
		
		$bar=new Bar($req->fetch(PDO::FETCH_OBJ));
		if($bar->getNumero()===null) {
			$bar=null;
		}
		return $bar;
		$req->closeCursor();
	}
	
	public function getList(){
		$listeBar=array();
		
		$sql='SELECT barid as numero, barnom as nom, barnumadresse as numAdresse, barrueadresse as rue, barvilleadresse as ville, barcpadresse as codePostal FROM bar
		ORDER BY barnom ASC';
		$req=$this->db->prepare($sql);
		$req->execute();
		
		while($bar=$req->fetch(PDO::FETCH_OBJ)){
			$listeBar[]=new Bar($bar);
		}
		
		return $listeBar;
		
		$req->closeCursor();
	}
	
	public function getVilles(){
		$listeBar=array();
		
		$sql='SELECT DISTINCT barvilleadresse as ville FROM bar ORDER BY barvilleadresse ASC';
		$req=$this->db->prepare($sql);
		$req->execute();
		
		while($bar=$req->fetch(PDO::FETCH_OBJ)){
			$listeBar[]=new Bar($bar);
		}
		
		return $listeBar;
		
		$req->closeCursor();
	}
	
	public function getListByVille($ville){
		$listeBar=array();
		
		$sql='SELECT barid as numero, barnom as nom, barnumadresse as numAdresse, barrueadresse as rue, barvilleadresse as ville, barcpadresse as codePostal FROM bar
		WHERE barvilleadresse=:ville';
		$req=$this->db->prepare($sql);
		$req->bindValue(':ville', $ville, PDO::PARAM_STR);
		$req->execute();
		
		while($bar=$req->fetch(PDO::FETCH_OBJ)){
			$listeBar[]=new Bar($bar);
		}
		
		return $listeBar;
		
		$req->closeCursor();
	}
}

?>