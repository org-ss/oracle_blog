<?php
include('../model/Type.php');


class AdminTypeController{
	public function home(){
		$user = $_SESSION['user'];
		$name = $user['name'];
		$headimg = $user['image'];
		$uid = $user['id'];
		$utime = $user['lasttime'];
		$index = 7;

		$typeModel = new Type();
		$types = $typeModel->showAll();

		include('../view/admin/type/type_list.php');
	}

	public function addType(){
		$user = $_SESSION['user'];
		$name = $user['name'];
		$headimg = $user['image'];
		$uid = $user['id'];
		$utime = $user['lasttime'];
		$index = 7;

		include('../view/admin/type/type_add.php');
	}

	public function do_addType(){
		$tname = $_REQUEST['name'];

		$typeModel = new Type();
		$typeModel->save($tname);

		self::home();
	}

	public function updateType(){
		$user = $_SESSION['user'];
		$name = $user['name'];
		$headimg = $user['image'];
		$uid = $user['id'];
		$utime = $user['lasttime'];
		$index = 7;

		$tid = $_GET['id'];
		$typeModel = new Type();
		$type = $typeModel->find($tid);

		include('../view/admin/type/type_update.php');
	}

	public function do_updateType(){
		$tid = $_REQUEST['tid'];
		$tname = $_REQUEST['tname'];

		$typeModel = new Type();
		$typeModel->update($tid,$tname);

		self::home();
	}
}