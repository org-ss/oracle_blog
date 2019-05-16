<?php
include_once('Model.php');

class User extends Model{
	public function returnAdmin(){#返回博客主人
		$statement = $this->pdo->prepare("select *from users where id=1");
		$user = $statement->fetch();
		return $user;

	}
}