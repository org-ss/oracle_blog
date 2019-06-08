<?php
include ('../model/Photo.php');
include('../model/Type.php');

class BlogPhotoController{
	
	public function showAll(){
		
		$user = $_SESSION['admin'];

		$photoModel = new Photo();
		$photos = $photoModel->showAll($user['u_id']);

		$typeModel = new Type();
		$arrayType = $typeModel->showAll();
		$trows=$arrayType[0];
		$types=$arrayType[1];

		include('../view/blog/photo_show.php');
	}

	public function showEveryPage(){		

		if(isset($_GET['cur_page'])){
			$curPage = $_GET['cur_page'];
		}else{
			$curPage = 1;
		}

		echo "当前页数".$curPage;
		$photoModel = new Photo();
		$count=$photoModel->getCount();
		echo $count;
		$page=ceil($count/9);
		$photos = $photoModel->pagingNine($curPage);
		var_export($photos);

		//include('../view/blog/photo_show.php');
	}

}