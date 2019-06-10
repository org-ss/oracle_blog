<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>My_Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<link href="css/index.css" rel="stylesheet">
<!-- CuFon ends -->

<link rel="icon" type="image/png" href="/assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed" href="/assets/i/app-icon72x72@2x.png">
<!-- <link rel="stylesheet" href="/css/amazeui.min.css" /> -->
<link rel="stylesheet" href="/css/page.css" />
<link rel="stylesheet" href="/assets/css/app.css">
<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<style>
			input{           
                padding: 6px 3px;
                border-radius: 3px;               
                background-image: url('./images/search.gif');
                margin-right: 18px;
            }
            input:focus{
                    border-color: #66afe9;
                    outline: 0;
                    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
                    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
            }
		    #search-button {
		    height: 30px;
		    width: 40px;
		    margin-top:5px;
		    margin-left:-16px;
		    border-radius: 3px;
		    background-image: url('./images/search_btn.gif');
			    
			}
			#search-button:active{
			    box-shadow: .05em .1em .2em rgba(0,0,0,.6) inset;
			    border-color: rgba(0,0,0,.3);
			    background: #bbb;
			}

			ul.pagination {
			    display: inline-block;
			    padding: 0;
			    margin: 0;
			}

			ul.pagination li {display: inline-block; margin: 3px;}

			ul.pagination li a {
			    color: #0E90D2;
			    float: left;
			    font-size: 14px;
			    padding: 8px 16px;
			    text-decoration: none;
			    transition: background-color .3s;
			    border: 1px solid #ddd;
			}

			ul.pagination li a.active {
			    background-color: #0E90D2;
			    color: white;
			    border: 1px solid #0E90D2;
			}

			ul.pagination li a:hover:not(.active) {background-color: #ddd;}
</style>
</head>
<body>
	<div class="main">
		<div class="header">
		    <div class="header_resize">
		      <div class="menu_nav">
		        <ul>
		          <li class="active"><a href="index.php?r=blogArticle/showAll">博客首页</a></li>
		          <li><a href="index.php?r=blogPhoto/showEveryPage">相册</a></li>
		         <!--  <li><a href="index.php?r=blogMessage/showAll">留言板</a></li> -->
		          <li><a href="index.php?r=blogIntroduce/about_me">关于我</a></li>
		          <?php 
		          	$isLogin=$_SESSION['isLogin'];

		          	if ($isLogin) :
		          		$user=$_SESSION['user'];
		          ?>
		          	<li>
		          		<a href="index.php?r=adminLogin/go_out">
		          			<!-- <img src="../images/people.png" width="30px" height="30px"> -->
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
				<div class="article">
				
				<?php foreach($articles as $value):?>										
					<div class="blogs">
						<h3>
							<a href="/index.php?r=blogArticle/show_article_detail&a_id=<?php echo $value['ID'];?>" target="_blank">
								<?php echo $value['TITLE']; ?>
							</a>
						</h3>
						<figure> 
							<img src="images/articleimg/<?php echo $value['IMAGE'];?>" width="100" height="100">
						</figure>
						<?php echo $value['INTRODUCTION'];?>
						<a href="/index.php?r=blogArticle/show_article_detail&a_id=<?php echo $value['ID'];?>" target="_blank"class="readmore">阅读全文&gt;&gt;</a>
						<p class="autor">
							<span>作者：<?php echo $value['AUTHOR'];?></span>
							<span>类型：<?php echo $value['TYPE'];?></span>
						</p>
						
						<div class="dateview" align="center" style="left:-143px;">
							<?php echo $value['CREATED_AT'];?>
						</div>
					</div>
					<?php endforeach; ?>					
				</div>
				<div class="am-u-lg-12 am-cf">
		            <div class="am-fr">
		                <ul class="pagination">
		                <?php 
		                	if (isset($flag)) {
		                		$method="search"."&keywords=".$keywords;
		                	}else{
		                		$method="showAll";
		                	}
		                ?>
		                    <li><a href="index.php?r=blogArticle/<?=$method?>&cur_page=<?php echo $curPage==1?1:($curPage-1);?>">«</a></li>
		                    <?php for ($i=1; $i<=$page; $i++): ?>
		                        <li>
		                        	<a <?php if($curPage==$i){echo 'class="active"'; } ?>
		                        	href="index.php?r=blogArticle/<?=$method?>&cur_page=<?=$i?>">
		                        		<?php echo $i;?>
		                        	</a>
		                        </li>
		                    <?php endfor;?>
		                    
		                    <li><a href="index.php?r=blogArticle/<?=$method?>&cur_page=<?php echo $curPage==$page?$page:($curPage+1);?>">»</a></li>
		                </ul>
		            </div>
		        </div>
			</div>

			<div class="sidebar">
				<div class="searchform">
				<form id="formsearch" name="formsearch" method="post" action="/index.php?r=blogArticle/search">
					<span>
						<input name="keywords"   maxlength="80" value="" type="text" />
					</span> 
					<button id="search-button"></button>
				</form>
				</div>
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
						<?php include '../view/menu/head2.php' ?>
					</ul>
				</div>
				<div class="gadget">
					<h2 class="star"><span>Introduce</span></h2>
					<div class="clr"></div>
					<ul class="ex_menu">
					<?php include '../view/menu/professional_menu.php' ?>
					</ul>
				</div>
			</div>
		<div class="clr"></div>
		</div>
	</div>

</body>
</html>
