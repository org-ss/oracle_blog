<?php
include_once("Model.php");

class Type extends Model{
	
	public function showAll(){
		
		$statement = $this->pdo->prepare("select * from types");
		$statement->execute();
		$types = $statement->fetchAll();
		return $types;
	
	}

	
}