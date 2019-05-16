<?php
/*
路由例子：r=blogControllerName/FunctionName
r=blogArticle/showAll
*/

include_once('../model/User.php');

$route = isset($_GET['r']) ? $_GET['r']:NULL;

session_start();
$userModel = new User();
$_SESSION['user']=$userModel->returnAdmin(1);


if($route){

	$partials = explode("/", $route);
	if(count($partials)!=2){
		die('invalid route');
	}

	$filename = $partials[0];

	$class_name = ucfirst($filename)."Controller";
	//print_r('这是类名'.$class_name);

	$function_name = $partials[1];

	if(!file_exists('../controller/'.$class_name.'.php')){
		die('error route1');
	}
	include('../controller/'.$class_name.'.php');

	if(!class_exists($class_name)){
		die('error route2');
	}

	$controller = new $class_name();
	if(!method_exists($controller, $function_name)){
		die('error route3');
	}

	$controller->$function_name();
}else{
	include('../controller/BlogArticleController.php');
	$blogArticleController = new BlogArticleController();
	$blogArticleController->showAll();
}