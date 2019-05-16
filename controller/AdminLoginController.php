<?php

include_once('../model/User.php');

class AdminLoginController{

	public function login_page(){

		include('../view/admin/login_page.php');
	}

	public function sign_up(){

		include('../view/admin/sign_up.php');
	}

	public function do_login(){

		$uEmail=$_POST['u_email'];
		$uPassword=$_POST['u_password'];

		$userModel=new User();

		$user=$userModel->verify($uEmail,$uPassword);
		 
		if ($user) {
			session_start();
			$_SESSION['user']=$user;
			header('Location:/index.php?r=adminHome/home');
		}else{
			header('Location:/index.php?r=adminLogin/login_page');
		}
	}

	public function do_sign_up(){

		$uEmail=$_POST['u_email'];
		$uName=$_POST['u_name'];
		$uPassword=$_POST['u_password'];
		$uAgainPassword=$_POST['u_again_password'];


		$userModel=new User();

		$user=$userModel->save($uEmail,$uName,$uPassword);
		header('Location:/index.php?r=adminHome/home');
	}
	
}
