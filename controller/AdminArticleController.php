<?php

include('../model/Article.php');

class AdminArticleController{

	public function home(){
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 0;
		}

		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$utime = $user['u_lasttime'];
		$index = 2;

		$articleModel = new Article();
		$num = $articleModel->getCount();

		$pageSize=5;
		$endPage = ceil($num/$pageSize);
		$articles = $articleModel->page($page);


		include('../view/admin/article/article_list.php');
	}

	#跳转到修改文章界面
	public function updateArticle(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$utime = $user['u_lasttime'];
		$index = 2;

		$aId = $_GET['a_id'];
		$articleModel = new Article();
		$article = $articleModel->find($aId);

		include('../view/admin/article/article_release.php');
	}

	#修改文章
	public function saveArticle(){
		$tmp_name = $_FILES['a_photo']['tmp_name'];
		$filename = $_FILES['a_photo']['name'];
		$clean_filename = iconv("utf-8", "gbk", $filename);
		if(!file_exists("../public/images/articleimg/".$clean_filename)){
			move_uploaded_file($tmp_name, "../public/images/articleimg/".$clean_filename);
		}
		

		$a_id = $_REQUEST['a_id'];
		$a_title = $_REQUEST['a_title'];
		$a_begin_text = $_REQUEST['a_begin_text'];
		$a_content = $_REQUEST['a_content'];


		$articleModel = new Article();
		$article = $articleModel->update($a_id,$a_title,$a_begin_text,$filename,$a_content);

		self::home();
	}

	#删除某篇文章
	public function deleteArticle(){
		$a_id = $_GET['a_id'];

		$articleModel = new Article();
		$article = $articleModel->delete($a_id);

		self::home();
	}

	#跳转到添加文章界面
	public function addArticle(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$utime = $user['u_lasttime'];
		$index = 2;

		include('../view/admin/article/article_add.php');
	}

	#添加文章
	public function do_addArticle(){

		$tmp_name = $_FILES['a_photo']['tmp_name'];
		$filename = $_FILES['a_photo']['name'];
		$clean_filename = iconv("utf-8", "gbk", $filename);
		$refilename = "../public/images/articleimg/".$clean_filename;
		if(!file_exists($refilename)){
			move_uploaded_file($tmp_name, $refilename);
		}

		$a_uid = $_REQUEST['a_uid'];
		$a_title = $_REQUEST['a_title'];
		$a_begin_text = $_REQUEST['a_begin_text'];
		$a_content = $_REQUEST['a_content'];
		$a_uname = $_REQUEST['a_uname'];

		$articleModel = new Article();
		$article = $articleModel->save($a_title,$a_begin_text,$a_content,$a_uid,$filename);

		self::home();
	}

	#删除所有文章
	public function deleteAllArticle(){
		$articleModel = new Article();
		$articleModel->deleteAll();
		self::home();
	}

	#查找文章
	public function search(){
		$keywords = $_REQUEST['keywords'];
		if($keywords==null || $keywords==""){
			self::home();
		}else{
			$articleModel = new Article();
			$articles = $articleModel->search($keywords);

			$user = $_SESSION['user'];
			$name = $user['u_name'];
			$headimg = $user['u_photo'];
			$uid = $user['u_id'];
			$index = 2;
			include('../view/admin/article/article_list.php');
		}
	}
}