<?php
include ('../model/Photo.php');

class BlogPhotoController{
	
	public function showAll(){
		
		$user = $_SESSION['admin'];

		$photoModel = new Photo();
		$photos = $photoModel->showAll($user['u_id']);

		include('../view/blog/photo_show.php');
	}
}