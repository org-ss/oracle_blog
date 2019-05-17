<?php include('../view/admin/layout/head.php'); ?>
<!-- 内容区域 -->
<div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">发布文章</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>

                    <div class="widget-body am-fr">

                        <form class="am-form tpl-form-border-form tpl-form-border-br" action="index.php?r=adminArticle/do_addArticle&a_uid=<?=$uid?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="" name="a_id">
                        
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">标题 
                                    <span class="tpl-form-line-small-title"></span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" id="user-name" value="" name="a_title" placeholder="请输入标题文字">
                                    <small>请填写标题文字10-20字左右。</small>
                                </div>
                            </div>

                            
							<div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">作者 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                     <input type="text" class="tpl-form-input" id="user-name" value="<?=$name?>" name="a_uname" placeholder="作者" readonly="true" >
                                    <small>作者不可变</small>
                                </div>
                            </div>


                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                    <div class="am-form-group am-form-file">
                                        <div class="tpl-form-file-img">
                                            <img src="" alt="" width="100px" height="100px">
                                        </div>
                                        <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                            <i class="am-icon-cloud-upload"></i> 添加封面图片
                                        </button>
                                        <input id="doc-form-file" type="file" name="a_photo">
                                    </div>

                                </div>
                            </div>
                            
                            
							<div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">文章简介 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                     <input type="text" class="tpl-form-input" id="user-name" value="" name="a_begin_text" placeholder="文章简介" >
                                    <small>文章简介为必填</small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-intro" class="am-u-sm-3 am-form-label">文章内容</label>
                                <div class="am-u-sm-9">
                                    <textarea class="" rows="10" id="user-intro" placeholder="请输入文章内容"  name="a_content"></textarea>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <input type="submit" value="提交" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
                                </div>
                            </div>
                        </form>
<?php include('../view/admin/layout/foot.php');