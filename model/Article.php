<?php
include_once("Model.php");
class Article extends Model{

	public function showAll($uid){
		$statement = $this->pdo->prepare("select a.*,u.u_name as a_uname from articles a join users u on a.a_uid=u.u_id  where a_uid=?");
		$statement->execute([$uid]);
		$articles = $statement->fetchAll();
		return $articles;
	}

	public function find($aid){
		$statement = $this->pdo->prepare("select a.*,u.u_name as a_uname from articles a join users u on a.a_uid=u.u_id  where a_id=?");
		$statement->execute([$aid]);
		$article = $statement->fetchAll();
		return $article;
	}
}