<?php

class BlogIntroduceController{
	public function about_me(){
		
		$user = $_SESSION['admin'];

		$userModel = new User();
		$user = $userModel->returnUser($user['u_id']);
		
		include('../view/blog/about.php');
	}

	
}