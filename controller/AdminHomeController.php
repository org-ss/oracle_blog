<?php

include('../model/Article.php');
include('../model/Photo.php');
include_once('../model/User.php');

class AdminHomeController{

	public function home(){
		$user = $_SESSION['user'];
		$name = $user['NAME'];
		$headimg = $user['IMAGE'];
		$uid = $user['ID'];
		$utime = $user['LASTTIME'];

		$index = 1;

		$articleModel = new Article();
		$articles = $articleModel->find5Record($uid);

		$photoModel = new Photo();
		$photos = $photoModel->find5Record($uid);

		include('../view/admin/index.php');
	}

	#展示个人信息
	public function show(){
		$user = $_SESSION['user'];
		$name = $user['NAME'];
		$headimg = $user['IMAGE'];
		$uid = $user['ID'];
		$utime = $user['LASTTIME'];

		$index = 5;
		$usereModel = new User();
		$user2 = $usereModel->returnUser($uid);

		include('../view/admin/person_message.php');

	}

	#修改个人信息
	public function updateUser(){
		$user = $_SESSION['user'];
		$headimg = $user['IMAGE'];

		$u2_id = $_REQUEST['u2_id'];
		$u2_name = $_REQUEST['u2_name'];
		$u2_password = $_REQUEST['u2_password'];
		$u2_password2 = $_REQUEST['u2_password2'];
		$u2_introduce = $_REQUEST['u2_introduce'];
		if($u2_password==""||$u2_password==null){
			if($u2_password2==""||$u2_password2==null){
				$u2_password = $_SESSION['user']['PASSWORD'];
				$u2_password2 = $_SESSION['user']['PASSWORD'];
			}else{
				echo '<script>alert("请确认密码！！");window.location.href="index.php?r=adminHome/show";</script>';
			}
		}
		if($u2_password!=$u2_password2){
			echo '<script>alert("两次密码输入不一致!!");window.location.href="index.php?r=adminHome/show";</script>';
		}else{
			$tmp_name = $_FILES['u2_photo']['tmp_name'];
			$filename = $_FILES['u2_photo']['name'];
			if($tmp_name==null || $filename==null ||$tmp_name=="" || $filename==""){
				//排除没有选择头像的bug
				$clean_filename = $headimg;
			}else{
				$clean_filename = iconv("utf-8", "gbk", $filename);
				if(!file_exists("./images/headimg/".$clean_filename)){
					move_uploaded_file($tmp_name, "./images/headimg/".$clean_filename);
				}
			}

			$userModel = new User();
			$userModel->update($u2_id,$u2_name,$u2_password,$clean_filename,$u2_introduce);
			$user2 = $userModel->returnUser($u2_id);

			$_SESSION['user'] = $user2;
			$name = $user2['NAME'];
			$headimg = $user2['IMAGE'];
			$uid = $user2['ID'];
			$utime = $user2['LASTTIME'];
			$index = 5;

			include('../view/admin/person_message.php');
		}
	}

	#分页显示所有用户
	public function userList(){

		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 0;
		}

		$user = $_SESSION['user'];
		$name = $user['NAME'];
		$headimg = $user['IMAGE'];
		$uid = $user['ID'];
		$utime = $user['LASTTIME'];
		$index = 6;


		$userModel = new User();
		$num = $userModel->getCount($uid);
		$pageSize=5;
		$endPage = ceil($num/$pageSize);
		$users = $userModel->page($page,$uid);

		include('../view/admin/user_list.php');
	}

	#删除用户
	public function deleteUser(){

		$uId = $_GET['u_id'];
		$userModel = new User();
		$userModel->delete($uId);

		self::userList();
	}

	#删除所有用户
	public function deleteAllUser(){
		$uId = $_GET['u_id'];
		$userModel = new User();
		$userModel->delAll($uId);

		self::userList();
	}

	
	
}