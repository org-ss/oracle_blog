<?php include('../view/admin/layout/head.php'); ?>
<!-- 内容区域 -->
<div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">个人信息管理</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>

                    <div class="widget-body am-fr">

                        <form class="am-form tpl-form-border-form tpl-form-border-br" action="index.php?r=adminHome/updateUser" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?=$user2['ID']?>" name="u2_id">

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">邮箱 
                                    <span class="tpl-form-line-small-title"></span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="email" class="tpl-form-input" id="user-name" value="<?=$user2['EMAIL']?>" name="u2_email" placeholder="" readonly="true">
                                </div>
                            </div>
                        
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">用户名 
                                    <span class="tpl-form-line-small-title"></span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" id="user-name" value="<?=$user2['NAME']?>" name="u2_name" placeholder="请输入用户名">
                                </div>
                            </div>
                            
							<div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">密码 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                     <input type="password" class="tpl-form-input" id="user-name" value="" name="u2_password" placeholder="密码">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">确认密码 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                     <input type="password" class="tpl-form-input" id="user-name" value="" name="u2_password2" placeholder="确认密码" >
                                </div>
                            </div>


                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                    <div class="am-form-group am-form-file">
                                        <div class="tpl-form-file-img">
                                            <img src="/images/headimg/<?=$user2['IMAGE']?>" alt="" width="100px" height="100px" id="show">
                                        </div>
                                        <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                            <i class="am-icon-cloud-upload"></i> 选择图片
                                        </button>
                                        <input id="doc-form-file" type="file" name="u2_photo" onchange="changepic(this)">
                                    </div>

                                </div>
                            </div>
                            
                            
							<div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">个人简介 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                     <textarea class="" rows="10" id="user-intro"placeholder="请输入文章内容"  name="u2_introduce"><?=$user2['INTRODUCE']?></textarea>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <input type="submit" value="修改" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
                                </div>
                            </div>
                        </form>
        <script type="text/javascript">
            function changepic(obj){
                var newsrc = getObjectURL(obj.files[0]);
                document.getElementById('show').src = newsrc;
            }

            function getObjectURL(file){
                var url = null;
                if(window.createObjectURL!=undefined){
                    url = window.createObjectURL(file);
                }else if(window.URL!=undefined){//mozilla(firefox)
                    url = window.URL.createObjectURL(file);
                }else if(window.webkitURL!=undefined){//webkit or chrome
                    url = window.webkitURL.createObjectURL(file);
                }
                return url;
            }
        </script>
<?php include('../view/admin/layout/foot.php');