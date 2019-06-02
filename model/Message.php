<?php
include_once("Model.php");
class Message extends Model{

	public function showAll($uId){
		$statement = $this->pdo->prepare("select * from messages where m_uid=?");
		$statement->execute([$uId]);
		$messages = $statement->fetchAll();
		return $messages;
	}

	public function messageSave($m_name,$m_content,$m_uid){
		$statment = $this->pdo->prepare("insert into messages values(default,?,?,?,default)");
		$statment->execute([$m_name,$m_content,$m_uid]);

	}

	#删除某条留言
	public function delete($mId){
		$statement = $this->pdo->prepare("delete from messages where m_id=?");
		$statement->execute([$mId]);
	}

	#删除所有留言
	public function deleteAll(){
		$statement = $this->pdo->query("delete from messages");
	}

	#获得表中记录条数
	public function getCount(){
		$statement = $this->pdo->query("select * from messages");
		$num = $statement->fetchColumn();#返回结果集中的一个字段
		return $num;
	}

	#将表中数据分页显示
	public function page($page){
		$page = $page*5;
		$sql = "select m.*,u.u_name uname from messages m join users u on m.m_uid=u.u_id order by m_id limit ".$page.",5";
		$statement = $this->pdo->query($sql);
		$result = $statement->fetchAll();
		return $result;
	}

	//验证留言者是否注册
	// public function check($m_name){
	// 	$statement = $this->pdo->prepare("select * from users where u_name=?");
	// 	$statement->execute([$m_name]);
	// 	$user=$statement->fetchAll();
	// 	if ($user) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }
	
}