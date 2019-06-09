<?php

include('../model/Message.php');

class AdminMessageController{
	#留言的分页显示
	public function home(){
		$user = $_SESSION['user'];
		$name = $user['NAME'];
		$headimg = $user['IMAGE'];
		$uid = $user['ID'];
		$utime = $user['LASTTIME'];
		$index = 4;

		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 0;
		}

		$messageModel = new Message();
		$num = $messageModel->getCount();
		
		$pageSize=5;
		$endPage = ceil($num/$pageSize);
		$messages = $messageModel->page($page);

		include('../view/admin/message_list.php');
	}
	#删除某条留言
	public function deleteMessage(){
		$m_id = $_GET['m_id'];
		$messageModel = new Message();
		$messageModel->delete($m_id);

		self::home();
	}

	#删除全部留言
	public function deleteAllMessage(){
		$messageModel = new Message();
		$messageModel->deleteAll();

		self::home();
	}
}