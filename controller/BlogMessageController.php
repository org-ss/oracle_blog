<?php
include ('../model/Message.php');

class BlogMessagecontroller{


	public function message_save(){
		$isLogin=$_SESSION['isLogin'];
		$admin=$_SESSION['admin'];
		$user=$_SESSION['user'];

		$name = $user['NAME'];
		$content = $_POST['content'];
		$articleId=$_GET['a_id'];

		$messageModel = new Message();
		
		if ($isLogin) {

			$messageModel->messageSave($name,$content,$articleId);
			
			header('Location:/index.php?r=blogArticle/show_article_detail&a_id='.$articleId);			
						
		}else{
			echo '<script>alert("请先登录！");window.location.href="/index.php?r=adminLogin/login_page";</script>';
		}
		
	}

}