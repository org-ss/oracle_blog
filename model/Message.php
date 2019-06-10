<?php
include_once("Model.php");

class Message extends Model{

	public function showAll($aid,$curPage){
		$query="select * from (select rownum rn,m.* from messages m where m.articleId=?)e where e.rn>=(?-1)*5+1 and e.rn<=?*5";
		$statement = $this->pdo->prepare($query);
		$statement->execute([$aid,$curPage,$curPage]);
		$messages = $statement->fetchAll();
		return $messages;
	}

	#获取某一篇文章的留言总数
	public function articleMessage($id){
		
		$statement = $this->pdo->prepare("select count(*) from messages where articleId=?");
		$statement->execute([$id]);
		$rows = $statement->fetch();
		return $rows[0];
	}

	public function messageSave($name,$content,$articleId){
		$query="insert into messages(name,content,articleId) values(?,?,?)";
		$statement = $this->pdo->prepare($query);
		$statement->execute([$name,$content,$articleId]);
	}

	#删除某条留言
	public function delete($mId){
		$statement = $this->pdo->prepare("delete from messages where id=?");
		$statement->execute([$mId]);
	}

	#删除所有留言
	public function deleteAll(){
		$statement = $this->pdo->query("delete from messages");
	}

	#获取表格中的记录条数
	public function getCount(){
		$statement = $this->pdo->query("select count(*) from messages");
		$rows = $statement->fetch();
		return $rows[0];
	}

	#将表中数据分页显示
	public function page($page){
		$page = $page*5+1;
		$nextPage =$page+5;
		$statement = $this->pdo->prepare("select * from 
        (select rownum rn,m.*,a.title as title from messages m left join articles a on m.articleid=a.id order by m.id desc)e 
        where e.rn>=? and e.rn<?");
		$statement->execute([$page,$nextPage]);
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