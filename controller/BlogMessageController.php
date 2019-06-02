<?php
include ('../model/Message.php');

class BlogMessagecontroller{

	public function showAll(){	

		$user = $_SESSION['admin'];
		$messageModel = new Message();
		$messages = $messageModel->showAll($user['u_id']);
		
		include('../view/blog/show_Message.php');
	}

	public function message_save(){
		$isLogin=$_SESSION['isLogin'];
		$user=$_SESSION['user'];
		$admin=$_SESSION['admin'];

		$m_name = $user['u_name'];
		$m_content = $_POST['m_text'];
		$m_uid=$admin['u_id'];

		$messageModel = new Message();
		
		if ($isLogin) {
			
			$messageModel->messageSave($m_name,$m_content,$m_uid);
			header('Location:/index.php?r=blogMessage/showAll');			
						
		}else{
			echo '<script>alert("请先登录！");window.location.href="/index.php?r=adminLogin/login_page";</script>';
		}
		
	}

}