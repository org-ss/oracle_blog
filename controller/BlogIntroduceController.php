<?php
include_once('../model/User.php');
include('../model/Type.php');

class BlogIntroduceController{
	public function about_me(){
		
		$user = $_SESSION['admin'];

		$userModel = new User();
		$user = $userModel->returnUser($user['ID']);
		
		include('../view/blog/about.php');
	}

	
}