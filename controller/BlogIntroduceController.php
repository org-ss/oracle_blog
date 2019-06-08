<?php
$include('../model/User.php');
include('../model/Type.php');

class BlogIntroduceController{
	public function about_me(){
		
		$user = $_SESSION['admin'];

		$userModel = new User();
		$user = $userModel->returnUser($user['u_id']);

		$typeModel = new Type();
		$arrayType = $typeModel->showAll();
		$trows=$arrayType[0];
		$types=$arrayType[1];
		
		include('../view/blog/about.php');
	}

	
}