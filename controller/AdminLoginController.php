<?php

include_once('../model/User.php');

class AdminLoginController{

	//登录界面跳转
	public function login_page(){
		include('../view/admin/login_page.php');
	}

	//注册界面跳转
	public function sign_up(){

		include('../view/admin/sign_up.php');
	}

	//登录信息认证
	public function do_login(){

		$uEmail=$_POST['u_email'];
		$uPassword=$_POST['u_password'];

		if (trim($uEmail)==""||trim($uPassword)=="") {
			
            exit(0);
		}

		$userModel=new User();

		$user=$userModel->verify($uEmail,$uPassword);
		 
		if ($user) {
			session_start();
			$_SESSION['user']=$user;
			$_SESSION['isAdminLogin']=true;
			header('Location:/index.php?r=adminHome/home');
		}else{
						
			echo '<script>alert("用户名或密码错误，请重新输入！");history.go(-1);</script>';
			//header('Location:/index.php?r=adminLogin/login_page');
			//echo '<script>alert("用户名或密码错误，请重新输入！");history.back();window.opener.location.reload;</script>';
			
		}
	}

	//注册信息认证
	public function do_sign_up(){
		

		$uEmail=$_POST['u_email'];
		$uName=$_POST['u_name'];
		$uPassword=$_POST['u_password'];
		$uAgainPassword=$_POST['u_again_password'];


		$userModel=new User();
		$text=$userModel->find($uEmail,$uName);

		// echo "错误".$text;

		
		if ($text==1) {
			echo '<script>alert("邮箱已经被注册，请重新输入！");window.location.href="index.php?r=adminLogin/sign_up";</script>';
    		
    	}else if($text==2){
    		echo '<script>alert("用户名已经被注册，请重新输入！");window.location.href="index.php?r=adminLogin/sign_up";</script>';
    		
    	}else{

    		$user=$userModel->save($uEmail,$uName,$uPassword);
    		echo "<script>alert('注册成功！');window.location= '/index.php?r=adminLogin/login_page';</script>";			
			//header('Location:/index.php?r=adminHome/home');
    		
    	}

		
	}
	
}
