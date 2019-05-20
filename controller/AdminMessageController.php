<?php

include('../model/Message.php');

class AdminMessageController{
	public function home(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$index = 4;

		$messageModel = new Message();
		$messages = $messageModel->showAll($uid);
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