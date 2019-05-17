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
		$article = $statement->fetch();
		return $article;
	}

	public function find5Record(){
		$articles = $this->pdo->query("select a.*,u.u_name uname from articles a 
			join users u on a.a_uid=u.u_id 
			order by a_date limit 5;");
		return $articles;
	}

	public function update($a_id,$a_title,$a_begin_text,$a_photo,$a_content){
		$statement = $this->pdo->prepare("update articles set a_title=?,a_begin_text=?,a_photo=?,a_content=? where a_id=?");
		$statement->execute([$a_title,$a_begin_text,$a_photo,$a_content,$a_id]);
	}

	public function delete($a_id){
		$statement = $this->pdo->prepare("delete from articles where a_id=?");
		$statement->execute([$a_id]);
	}

	public function save($a_title,$a_begin_text,$a_content,$a_uid,$clean_filename){
		$statement = $this->pdo->prepare("insert into articles values(default,?,?,?,default,?,?)");
		$statement->execute([$a_title,$a_begin_text,$a_content,$a_uid,$a_photo]);
		return $this->pdo->lastInsertId();
	}
}