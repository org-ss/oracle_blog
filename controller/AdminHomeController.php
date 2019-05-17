<?php

include('../model/Article.php');
include('../model/Photo.php');

class AdminHomeController{

	public function home(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];

		$index = 1;

		$articleModel = new Article();
		$articles = $articleModel->find5Record();

		$photoModel = new Photo();
		$photos = $photoModel->find5Record();

		include('../view/admin/index.php');
	}

	
	
}