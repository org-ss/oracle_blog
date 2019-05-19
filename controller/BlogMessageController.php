<?php
include ('../model/Message.php');

class BlogMessagecontroller{
	public function showAll(){
		
		$user = $_SESSION['user'];

		$messageModel = new Message();
		$messages = $messageModel->showAll($user['u_id']);
		//var_export($articles);

		include('../view/blog/show_Message.php');
	}

	public function message_save(){
		$user = $_SESSION['user'];
		$m_name = $_POST['m_name'];
		$m_content = $_POST['m_text'];
		$m_uid=$user['u_id'];

		$messageModel = new Message();
		// $user=$messageModel->check($m_name);
		// if ($user) {
		// 	$messageModel->messagSave($m_name,$m_content,$m_uid);
		// 	header('Location:/index.php?r=blogMessage/showAll');
		// }else{
		// 	echo '<script>alert("用户名不存在，请先注册！");history.go(-1);</script>';
		// }
		
		$messageModel->messageSave($m_name,$m_content,$m_uid);
		header('Location:/index.php?r=blogMessage/showAll');
		
	}

}