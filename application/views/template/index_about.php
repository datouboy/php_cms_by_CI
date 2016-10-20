<?php include(dirname(__FILE__).'/'."include/page_head.php")?>
<?php include(dirname(__FILE__).'/'."include/page_top.php")?>
<?php include(dirname(__FILE__).'/'."include/page_top_navbar.php")?>
<div class="swiper-container" id="banner_swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="<?=$siteurl;?>images/banner.jpg" width="100%" /></div>
        <div class="swiper-slide"><img src="<?=$siteurl;?>images/banner.jpg" width="100%" /></div>
        <div class="swiper-slide"><img src="<?=$siteurl;?>images/banner.jpg" width="100%" /></div>
    </div>
    <div class="swiper-pagination" id="banner_swp"></div>
</div>
<div class="navbar-default nav_bar lt" id="lt_navbar">
	<button type="button" id="menu_btn_con" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<div class="secondary_menu">
    	<div class="container">
        	<ul class="menu nav">
                <?php foreach ($subMenu as $key => $value):?>
            	<li><a href="<?=$siteurl;?>view/article/<?=$value['column_linktitle'];?>/"><?=$value['column_title'];?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<div class="main_container_con container">
	<div class="row">
    	<div class="col-md-8">
        	<?=$content['article_content'];?>
        </div>
        <div class="col-md-4 col-sm-4">
        	<p align="center"><iframe allowtransparency="true" frameborder="0" height="215" marginheight="0" marginwidth="0" scrolling="no" src="http://c1.zedo.com/jsc/c1/ff2.html?n=292;c=345;d=20;w=215;h=215" width="215"></iframe></p>
        	<p align="center"><iframe allowtransparency="true" frameborder="0" height="215" marginheight="0" marginwidth="0" scrolling="no" src="http://c1.zedo.com/jsc/c1/ff2.html?n=292;c=343;d=20;w=215;h=215" width="215"></iframe></p>
            <p align="center"><iframe allowtransparency="true" frameborder="0" height="215" marginheight="0" marginwidth="0" scrolling="no" src="http://c1.zedo.com/jsc/c1/ff2.html?n=292;c=343;d=20;w=215;h=215" width="215"></iframe></p>
            <div class="content">
                    <h2 class="block_title">Related Content</h2>
                    <ul class="right_menu">
                        <li><a href="#">联络我们</a></li>
                        <li><a href="#">展区平面图</a></li>
                        <li><a href="#">注册参观</a></li>
                        <li><a href="#">活动</a></li>
                        <li><a href="#">参展厂商</a></li>
                    </ul>
                </div>
		</div>
    </div>
</div>
<div class="page_bottom_container">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="horizontallargegap">&nbsp;</div>
                <div class="text-center">
                	<h2>Connect with SEMI</h2>
                    <div class="horizontallargegap">&nbsp;</div>
                    <div class="col-md-4 col-sm-4">
                    	<div class="fa-stack"><a href="#"><img src="<?=$siteurl;?>images/semi-join.gif" width="95" height="95" /></a></div>
                        <h4 class="content-title">加入 SEMI</h4>
                        <p class="rtejustify">成為 SEMI 會員，獲取先機、具影響力之科技、商業發展、建立人脈等更多優勢。</p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                    	<div class="fa-stack"><a href="#"><img src="<?=$siteurl;?>images/semi-engage.gif" width="95" height="95" /></a></div>
                        <h4 class="content-title">接軌</h4>
                        <p class="rtejustify">透過 SEMI，您可以與客戶、決策者接軌，並進一步影響產業發展之未來與方向。</p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                    	<div class="fa-stack"><a href="#"><img src="<?=$siteurl;?>images/semi-follow.gif" width="95" height="95" /></a></div>
                        <h4 class="content-title">追蹤</h4>
                        <p class="rtejustify">如欲掌握 SEMI 最新動態與資訊，歡迎加入SEMI在臉書、Twitter、LinkedIn及各大社群平台帳號。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(dirname(__FILE__).'/'."include/page_fotter.php")?>
