<?php
include ('../model/Photo.php');
include('../model/Type.php');

class BlogPhotoController{

	public function showEveryPage(){		

		if(isset($_GET['cur_page'])){
			$curPage = $_GET['cur_page'];
		}else{
			$curPage = 1;
		}
		//echo "当前页数".$curPage;
		$photoModel = new Photo();
		$count=$photoModel->getCount();
		//echo $count;		
		$photos = $photoModel->pagingNine($curPage);
		$page=ceil($count/9);
		//var_export($photos);

		include('../view/blog/photo_show.php');
	}

}