<?php include(dirname(__FILE__).'/'."include/page_head.php")?>
<?php include(dirname(__FILE__).'/'."include/page_top.php")?>
<?php include(dirname(__FILE__).'/'."include/page_top_navbar.php")?>
<div class="swiper-container" id="banner_swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="images/banner.jpg" width="100%" /></div>
        <div class="swiper-slide"><img src="images/banner.jpg" width="100%" /></div>
        <div class="swiper-slide"><img src="images/banner.jpg" width="100%" /></div>
    </div>
    <div class="swiper-pagination" id="banner_swp"></div>
</div>
<div class="main_container container">
	<div class="row">
    	<div class="col-md-12">
            <div class="col-md-6 col-sm-12">
                <h2 class="block_title more">SEMI 新闻</h2>
                <ul class="new_list">
                    <?php foreach ($showNewsList(21,false,true,3) as $key => $value):?>
                    <li>
                        <div class="news_img"><a href="<?=$siteurl;?>news/article/<?=$value['ID'];?>"><img src="images/admin_upload/<?=$value['Pic_s'];?>" /></a></div>
                        <h4 class="news_title"><a href="<?=$siteurl;?>news/article/<?=$value['ID'];?>"><?=$SubString($value['Title'],30);?></a></h4>
                        <div class="news_con"><p><?=$SubString($value['Introduced'],180);?></p></div>
                    </li>
                    <?php endforeach;?>
                </ul>
                <a href="#" class="more">更多SEMI新闻</a>
            </div>
            <div class="col-md-6 col-sm-12">
                <h2 class="block_title more">焦点</h2>
                <div class="swiper-container" id="focus_swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($showNewsList('*',true,false,3) as $key => $value):?>
                        <div class="swiper-slide">
                            <a href="<?=$siteurl;?>news/article/<?=$value['ID'];?>"><img src="images/admin_upload/<?=$value['Pic'];?>" width="100%" /></a>
                            <div class="focus_info_box">
                                <h3><a href="<?=$siteurl;?>news/article/<?=$value['ID'];?>"><?=$SubString($value['Title'],30);?></a></h3>
                                <a href="<?=$siteurl;?>news/article/<?=$value['ID'];?>"><?=$SubString($value['Introduced'],180);?></a>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="swiper-button-prev" id="focus_prev"></div>
                    <div class="swiper-button-next" id="focus_next"></div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <h2 class="block_title">SEMI中国活动</h2>
            </div>
            <div class="col-md-8 col-sm-8">
                <?php foreach ($showNewsList(9,true,true,8) as $key => $value):?>
                <div class="china_events"><a href="<?=$siteurl;?>news/article/<?=$value['ID'];?>"><?=$SubString($value['Title'],30);?></a></div>
                <?php endforeach;?>
                <p><a href="#">更多中国产业动态</a></p>
            </div>
            <div class="col-md-4 col-sm-4">
                <p align="center"><iframe allowtransparency="true" frameborder="0" height="215" marginheight="0" marginwidth="0" scrolling="no" src="http://c1.zedo.com/jsc/c1/ff2.html?n=292;c=345;d=20;w=215;h=215" width="215"></iframe></p>
                <p align="center"><iframe allowtransparency="true" frameborder="0" height="215" marginheight="0" marginwidth="0" scrolling="no" src="http://c1.zedo.com/jsc/c1/ff2.html?n=292;c=343;d=20;w=215;h=215" width="215"></iframe></p>
            </div>
    	</div>
    </div>
</div>
<div class="page_lower_container">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12"><h2 class="block_title">活动</h2></div>
            <div class="row green_bar_text">
            	<div class="col-md-12">
                    <div class="col-md-1 col-sm-2 col-xs-4 whitetext">FEATURED</div>
                    <div class="col-md-2 col-sm-2 col-xs-6"><a href="#">ALL EVENTS</a></div>
                    <div class="col-md-12 col-sm-12 col-xs-12 arrow-up"></div>
            	</div>
            </div>
            <div class="horizontalgap"></div>
            <div class="event_list_box">
            	<div class="event_list col-md-3">
                	<a href="#">
                        <img src="images/test/scwest_262x136.gif" />
                        <div class="event_list_infotext">
                            July 12-14, 2016<br/>
                            San Francisco, California
                        </div>
                	</a>	
                </div>
                <div class="event_list col-md-3">
                	<a href="#">
                        <img src="images/test/scwest_262x136.gif" />
                        <div class="event_list_infotext">
                            July 12-14, 2016<br/>
                            San Francisco, California
                        </div>
                	</a>
                </div>
                <div class="event_list col-md-3">
                	<a href="#">
                        <img src="images/test/scwest_262x136.gif" />
                        <div class="event_list_infotext">
                            July 12-14, 2016<br/>
                            San Francisco, California
                        </div>
                	</a>
                </div>
                <div class="event_list col-md-3">
                	<a href="#">
                        <img src="images/test/scwest_262x136.gif" />
                        <div class="event_list_infotext">
                            July 12-14, 2016<br/>
                            San Francisco, California
                        </div>
                	</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page_bottom_container">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="horizontalgap"></div>
                <h2 class="block_title">SEMI会员</h2>
                <div class="row">
                	<div class="col-md-8 col-sm-7">
                    	<div class="row">
                        	<div class="col-md-12">
                            	<p class="lead">产业新知、串联意见领袖与拓展商机</p>
                    		</div>
                    	</div>
                        <div class="horizontalgap">&nbsp;</div>
                        <div class="row">
                        	<div class="col-md-5 col-sm-5 text-center"><img src="images/test/speaker-267x167-01.jpg" /></div>
                            <div class="col-md-7 col-sm-7">
                            	<ul class="mumber_list">
                                	<li>SEMI协助产业建立标准、市场研究、海外参访与商业媒合</li>
                                    <li>专业的高科技展会规划，领域横跨半导体、太阳光电、LED之完整供应链</li>
                                    <li>SEMI台湾委员会汇聚产业菁英，共同推动产业发展，强化国际竞争力！</li>
                                </ul>
                                <a href="#"><button class="btn btn-success" type="button">加入SEMI</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 text-center"><img src="images/test/home-mac.png" /></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(dirname(__FILE__).'/'."include/page_fotter.php")?>