<?php
include ('../model/Article.php');

class BlogArticleController{
	public function showAll(){
		$user = $_SESSION['user'];

		$articleModel = new Article();
		$articles = $articleModel->showAll($user['id']);

		include('../view/blog/article_show_All.php');
	}
}