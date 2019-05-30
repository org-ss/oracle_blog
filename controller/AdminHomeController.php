<?php

include('../model/Article.php');
include('../model/Photo.php');
include_once('../model/User.php');

class AdminHomeController{

	public function home(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$utime = $user['u_lasttime'];

		$index = 1;

		$articleModel = new Article();
		$articles = $articleModel->find5Record();

		$photoModel = new Photo();
		$photos = $photoModel->find5Record();

		include('../view/admin/index.php');
	}

	public function show(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$utime = $user['u_lasttime'];

		$index = 5;
		$usereModel = new User();
		$user2 = $usereModel->returnUser($uid);

		include('../view/admin/person_message.php');

	}

	public function updateUser(){
		$u2_id = $_REQUEST['u2_id'];
		$u2_name = $_REQUEST['u2_name'];
		$u2_password = $_REQUEST['u2_password'];
		$u2_password2 = $_REQUEST['u2_password2'];
		$u2_introduce = $_REQUEST['u2_introduce'];
		if($u2_password==""||$u2_password==null){
			if($u2_password2==""||$u2_password2==null){
				$u2_password = $_SESSION['user']['u_password'];
				$u2_password2 = $_SESSION['user']['u_password'];
			}else{
				echo '<script>alert("请确认密码！！");window.location.href="index.php?r=adminHome/show";</script>';
			}
		}

		if($u2_password!=$u2_password2){

			echo '<script>alert("两次密码输入不一致!!");window.location.href="index.php?r=adminHome/show";</script>';
		}else{
			$tmp_name = $_FILES['u2_photo']['tmp_name'];
			$filename = $_FILES['u2_photo']['name'];
			$clean_filename = iconv("utf-8", "gbk", $filename);
			if(!file_exists("../public/images/headimg/".$clean_filename)){
				move_uploaded_file($tmp_name, "../public/images/headimg/".$clean_filename);
			}

			$userModel = new User();
			$userModel->update($u2_id,$u2_name,$u2_password,$clean_filename,$u2_introduce);
			$user2 = $userModel->returnUser($u2_id);

			//session_start();
			$_SESSION['user'] = $user2;

			$name = $user2['u_name'];
			$headimg = $user2['u_photo'];
			$uid = $user2['u_id'];
			$utime = $user2['u_lasttime'];

			$index = 5;

			include('../view/admin/person_message.php');
		}
	}

	
	
}