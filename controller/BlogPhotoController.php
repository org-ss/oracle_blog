<?php
include ('../model/Photo.php');

class BlogPhotoController{
	
	public function showAll(){
		
		$user = $_SESSION['user'];

		$photoModel = new Photo();
		$photos = $photoModel->showAll($user['u_id']);
		//var_export($photos);

		include('../view/blog/photo_show_Name.php');
	}
}