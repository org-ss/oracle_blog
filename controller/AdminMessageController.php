<?php

include('../model/Message.php');

class AdminMessageController{
	public function home(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$index = 4;

		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 0;
		}

		$messageModel = new Message();
		$messages = $messageModel->page($page);
		$num = $messageModel->getCount();
		if($num%5==0){
			$num = $num/5+1;
		}else{
			$num = $num/5;
		}
		$page = $page+1;

		include('../view/admin/message_list.php');
	}

	public function deleteMessage(){
		$m_id = $_GET['m_id'];
		$messageModel = new Message();
		$messageModel->delete($m_id);

		self::home();
	}

	public function deleteAllMessage(){
		$messageModel = new Message();
		$messageModel->deleteAll();

		self::home();
	}
}