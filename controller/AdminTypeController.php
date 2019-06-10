<?php
include('../model/Type.php');


class AdminTypeController{
	public function home(){
		$user = $_SESSION['user'];
		$name = $user['NAME'];
		$headimg = $user['IMAGE'];
		$uid = $user['ID'];
		$utime = $user['LASTTIME'];
		$index = 7;

		#分页显示
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 0;
		}

		$typeModel = new Type();
		$num = $typeModel->getCount();

		$pageSize=5;
		$endPage = ceil($num/$pageSize);
		$types = $typeModel->page($page);

		include('../view/admin/type/type_list.php');
	}

	public function addType(){
		$user = $_SESSION['user'];
		$name = $user['NAME'];
		$headimg = $user['IMAGE'];
		$uid = $user['ID'];
		$utime = $user['LASTTIME'];
		$index = 7;

		include('../view/admin/type/type_add.php');
	}

	public function do_addType(){
		$tname = $_REQUEST['name'];

		$typeModel = new Type();
		$typeModel->save($tname);

		self::home();
	}

	public function deleteType(){
		$id = $_REQUEST['id'];

		$typeModel = new Type();
		$num = $typeModel->delete($id);

		if($num){
			echo '<script>alert("删除成功！");window.location.href="index.php?r=adminType/home";</script>';
		}else{
			echo '<script>alert("删除失败！");window.location.href="index.php?r=adminType/home";</script>';
		}
	}

	public function deleteAllType(){
		$typeModel = new Type();
		$result = $typeModel->delAll();
		if(!$result){
			echo '<script>alert("删除失败！");window.location.href="index.php?r=adminType/home";</script>';
		}else{
			echo '<script>alert("删除成功！");window.location.href="index.php?r=adminType/home";</script>';
		}
	}
}