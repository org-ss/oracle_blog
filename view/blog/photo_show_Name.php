
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Rain_Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<!-- CuFon ends -->
</head>
<body>

<div class="main">
	<div class="header">
	    <div class="header_resize">
	      <div class="menu_nav">
	        <ul>
	          <li><a href="index.php?r=blogArticle/showAll">博客首页</a></li>
	          <li class="active"><a href="index.php?r=blogPhoto/showAll">相册</a></li>
	          <li><a href="index.php?r=blogMessage/showAll">留言板</a></li>
	          <li><a href="index.php?r=blogIntroduce/about_me">关于我</a></li>
	          <li><a href="index.php?r=adminLogin/login_page">登录</a></li>
	        </ul>
	      </div>
	      <div class="clr"></div>
	      <div class="logo"><h1><a href="/index.php"><span>Rain_Blog</span></a> <small>   </small></h1></div>
	      <div class="clr"></div>
	    </div>
	</div> 
	<br>
	<br>
	<br>
	<br>
	<div class="content">
		<div class="content_resize">
			<div class="mainbar">
				<div class="article">
					<h2>
						<span>相册</span> 
					</h2>
					<?php 
						$i=0;
						foreach ($photos as $value):
					?>
						<img src="images/photos/<?php $i++; echo $value['p_name']; ?>" width="180" height="180" alt="pix" />
						<?php if($i==3):
							$i = 0;
						?>
						<br>
						<?php endif; ?>
					<?php endforeach; ?> 
					<div class="clr"></div>
					<p></p>										
				</div>
			</div>
			<div class="sidebar">
				
				<div class="gadget">
					<h2 class="star"><span>Blog_</span> Menu</h2>
					<div class="clr"></div>
					<ul class="sb_menu">
					<?php include '../view/menu/head2.php'?>
					</ul>
				</div>
				<div class="gadget">
					<h2 class="star"><span>Introduce</span></h2>
					<div class="clr"></div>
					<ul class="ex_menu">
					<?php include '../view/menu/professional_menu.php'?>
					</ul>
				</div>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</body>
</html>
