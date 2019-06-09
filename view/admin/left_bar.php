<div class="left-sidebar">
            <!-- 用户信息 -->
            <div class="tpl-sidebar-user-panel">
                <div class="tpl-user-panel-slide-toggleable">
                    <div class="tpl-user-panel-profile-picture">
                        <img src="/images/headimg/<?=$headimg ?>" alt="">
                    </div>
                    <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
              <?=$name?>
          </span>
                </div>
            </div>

            <!-- 菜单 -->
            <ul class="sidebar-nav">
                <li class="sidebar-nav-link">
                    <a href="index.php?r=AdminHome/home" <?php if($index==1){echo 'class="active"';} ?>>
                        <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="index.php?r=AdminHome/show" <?php if($index==5){echo 'class="active"';} ?> >
                        <i class="am-icon-home sidebar-nav-link-logo"></i> 个人信息管理
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="index.php?r=AdminType/home" <?php if($index==7){echo 'class="active"';} ?> >
                        <i class="am-icon-home sidebar-nav-link-logo"></i>标签管理
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title <?php if($index==2){echo 'active';} ?>"><!--href="/admin/article/article_list.php"-->
                        <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 文章管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="index.php?r=adminArticle/home&uid=<?=$uid?>">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 文章列表
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="index.php?r=adminArticle/addArticle">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 增加文章
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title <?php if($index==3){echo 'active';} ?>"><!--href="/admin/photo/photo_list.php"-->
                        <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 相册管理
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico">
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="index.php?r=adminPhoto/home&uid=<?=$uid?>">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 相册列表
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="index.php?r=adminPhoto/addPhoto">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 增加图片
                            </a>
                        </li>
                    </ul>
                </li>
                
               <li class="sidebar-nav-link">
                    <a href="index.php?r=adminMessage/home" <?php if($index==4){echo 'class="active"';} ?>>
                        <i class="am-icon-home sidebar-nav-link-logo"></i> 留言管理
                    </a>
                </li>

                <li class="sidebar-nav-link">
                    <a href="index.php?r=adminHome/userList" <?php if($index==6){echo 'class="active"';} ?>>
                        <i class="am-icon-home sidebar-nav-link-logo"></i> 用户管理
                    </a>
                </li>
            </ul>
        </div>