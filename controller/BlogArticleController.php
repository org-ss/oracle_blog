<?php
include ('../model/Article.php');

class BlogArticleController{
	public function showAll(){
		
		$admin = $_SESSION['admin'];				
		$articleModel = new Article();
		$articles = $articleModel->showAll($admin['u_id']);

		include('../view/blog/article_show_List.php');				
	}

	public function show_article_content(){

		$isLogin=$_SESSION['isLogin'];
		if ($isLogin) {
			$a_id=$_GET['a_id'];
			$articleModel = new Article();
			$article = $articleModel->find($a_id);
			//var_export($articles);

			include('../view/blog/article_show_All.php');
		}else{
			echo '<script>alert("未登录，请先登录！");window.location.href="index.php?r=blogArticle/showAll";</script>';
		}
		
	}
}