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

	#获取表格中的记录条数
	public function getCount(){
		$statement = $this->pdo->query("select count(*) from types");
		$rows = $statement->fetch();
		return $rows[0];
	}

	#将表格中的记录分页显示
	public function page($page){
		$page = $page*5+1;
		$nextPage =$page+5;
		$statement = $this->pdo->prepare("select * from 
        (select rownum rn,t.* from v_types t) e 
        where e.rn>=? and e.rn<?");
		$statement->execute([$page,$nextPage]);
		$result = $statement->fetchAll();
		return $result;
	}

	
}