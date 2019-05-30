<?php include('../view/admin/layout/head.php'); ?>
<!-- 内容区域 -->
<div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">发布图片</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>

                    <div class="widget-body am-fr">

                        <form class="am-form tpl-form-border-form tpl-form-border-br" action="index.php?r=adminPhoto/do_addPhoto&uid=<?=$uid?>" method="post" enctype="multipart/form-data">

							<div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">作者 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                     <input type="text" class="tpl-form-input" id="user-name" value="<?=$name?>" name="a_uname" placeholder="作者" readonly="true" >
                                    <small>作者不可变</small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">图片 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                    <div class="am-form-group am-form-file">
                                        <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                            <i class="am-icon-cloud-upload"></i> 选择图片
                                        </button>
                                        <input id="doc-form-file" type="file" name="p_photo" onchange="changepic(this)">
                                    </div>

                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <input type="submit" value="提交" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
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