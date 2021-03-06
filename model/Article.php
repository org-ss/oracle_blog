<?php
include_once("Model.php");

class Article extends Model{

	#展示所有文章,5篇/页显示
	public function showAll($curPage){

		$query="select * from  (select rownum rn,a.* from v_articles a)e where e.rn>=(?-1)*5+1 and e.rn<=?*5";
		$statment=$this->pdo->prepare($query);
		$statment->execute([$curPage,$curPage]);
		$articles=$statment->fetchAll();
    	return $articles;
	}

	#展示某一篇文章的具体内容
	public function find($aid){

		$statement = $this->pdo->prepare("select * from v_articles where id=?");
		$statement->execute([$aid]);
		$article = $statement->fetch();
		return $article;
	}

	#展示某一类型的文章,5篇/页显示
	public function findType($id,$curPage){

		$query="select * from (select rownum rn,a.* from v_articles a where a.typeId=?)e where e.rn>=(?-1)*5+1 and e.rn<=?*5";
		$statement = $this->pdo->prepare($query);
		$statement->execute([$id,$curPage,$curPage]);
		$articles = $statement->fetchAll();
		return $articles;
	}

	#计算某一类型文章总数
	public function getTypeCount($id){

		$statement=$this->pdo->prepare("select * from v_articles where typeId=?");
		$statement->execute([$id]);
		$count=count($statement->fetchAll());
		return $count;
	}

	#展示最新的5篇文章
	public function find5Record($uId){
		$statement = $this->pdo->prepare("select *from (select rownum rn,a.*,u.name uname from articles a 
			join users u on a.userid=u.id where u.id=? order by created_at) where rn<=5");
		$statement->execute([$uId]);
		$articles = $statement->fetchAll();
		return $articles;
	}

	#更新文章内容
	public function update($a_id,$a_title,$a_begin_text,$a_photo,$a_content,$typeId){
		$statement = $this->pdo->prepare("update articles set title=?,introduction=?,image=?,content=?,typeId=? where id=?");
		$statement->execute([$a_title,$a_begin_text,$a_photo,$a_content,$typeId,$a_id]);
	}

	#删除某篇文章
	public function delete($id){
		$statement = $this->pdo->prepare("delete from messages where articleid=?");
		$statement->execute([$id]);
		
		$statement = $this->pdo->prepare("delete from articles where id=?");
		$statement->execute([$id]);
	}

	#获取表格中的记录条数
	public function getCount(){
		$statement = $this->pdo->prepare("call pro_count_articles(?)");
		$statement->bindParam(1,$count,PDO::PARAM_INPUT_OUTPUT,12);
		$statement->execute();#返回结果集中的一个字段
		return $count;
	}

	#将表格中的记录分页显示
	public function page($page){
		$page = $page*5+1;
		$nextPage =$page+5;
		$statement = $this->pdo->prepare("select * from 
        (select rownum rn,a.* from v_articles a) e 
        where e.rn>=? and e.rn<?");
		$statement->execute([$page,$nextPage]);
		$result = $statement->fetchAll();
		
		return $result;
	}

	#获取类型视图中的记录条数
	public function getVCount($tId){
		$statement = $this->pdo->prepare("select *from v_types where id=?");
		$statement->execute([$tId]);#返回结果集中的一个字段
		$result = $statement->fetch();
		$count = $result['NUM'];
		return $count;
	}

	#将类型视图中的记录分页显示
	public function pageV($page,$tId){
		$page = $page*5+1;
		$nextPage =$page+5;
		$statement = $this->pdo->prepare("select * from 
        (select rownum rn,a.* from v_articles a where a.typeid=:typeId) e 
        where e.rn>=:page and e.rn<:nextPage");
		$statement->execute([$tId,$page,$nextPage]);
		$result = $statement->fetchAll();
		return $result;
	}

	#通过关键词查找具有关键词的记录
	public function search($keywords){

		$keywords=$keywords.'+';
		$query="select * from v_articles where (regexp_like(title,?) or regexp_like(introduction,?))";

		$statement = $this->pdo->prepare($query);
		$statement->execute([$keywords,$keywords]);
		$articles = $statement->fetchAll();
		
		return $articles;

	}

	#删除所有文章
	public function deleteAll(){
		$statement = $this->pdo->query("delete from articles");
	}

	#查询结果的分页显示
	public function pageSearch($array,$page){
		$page=$page==0?0:$page*5-1;
		$array=array_slice($array,$page,5);#将$array数组从$page位置开始截取5个长度
		return $array;
	}

	#保存文章
	public function save($title,$introduction,$content,$uid,$clean_filename,$typeId){
		$statement = $this->pdo->prepare("insert into articles values(null,?,?,?,null,?,?,?)");
		$statement->execute([$title,$introduction,$content,$uid,$clean_filename,$typeId]);
	}

}