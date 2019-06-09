<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>My_Blog</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/cuf_run.js"></script>
	<link href="css/style2.css" rel="stylesheet">
	<link href="css/media.css" rel="stylesheet">
	<!-- CuFon ends -->
</head>
<script type="text/javascript">
function validate(){
	alert("456");
	var name = document.getElementById("m_name");
	var text = document.getElementById("m_text");
	var verification = document.getElementById("verification");
	if(username.value==""){
//		document.getElementById("UN_status").innerHTML = "账号未填写！";
		alert("ID未填写！");
		m_name.focus();
		return false;
	}
	if(password.value==""){
//		document.getElementById("PW_status").innerHTML = "密码未填写！";
		alert("内容未填写！");
		m_text.focus();
		return false;
	}
	return true;
}
}
</script>
<body>
	<div class="main">
		<div class="header">
		    <div class="header_resize">
		      <div class="menu_nav">
		        <ul>
		          <li class="active"><a href="index.php?r=blogArticle/showAll">博客首页</a></li>
		          <li><a href="index.php?r=blogPhoto/showAll">相册</a></li>
		          <li><a href="index.php?r=blogMessage/showAll">留言板</a></li>
		          <li><a href="index.php?r=blogIntroduce/about_me">关于我</a></li>
		          <?php 
		          	$isLogin=$_SESSION['isLogin'];

		          	if ($isLogin) :
		          		$user=$_SESSION['user'];
		          ?>
		          	<li>
		          		<a href="index.php?r=adminLogin/go_out">
		          			
		          			<span ><?php echo $user['NAME'];?>/退出登录</span>
		          		</a>		          		
		          	</li>
		     	 <?php else: ?>
		     	 	<li><a href="index.php?r=adminLogin/login_page">登录</a></li>
		     	 <?php endif; ?>
		        </ul>
		      </div>
		      <div class="clr"></div>
		      <div class="logo" style="height: 220px;"></div>
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

					<div class="ibody">
						<article>
							<div class="index_about">
								<h2 class="c_titile"><?php echo $article['TITLE'];?></h2>
								<p class="box_c">
									<span class="d_time">发布时间：<?php echo $article['CREATED_AT'];?></span>
									<span>编辑：<?php echo $article['AUTHOR'];?><br>
									<span>类型：<?php echo $article['TYPE'];?>
								</p>
								<ul class="infos">
									<?php echo $article['CONTENT'];?>
								</ul>
							</div>
						</article>
					</div>
					<br>
					<br>
					<br>
					<br>
					<hr>

					<div class="article">
						<div class="article">
							<div class="clr" align="center">
								<h2>
									留言板
								</h2>
							</div>
							<form action="/index.php?r=blogMessage/message_save&a_id=<?php echo $article['ID'] ?>" method="post" id="sendemail" onsubmit="return validate();">
								<ol>
									<!-- <li><label for="name"><span style="color: red">*</span>你的用户名</label>
										<input id="m_name" name="m_name" class="text" rows="3"/></li> -->
									<li><label for="message"><span style="color: red">*</span>我要留言</label>
										<textarea id="m_text" name="content" rows="7" cols="30"></textarea>
									</li>
									<li><!-- <input type="image" name="imageField" id="imageField"
										src="images/submit.gif" class="send" /> -->
										<button type="submit" class="btn btn-primary mb-2" style="margin-top:10px; ">提交</button>
										<div class="clr"></div></li>
								</ol>
							</form>
						</div>

						<br>
						<h2>
							<span>最近的留言</span> 
						</h2>
						
								<?php foreach($messages as $value): ?>
							<div class="comment">
								<p style="font-size: 13px; margin-bottom: 0px">
									<a href="#"><?php echo $value['NAME'];?></a> &nbsp;留言时间:<br /><?php echo $value['CREATED_AT'];?>
								</p>
								<p style="font-size: 16px;"><?php echo $value['CONTENT'];?>.</p>
							</div>
								<?php endforeach; ?>
					</div>
					
				</div>
				<div class="sidebar">

					<div class="gadget">
						<h2 class="star"><span>Article</span> Type</h2>
						<div class="clr"></div>
						<ul class="sb_menu">
							<?php include '../view/menu/types.php' ?>
						</ul>
					</div>
					
					<div class="gadget">
						<h2 class="star"><span>Blog_</span> Menu</h2>
						<div class="clr"></div>
						<ul class="sb_menu">
							<?php include('../view/menu/head2.php'); ?>
						</ul>
					</div>
					<div class="gadget">
						<h2 class="star"><span>Introduce</span></h2>
						<div class="clr"></div>
						<ul class="ex_menu">
						<?php include('../view/menu/professional_menu.php'); ?>
						</ul>
					</div>
				</div>
				<div class="clr"></div>
			</div>
		</div>
	</div>
</body>
</html>