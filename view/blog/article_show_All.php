<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Rain_Blog</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/cuf_run.js"></script>
	<link href="css/style2.css" rel="stylesheet">
	<link href="css/media.css" rel="stylesheet">
	<!-- CuFon ends -->
</head>
<body>
	<div class="main"><?php include '../view/menu/head.php'?> 
		<br>
		<br>
		<br>
		<br>
		<div class="content">
			<div class="content_resize">
				<div class="mainbar">
					<?php
					// $a_id = $_GET['a_id'];
					// require_once 'config/article_db.php';
					// $article_db = new  ARTICLE_DB();
					// $result = $article_db->mysql_db2($a_id);
					// $row = mysqli_fetch_array($result);
					foreach ($articles as $value):?>
					<div class="ibody">
						<article>
							<div class="index_about">
								<h2 class="c_titile"><?php echo $value['a_title'];?></h2>
								<p class="box_c">
									<span class="d_time">发布时间：<?php echo $row['a_date'];?></span>
									<span>编辑：<?php echo $row['a_uname'];?>
								</p>
								<ul class="infos">
									<?php echo $row['a_content'];?>
								</ul>
							</div>
						</article>
					</div>
					<?php endforeach;?>
				</div>
				<div class="sidebar">
					<div class="searchform">
						<form id="formsearch" name="formsearch" method="post" action="">
							<span>
								<input name="editbox_search" class="editbox_search" id="editbox_search"
								maxlength="80" value="Search our ste:" type="text" />
							</span> 
							<input name="button_search" src="images/search_btn.gif" class="button_search"
							type="image" />
						</form>
					</div>
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
		<?php include '../view/menu/foot.php'?>
	</div>
</body>
</html>