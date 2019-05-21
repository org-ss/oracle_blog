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

	public function delete($mId){
		$statement = $this->pdo->prepare("delete from messages where m_id=?");
		$statement->execute([$mId]);
	}

	public function deleteAll(){
		$statement = $this->pdo->query("delete from messages");
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