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
                <li><a href="<?=$siteurl;?>news/showlist/<?=$value['column_linktitle'];?>/"><?=$value['column_title'];?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<div class="top-content-container container">
    <div class="row">
    	<div class="col-sm-6">
        	<div class="row">
            	<div class="col-md-12">
                	<h2 class="block_title more">市場數據亮點</h2>
                    <div class="swiper-container" id="focus_swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="#"><img src="<?=$siteurl;?>images/test/focus_img.jpg" width="100%" /></a>
                                <div class="focus_info_box">
                                    <h3><a href="#">SEMI：2016年1月北美半导体设备B/B值为1.08</a></h3>
                                    <a href="#">SEMI（国际半导体产业协会）公布最新Book-to-Bill订单出货报告，2016年1月北美半导体设备制造商平均订单金额为13.2亿美元，B/B值（Book-to-Bill Ratio…Read More</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <a href="#"><img src="<?=$siteurl;?>images/test/focus_img1.jpg" width="100%" /></a>
                                <div class="focus_info_box">
                                    <h3><a href="#">SEMI：2016年1月北美半导体设备B/B值为1.08</a></h3>
                                    <a href="#">SEMI（国际半导体产业协会）公布最新Book-to-Bill订单出货报告，2016年1月北美半导体设备制造商平均订单金额为13.2亿美元，B/B值（Book-to-Bill Ratio…Read More</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <a href="#"><img src="<?=$siteurl;?>images/test/focus_img2.jpg" width="100%" /></a>
                                <div class="focus_info_box">
                                    <h3><a href="#">SEMI：2016年1月北美半导体设备B/B值为1.08</a></h3>
                                    <a href="#">SEMI（国际半导体产业协会）公布最新Book-to-Bill订单出货报告，2016年1月北美半导体设备制造商平均订单金额为13.2亿美元，B/B值（Book-to-Bill Ratio…Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-prev" id="focus_prev"></div>
                        <div class="swiper-button-next" id="focus_next"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
        	<div class="row">
            	<div class="col-md-12">
                	<div class="horizontalgap"></div>
                    <ul class="new_list">
                        <li>
                            <div class="news_img"><a href="#"><img src="<?=$siteurl;?>images/test/news.jpg" /></a></div>
                            <h4 class="news_title"><a href="#">SEMI中国光标委批准发布6项中文版光伏标准</a></h4>
                            <div class="news_con"><p>SEMI中国光伏标准技术委员会（以下简称“光标委”）2016年度夏季会议7月29日在银川国际交流中心酒店顺利召开。会议由委员会联合主席张光春（阿特斯阳光电力集团首席运营官）先生主持，来自保利协鑫、天合光能、晶澳太阳能、英利集团、大连连城、中利腾晖...</p></div>
                        </li>
                        <li>
                            <div class="news_img"><a href="#"><img src="<?=$siteurl;?>images/test/news.jpg" /></a></div>
                            <h4 class="news_title"><a href="#">SEMI中国光标委批准发布6项中文版光伏标准</a></h4>
                            <div class="news_con"><p>SEMI中国光伏标准技术委员会（以下简称“光标委”）2016年度夏季会议7月29日在银川国际交流中心酒店顺利召开。会议由委员会联合主席张光春（阿特斯阳光电力集团首席运营官）先生主持，来自保利协鑫、天合光能、晶澳太阳能、英利集团、大连连城、中利腾晖...</p></div>
                        </li>
                        <li>
                            <div class="news_img"><a href="#"><img src="<?=$siteurl;?>images/test/news.jpg" /></a></div>
                            <h4 class="news_title"><a href="#">SEMI中国光标委批准发布6项中文版光伏标准</a></h4>
                            <div class="news_con"><p>SEMI中国光伏标准技术委员会（以下简称“光标委”）2016年度夏季会议7月29日在银川国际交流中心酒店顺利召开。会议由委员会联合主席张光春（阿特斯阳光电力集团首席运营官）先生主持，来自保利协鑫、天合光能、晶澳太阳能、英利集团、大连连城、中利腾晖...</p></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontalgap"></div>
    <div class="row">
    	<div class="col-md-8">
        	<h2 class="block_title">市場報告</h2>
            <p>市場研究報告係協助企業做出投資決策和策略判斷時的重要工具。SEMI提供市場資料以及研究報告，其領域涵蓋半導體、高亮度LED資本設備、半導體材料、半導體封裝材料以及半導體晶圓和高亮度LED晶圓。</p>
            <b>已訂閱者請</b><a href="#"><u>由此進入</u>.</a>
        </div>
    </div>
    <div class="horizontalgap"></div>
</div>
<div class="main_container_con container">
    <div class="row">
        <div class="col-md-12">
        	<div class="row">
        		<div class="col-md-12">
            		<h2 class="block_title more">更多资讯</h2>
            	</div>
        	</div>
            <div class="row smallimg">
            	<div class="col-md-6">
                	<div class="row">
                    	<div class="col-md-5">
                        	<a href="#"><img class="pull-left" src="<?=$siteurl;?>images/test/focus_img1.jpg" /></a>
                        </div>
						<div class="col-md-7">
                        	<h4 class="content-title"><a href="#">設備市場</a></h4>
							<p>半導體設備對於整合元件（IC）製造非常關鍵。設備通常安置於晶圓廠內。 </p>
							<div class="horizontalgap">&nbsp;</div>
            			</div>
                	</div>
            	</div>
                <div class="col-md-6">
                	<div class="row">
                    	<div class="col-md-5">
                        	<a href="#"><img class="pull-left" src="<?=$siteurl;?>images/test/focus_img1.jpg" /></a>
                        </div>
						<div class="col-md-7">
                        	<h4 class="content-title"><a href="#">設備市場</a></h4>
							<p>半導體設備對於整合元件（IC）製造非常關鍵。設備通常安置於晶圓廠內。 </p>
							<div class="horizontalgap">&nbsp;</div>
            			</div>
                	</div>
            	</div>
                <div class="col-md-6">
                	<div class="row">
                    	<div class="col-md-5">
                        	<a href="#"><img class="pull-left" src="<?=$siteurl;?>images/test/focus_img1.jpg" /></a>
                        </div>
						<div class="col-md-7">
                        	<h4 class="content-title"><a href="#">設備市場</a></h4>
							<p>半導體設備對於整合元件（IC）製造非常關鍵。設備通常安置於晶圓廠內。 </p>
							<div class="horizontalgap">&nbsp;</div>
            			</div>
                	</div>
            	</div>
                <div class="col-md-6">
                	<div class="row">
                    	<div class="col-md-5">
                        	<a href="#"><img class="pull-left" src="<?=$siteurl;?>images/test/focus_img1.jpg" /></a>
                        </div>
						<div class="col-md-7">
                        	<h4 class="content-title"><a href="#">設備市場</a></h4>
							<p>半導體設備對於整合元件（IC）製造非常關鍵。設備通常安置於晶圓廠內。 </p>
							<div class="horizontalgap">&nbsp;</div>
            			</div>
                	</div>
            	</div>
                <div class="col-md-6">
                	<div class="row">
                    	<div class="col-md-5">
                        	<a href="#"><img class="pull-left" src="<?=$siteurl;?>images/test/focus_img1.jpg" /></a>
                        </div>
						<div class="col-md-7">
                        	<h4 class="content-title"><a href="#">設備市場</a></h4>
							<p>半導體設備對於整合元件（IC）製造非常關鍵。設備通常安置於晶圓廠內。 </p>
							<div class="horizontalgap">&nbsp;</div>
            			</div>
                	</div>
            	</div>
                <div class="col-md-6">
                	<div class="row">
                    	<div class="col-md-5">
                        	<a href="#"><img class="pull-left" src="<?=$siteurl;?>images/test/focus_img1.jpg" /></a>
                        </div>
						<div class="col-md-7">
                        	<h4 class="content-title"><a href="#">設備市場</a></h4>
							<p>半導體設備對於整合元件（IC）製造非常關鍵。設備通常安置於晶圓廠內。 </p>
							<div class="horizontalgap">&nbsp;</div>
            			</div>
                	</div>
            	</div>
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
                    	<div class="fa-stack"><a href="#"><img src="<?=$siteurl;?>images/semi-join.gif" width="95" height="95"></a></div>
                        <h4 class="content-title">加入 SEMI</h4>
                        <p class="rtejustify">成為 SEMI 會員，獲取先機、具影響力之科技、商業發展、建立人脈等更多優勢。</p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                    	<div class="fa-stack"><a href="#"><img src="<?=$siteurl;?>images/semi-engage.gif" width="95" height="95"></a></div>
                        <h4 class="content-title">接軌</h4>
                        <p class="rtejustify">透過 SEMI，您可以與客戶、決策者接軌，並進一步影響產業發展之未來與方向。</p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                    	<div class="fa-stack"><a href="#"><img src="<?=$siteurl;?>images/semi-follow.gif" width="95" height="95"></a></div>
                        <h4 class="content-title">追蹤</h4>
                        <p class="rtejustify">如欲掌握 SEMI 最新動態與資訊，歡迎加入SEMI在臉書、Twitter、LinkedIn及各大社群平台帳號。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(dirname(__FILE__).'/'."include/page_fotter.php")?>