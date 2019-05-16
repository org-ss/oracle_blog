<?php
include ('../model/Article.php');

class BlogArticleController{
	public function showAll(){
		
		$user = $_SESSION['user'];

		$articleModel = new Article();
		$articles = $articleModel->showAll($user['u_id']);
		//var_export($articles);

		include('../view/blog/article_show_List.php');
	}

	public function show_article_content(){

		$a_id=$_GET['a_id'];
		$articleModel = new Article();
		$article = $articleModel->find($a_id);
		//var_export($articles);

		include('../view/blog/article_show_All.php');
	}
}