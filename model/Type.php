<?php
//include_once("Model.php");

class Type extends Model{
	
	public function showAll(){
		$statement = $this->pdo->query("select * from types");
		$statement->execute();
		$array = $statement->fetchAll();

		return $array;		
	}

	public function save($name){
		$statement = $this->pdo->prepare("insert into types values(null,?,null)");
		$statement->execute([$name]);
		return $this->pdo->lastInsertId();
	}

	public function find($id){
		$statement = $this->pdo->prepare("select *from types where id=?");
		$statement->execute([$id]);
		$result = $statement->fetch();
		return $result;
	}

	public function update($id,$name){
		$statement = $this->pdo->prepare("update types set name=? where id=?");
		$statement->execute([$name,$id]);
		
	}

	
}