<?php
include_once('Model.php');

class Photo extends Model{

	public function showAll($uid){
        $statment=$this->pdo->prepare("select p.*,u.u_name uname from photos p join users u on p.p_uid=u.u_id where p_uid=?");
        $statment->execute([$uid]);
        $photos=$statment->fetchAll();
        return $photos;
    }

    public function find5Record(){
		$photos = $this->pdo->query("select p.*,u.u_name uname from photos p 
			join users u on p.p_uid=u.u_id 
			order by p_date limit 5;");
		return $photos;
	}

	public function delete($p_id){
		$statment = $this->pdo->prepare("delete from photos where p_id=?");
		$statment->execute([$p_id]);
	}

	public function save($p_name,$p_uid){
		$statment = $this->pdo->prepare("insert into photos values(default,?,default,?)");
		$statment->execute([$p_name,$p_uid]);
		return $this->pdo->lastInsertId();
	}

	public function deleteAll(){
		$statement = $this->pdo->query("delete from photos");
	}

	public function getCount(){
		$statement = $this->pdo->query("select * from photos");
		$num = $statement->fetchColumn();#返回结果集中的一个字段
		return $num;
	}

	public function page($page){
		$page = $page*5;
		$sql = "select p.*,u.u_name uname from photos p join users u on p.p_uid=u.u_id order by p_id limit ".$page.",5";
		$statement = $this->pdo->query($sql);
		$result = $statement->fetchAll();
		return $result;
	}
}