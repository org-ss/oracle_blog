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
		$remember = $_POST['remember'];
		

		if (trim($uEmail)==""||trim($uPassword)=="") {
			
            exit(0);
		}

		$userModel=new User();

		$user=$userModel->verify($uEmail,$uPassword);
		var_export($user);
		

		if ($user==0) {

			echo '<script>alert("用户不存在，请先注册！");window.location.href="index.php?r=adminLogin/sign_up";</script>';
			
		}elseif($user==1){
		 						
			echo '<script>alert("邮箱或密码错误，请重新输入！");history.go(-1);</script>';
			
		}else{
			session_start();
			$_SESSION['user']=$user;
			
			if ($user['ROLE']==0) {
				$_SESSION['isAdminLogin']=true;
				header('Location:/index.php?r=adminHome/home');
			}else{
				$_SESSION['isLogin']=true;
				header('Location:/index.php?r=blogArticle/showAll');
			}
		}
		
		//记住密码
		if($remember == 1){
			setcookie('email',$uEmail,time()+3600);
			setcookie('password',$uPassword,time()+3600);
			setcookie('remember',$remember,time()+3600);
		}else{
			setcookie('email',$uEmail,time()-3600);
			setcookie('password',$uPassword,time()-3600);
			setcookie('remember',$remember,time()-3600);
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
		
		if ($text==1) {
			echo '<script>alert("邮箱已经被注册，请重新输入！");window.location.href="index.php?r=adminLogin/sign_up";</script>';
    		
    	}else if($text==2){
    		echo '<script>alert("用户名已经被注册，请重新输入！");window.location.href="index.php?r=adminLogin/sign_up";</script>';
    		
    	}else{

    		$user=$userModel->save($uEmail,$uName,$uPassword);
    		echo "<script>alert('注册成功！');window.location= '/index.php?r=adminLogin/login_page';</script>";			
    		
    	}		
	}

	#普通用户退出登录
	public function go_out(){

		$_SESSION['isLogin']=false;
		header('Location:/index.php?r=blogArticle/showAll');

	}

	#管理员退出登录
	public function admin_out(){
		$_SESSION['isAdminLogin']=false;
		header('Location:/index.php?r=blogArticle/showAll');
	}
	
}
