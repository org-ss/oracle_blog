<?php
include ('../model/Article.php');
include ('../model/Message.php');
include('../model/Type.php');

class BlogArticleController{

	public function showAll(){
		
		$admin = $_SESSION['admin'];

		if(isset($_GET['cur_page'])){
			$curPage = $_GET['cur_page'];
		}else{
			$curPage = 1;
		}

		$articleModel = new Article();
		$articles = $articleModel->showAll($curPage);
		$count=$articleModel->getCount();
		$page=ceil($count/5);
		
		$typeModel = new Type();
		$types = $typeModel->showAll();
		
		//echo "<pre>";print_r($types);echo "<pre>";
		//echo "<pre>";print_r($articles);echo "<pre>";
		include('../view/blog/article_show_List.php');				
	}

	

	#首先判断用户是否登录，若为登录则跳出提示，若登录，则展示对应文章的详细内容
	public function show_article_detail(){

		$isLogin=$_SESSION['isLogin'];
		if(isset($_GET['cur_page'])){
			$curPage = $_GET['cur_page'];
		}else{
			$curPage = 1;
		}
		if ($isLogin) {
			$aid=$_GET['a_id'];
			$articleModel = new Article();
			$article = $articleModel->find($aid);

			//echo "<pre>";print_r($article);echo "<pre>";
			$typeModel = new Type();
			$types = $typeModel->showAll();
			
			$messageModel = new Message();
			$messages = $messageModel->showAll($aid,$curPage);
			$count=count($messages);
			$page=ceil($count/8);
						
			//echo "<pre>";print_r($messages);echo "<pre>";
			include('../view/blog/article_show_All.php');
		}else{
			echo '<script>alert("未登录，请先登录！");window.location.href="index.php?r=blogArticle/showAll";</script>';
		}
		
	}

	#文章查找
	public function search(){
		$keywords = $_REQUEST['keywords'];

		if(isset($_GET['cur_page'])){
			$curPage = $_GET['cur_page'];
		}else{
			$curPage = 1;
		}
		
		if($keywords==null || $keywords==""){
			self::showAll();
		}else{
			$articleModel = new Article();
			
			$articles=$articleModel->search($keywords);
			$count=count($articles);
			$page=ceil($count/5);
			
			$typeModel = new Type();
			$types = $typeModel->showAll();
			
			include('../view/blog/article_show_List.php');	
		}
	}

	public function showType(){

		$typeId=$_GET['typeId'];

		if(isset($_GET['cur_page'])){
			$curPage = $_GET['cur_page'];
		}else{
			$curPage = 1;
		}

		$articleModel = new Article();
			
		$articles=$articleModel->findType($typeId);
		$count=count($articles);
		$page=ceil($count/5);

		$typeModel = new Type();
		$types = $typeModel->showAll();
			
		include('../view/blog/article_type_List.php');	

	}


}