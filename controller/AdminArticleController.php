<?php

include('../model/Article.php');

class AdminArticleController{

	public function home(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$index = 2;

		$articleModel = new Article();
		$articles = $articleModel->showAll($uid);

		include('../view/admin/article/article_list.php');
	}

	public function updateArticle(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$index = 2;

		$aId = $_GET['a_id'];
		$articleModel = new Article();
		$article = $articleModel->find($aId);

		include('../view/admin/article/article_release.php');
	}

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
		$article = $articleModel->update($a_id,$a_title,$a_begin_text,$clean_filename,$a_content);

		self::home();
	}

	public function deleteArticle(){
		$a_id = $_GET['a_id'];

		$articleModel = new Article();
		$article = $articleModel->delete($a_id);

		self::home();
	}

	public function addArticle(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$index = 2;

		include('../view/admin/article/article_add.php');
	}

	public function do_addArticle(){

		$tmp_name = $_FILES['a_photo']['tmp_name'];
		$filename = $_FILES['a_photo']['name'];
		$clean_filename = iconv("utf-8", "gbk", $filename);
		$filename = "../public/images/articleimg/".$clean_filename;
		if(!file_exists($filename)){
			move_uploaded_file($tmp_name, $filename);
		}
		

		$a_uid = $_REQUEST['a_uid'];
		$a_title = $_REQUEST['a_title'];
		$a_begin_text = $_REQUEST['a_begin_text'];
		$a_content = $_REQUEST['a_content'];
		$a_uname = $_REQUEST['a_uname'];

		$articleModel = new Article();
		$article = $articleModel->save($a_title,$a_begin_text,$a_content,$a_uid,$clean_filename);

		self::home();
	}
}