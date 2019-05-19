<?php

class BlogIntroduceController{
	public function about_me(){
		
		$user = $_SESSION['user'];

		$userModel = new User();
		$user = $userModel->returnAdmin($user['u_id']);
		//var_export($articles);

		include('../view/blog/about.php');
	}

	
}