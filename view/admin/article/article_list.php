<?php include('../view/admin/layout/head.php'); ?>
<style type="text/css">
.color {
	color: #FFFFFF;
	text-decoration: none;
	font-weight: bold;
}  /*链接设置*/
.color:visited {
	color: #FFFFFF;
	text-decoration: none;
	font-weight: bold;
}  /*访问过的链接设置*/
.color:hover {
	color: #FFFFFF;
	text-decoration: none;
	font-weight: bold;
} /*鼠标放上的链接设置*/
</style>
 
<!-- 内容区域 -->
<div class="tpl-content-wrapper">
	<div class="row-content am-cf">
		<div class="row">
			<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
				<div class="widget am-cf">
					<div class="widget-head am-cf">
						<div class="widget-title  am-cf">文章列表
						</div>
					</div>
					<div class="widget-body  am-fr">

						<div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
							<div class="am-form-group">
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
										<script type="text/javascript">
											function release(){
												location.href = "article_release.php?a_id=0";
											}
											function delete_php(a_id){
												confirm("是否确认删除！！！");
												if(con==true){
													location.href = "delete.php?a_id="+a_id;
												}else{
													break;
												}

											}
										</script>
										<button type="button" class="am-btn am-btn-default am-btn-success"
											onclick="location.href='index.php?r=adminArticle/addArticle';">
											<span class="am-icon-plus"></span> 
											<a href="index.php?r=adminArticle/addArticle" class="color">新增</a>
										</button>
										<button type="button" class="am-btn am-btn-default am-btn-secondary">
											<span class="am-icon-save"></span> 保存
										</button>
										<button type="button" class="am-btn am-btn-default am-btn-danger">
											<span class="am-icon-trash-o"></span> 删除
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
							<div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
								<input type="text" class="am-form-field "> 
								<span class="am-input-group-btn">
									<button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"
										type="button">
									</button>
								</span>
							</div>
						</div>

						<div class="am-u-sm-12">
							<table width="100%"
								class="am-table am-table-compact am-table-striped tpl-table-black ">
								<thead>
									<tr>
										<th>文章缩略图</th>
										<th>文章标题</th>
										<th>作者</th>
										<th>时间</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($articles as $value):?>
											<tr class="gradeX">
												<td><img src="/images/articleimg/<?=$value['a_photo'];?>" class="tpl-table-line-img"
													alt=""></td>
												<td class="am-text-middle"><?=$value['a_title'];?></td>
												<td class="am-text-middle"><?=$value['a_uname'];?></td>
												<td class="am-text-middle"><?=$value['a_date'];?></td>
												<td class="am-text-middle">
													<div class="tpl-table-black-operation">
														<a href="index.php?r=adminArticle/updateArticle&a_id=<?=$value['a_id'];?>"> 
															<i class="am-icon-pencil"></i> 编辑 
														</a> 
														<a href="index.php?r=adminArticle/deleteArticle&a_id=<?=$value['a_id']?>" class="tpl-table-black-operation-del"> 
															<i class="am-icon-trash"></i>删除 
														</a>
													</div>
												</td>
											</tr>
									<?php endforeach?>
								</tbody>
							</table>
						</div>
						<div class="am-u-lg-12 am-cf">

							<div class="am-fr">
								<ul class="am-pagination tpl-pagination">
									<li class="am-disabled"><a href="#">«</a></li>
									<li class="am-active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">»</a></li>
								</ul>
							</div>
						</div>
<?php include('../view/admin/layout/foot.php');