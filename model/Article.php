<?php
include_once("Model.php");

class Article extends Model{

	#展示所有文章
	public function showAll($uid){
		$statement = $this->pdo->prepare("select a.*,u.u_name as a_uname from articles a join users u on a.a_uid=u.u_id  where a_uid=?");
		$statement->execute([$uid]);
		$articles = $statement->fetchAll();
		return $articles;
	}

	#展示某一篇文章的具体内容
	public function find($aid){
		$statement = $this->pdo->prepare("select a.*,u.u_name as a_uname from articles a join users u on a.a_uid=u.u_id  where a_id=?");
		$statement->execute([$aid]);
		$article = $statement->fetch();
		return $article;
	}

	#展示最新的5篇文章
	public function find5Record($uId){
		$statement = $this->pdo->prepare("select a.*,u.u_name uname from articles a 
			join users u on a.a_uid=u.u_id where a.a_uid=? 
			order by a_date limit 5;");
		$statement->execute([$uId]);
		$articles = $statement->fetchAll();
		return $articles;
	}

	#更新文章内容
	public function update($a_id,$a_title,$a_begin_text,$a_photo,$a_content){
		$statement = $this->pdo->prepare("update articles set a_title=?,a_begin_text=?,a_photo=?,a_content=? where a_id=?");
		$statement->execute([$a_title,$a_begin_text,$a_photo,$a_content,$a_id]);
	}

	#删除某篇文章
	public function delete($a_id){
		$statement = $this->pdo->prepare("delete from articles where a_id=?");
		$statement->execute([$a_id]);
	}

	#获取表格中的记录条数
	public function getCount(){
		$statement = $this->pdo->prepare("select * from articles");
		$statement->execute();#返回结果集中的一个字段
		$num = $statement->rowCount();
		return $num;
	}

	#将表格中的记录分页显示
	public function page($page){
		$page = $page*5;
		$sql = "select a.*,u.u_name a_uname from articles a join users u on a.a_uid=u.u_id order by a_id limit ".$page.",5";
		$statement = $this->pdo->query($sql);
		$result = $statement->fetchAll();
		return $result;
	}

	#通过关键词查找具有关键词的记录
	public function search($keywords){
		$statement = $this->pdo->prepare("select a.*,u.u_name as a_uname from articles a join users u on a.a_uid=u.u_id where locate(?,concat(a_title,a_content,a_begin_text))");
		$statement->execute([$keywords]);
		$result = $statement->fetchAll();
		return $result;
	}

	#删除所有文章
	public function deleteAll(){
		$statement = $this->pdo->query("delete from articles");
	}

	#保存文章
	public function save($a_title,$a_begin_text,$a_content,$a_uid,$clean_filename){
		$statement = $this->pdo->prepare("insert into articles values(default,?,?,?,default,?,?)");
		$statement->execute([$a_title,$a_begin_text,$a_content,$a_uid,$clean_filename]);
		return $this->pdo->lastInsertId();
	}


}