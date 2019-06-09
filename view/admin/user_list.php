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
						<div class="widget-title  am-cf">用户列表
						</div>
					</div>
					<div class="widget-body  am-fr">

						<div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
							<div class="am-form-group">
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
										<script type="text/javascript">
												function delAllMessage(){
													var con = confirm("是否确认全部删除！！！");
													if(con==true){
														location.href = "index.php?r=adminHome/deleteAllUser&u_id=<?=$uid?>";
													}else{
														return false;
													}
												}
												function delUser(a){
		                                            var con = confirm("是否确认删除这条数据???");
		                                            if(con==true){
		                                                location.href = "index.php?r=adminHome/deleteUser&u_id="+a;
		                                            }else{
		                                            	return false;
		                                            }
	                                        	}
										</script>
										<button type="button" onclick="delAllMessage();" class="am-btn am-btn-default am-btn-danger">
											<span class="am-icon-trash-o"></span> 删除全部
										</button>
									</div>
								</div>
							</div>
						</div>

						<div class="am-u-sm-12">
							<table width="100%"
								class="am-table am-table-compact am-table-striped tpl-table-black ">
								<thead>
									<tr>
										<th>邮箱</th>
										<th>用户名</th>
										<th>密码</th>
										<th>最近登录时间</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $value):?>
											<tr class="gradeX">
												<td class="am-text-middle"><?=$value['EMAIL'];?></td>
												<td class="am-text-middle"><?=$value['NAME'];?></td>
												<td class="am-text-middle"><?=$value['PASSWORD'];?></td>
												<td class="am-text-middle"><?=$value['LASTTIME'];?></td>
												<td class="am-text-middle">
													<div class="tpl-table-black-operation"> 
														<a href="javascript:void(0);" onclick="delUser(<?=$value['ID']?>)" class="tpl-table-black-operation-del"> 
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
									<li><a href="index.php?r=adminHome/userList&uid=<?=$uid?>">首页</a></li>
									<?php for ($i=0; $i<$endPage; $i++): ?>
										<li <?php if($page==$i){echo 'class="am-active"';}?>><a href="index.php?r=adminHome/userList&uid=<?=$uid?>&page=<?=$i?>"><?=$i+1?></a></li>
									<?php endfor?> 
									<li><a href="index.php?r=adminHome/userList&uid=<?=$uid?>&page=<?=$endPage-1?>">末页</a></li>
								</ul>
							</div>
						</div>
<?php include('../view/admin/layout/foot.php');