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

                        <form class="am-form tpl-form-border-form tpl-form-border-br" action="index.php?r=adminType/do_updateType&id=<?=$type['id']?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?=$type['ID']?>" name="tid">
                        
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">标签名称 
                                    <span class="tpl-form-line-small-title"></span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" id="user-name" value="<?=$type['NAME'];?>" name="tname" placeholder="请输入标签名称">
                                </div>
                            </div>
			
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <input type="submit" value="提交" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
                                </div>
                            </div>
                        </form>
<?php include('../view/admin/layout/foot.php');