-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-10-28 16:13:09
-- 服务器版本： 5.5.47-MariaDB
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `semi_mastersite`
--

-- --------------------------------------------------------

--
-- 表的结构 `semi_admin`
--

CREATE TABLE IF NOT EXISTS `semi_admin` (
  `ID` int(10) NOT NULL COMMENT 'ID',
  `Name` varchar(20) NOT NULL COMMENT '用户名',
  `Password` varchar(32) NOT NULL COMMENT '密码',
  `Power` int(1) NOT NULL COMMENT '权限:9:超管,8:普管',
  `FunPower` varchar(300) DEFAULT NULL COMMENT '开放功能模块(超管不受限)',
  `RegTime` int(10) DEFAULT NULL COMMENT '注册时间'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- 转存表中的数据 `semi_admin`
--

INSERT INTO `semi_admin` (`ID`, `Name`, `Password`, `Power`, `FunPower`, `RegTime`) VALUES
(1, 'admin', '9578f209c8e40b256c3ee9030bdaacbe', 9, NULL, 1476783938),
(2, 'testadmin', 'd5f4750cbfac27119cd3cf20be1d39f8', 8, '["site","site_seo","article","article_list"]', 1477637373);

-- --------------------------------------------------------

--
-- 表的结构 `semi_article`
--

CREATE TABLE IF NOT EXISTS `semi_article` (
  `ID` int(5) NOT NULL,
  `article_column_id` int(5) NOT NULL COMMENT '对应栏目ID',
  `article_time` int(10) NOT NULL COMMENT '发布时间',
  `article_power` int(1) NOT NULL DEFAULT '1' COMMENT '浏览权限:1普通，2:会员浏览',
  `article_show` int(1) NOT NULL DEFAULT '1' COMMENT '发布状态1:未发布,2:已发布',
  `article_content` varchar(21000) DEFAULT NULL COMMENT '文章内容'
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='文章表';

--
-- 转存表中的数据 `semi_article`
--

INSERT INTO `semi_article` (`ID`, `article_column_id`, `article_time`, `article_power`, `article_show`, `article_content`) VALUES
(1, 5, 1477377704, 1, 1, '<p>123123123123123123123</p>'),
(3, 7, 1111075200, 1, 1, '<div class="row">\r\n            	<div class="col-md-12">\r\n                	<h2 class="block_title">關於 SEMI</h2>\r\n            	</div>\r\n        	</div>\r\n            <div class="row">\r\n            	<div class="col-md-6">\r\n                	<p>SEMI 為全球化的產業協會，致力於促進電子供應鏈的整體發展，其領域含括：</p>\r\n                    <ul>\r\n                    	<li>半導體</li>\r\n                        <li>太陽光電（PV）</li>\r\n                        <li>發光二極體（LED）</li>\r\n                        <li>微機電（MEMS）</li>\r\n                        <li>軟性電子</li>\r\n                        <li>微電子與奈米電子相關領域</li>\r\n                        <li>平面顯示器 (FPD)</li>\r\n					</ul>\r\n                    <p class="rtejustify">SEMI 連結全球1,900多家會員企業以及逾25萬位專業人士，推動電子製造科學與商業發展。SEMI會員致力創新材料、設計、設備、軟體及服務，促成更聰明、快速、功能強且價格實惠的電子產品。</p>\r\n                    <p class="rtejustify">40多年來，SEMI 透過規劃各式會議、倡議和行動，協助會員及業界拓展商機，並促進市場成長。SEMI 於全球科技重鎮均設立辦公據點，為廣大的會員提供即時且專業的服務。</p>\r\n                    <p class="rtejustify">&nbsp;</p>\r\n            	</div>\r\n                <div class="col-md-6">\r\n                	<iframe height="300px" src="http://player.vimeo.com/video/30873968" width="100%"></iframe>\r\n                </div>\r\n			</div>\r\n            <div class="row">\r\n            	<div class="col-md-12">\r\n                	<h2 class="block_title">目的</h2>\r\n                    <div class="row">\r\n                    	<div class="col-md-4 col-sm-4">\r\n                        	<img class="img_responsive" src="/images/test/about_our_purpose.jpg">\r\n                    	</div>\r\n                        <div class="col-md-8 col-sm-8">\r\n                        	<p>微電子供應鍊之相關產業日趨複雜，重資本且互相依賴。為持續讓頂尖電子產品更為順利地推入市場，須具備下列元素：</p>\r\n                            <ul>\r\n                            	<li><p>興建新廠房（晶圓廠)</p></li>\r\n                                <li><p>發展新製程、工具、材料和製造標準</p></li>\r\n                                <li><p>政策與規範倡議並採取行動，促進商業成長</p></li>\r\n                                <li><p>投資組織和財務資源</p></li>\r\n                                <li><p>全球橫跨產業之各面向的整合</p></li>\r\n                                <li><p>發起全球性規模之活動以因應需求與挑戰</p></li>\r\n							</ul>\r\n                            <p>SEMI 於不同區域籌辦展會、貿易考察和會議，促進產業和各生產與製造重鎮的發展與成長。SEMI不僅與地方、國家政府和立法單位，以及各界維持緊密的合作，更投入產業研究，發表市場資訊，亦支持其他有助投資、貿易與科技創新的活動。</p>\r\n                            <p>SEMI 不僅支持會員打入各區域市場，更進一步協助會員探索新興與相鄰市場之商機，促進產業成長。</p>\r\n                    	</div>\r\n                    </div>\r\n            	</div>\r\n            </div>'),
(4, 3, 1476784582, 1, 1, '<div class="row">\r\n            	<div class="col-md-12">\r\n                	<h2 class="block_title">關於 SEMI</h2>\r\n            	</div>\r\n        	</div>\r\n            <div class="row">\r\n            	<div class="col-md-6">\r\n                	<p>SEMI 為全球化的產業協會，致力於促進電子供應鏈的整體發展，其領域含括：</p>\r\n                    <ul>\r\n                    	<li>半導體</li>\r\n                        <li>太陽光電（PV）</li>\r\n                        <li>發光二極體（LED）</li>\r\n                        <li>微機電（MEMS）</li>\r\n                        <li>軟性電子</li>\r\n                        <li>微電子與奈米電子相關領域</li>\r\n                        <li>平面顯示器 (FPD)</li>\r\n					</ul>\r\n                    <p class="rtejustify">SEMI 連結全球1,900多家會員企業以及逾25萬位專業人士，推動電子製造科學與商業發展。SEMI會員致力創新材料、設計、設備、軟體及服務，促成更聰明、快速、功能強且價格實惠的電子產品。</p>\r\n                    <p class="rtejustify">40多年來，SEMI 透過規劃各式會議、倡議和行動，協助會員及業界拓展商機，並促進市場成長。SEMI 於全球科技重鎮均設立辦公據點，為廣大的會員提供即時且專業的服務。</p>\r\n                    <p class="rtejustify">&nbsp;</p>\r\n            	</div>\r\n                <div class="col-md-6">\r\n                	<iframe height="300px" src="http://player.vimeo.com/video/30873968" width="100%"></iframe>\r\n                </div>\r\n			</div>\r\n            <div class="row">\r\n            	<div class="col-md-12">\r\n                	<h2 class="block_title">目的</h2>\r\n                    <div class="row">\r\n                    	<div class="col-md-4 col-sm-4">\r\n                        	<img class="img_responsive" src="/images/test/about_our_purpose.jpg">\r\n                    	</div>\r\n                        <div class="col-md-8 col-sm-8">\r\n                        	<p>微電子供應鍊之相關產業日趨複雜，重資本且互相依賴。為持續讓頂尖電子產品更為順利地推入市場，須具備下列元素：</p>\r\n                            <ul>\r\n                            	<li><p>興建新廠房（晶圓廠)</p></li>\r\n                                <li><p>發展新製程、工具、材料和製造標準</p></li>\r\n                                <li><p>政策與規範倡議並採取行動，促進商業成長</p></li>\r\n                                <li><p>投資組織和財務資源</p></li>\r\n                                <li><p>全球橫跨產業之各面向的整合</p></li>\r\n                                <li><p>發起全球性規模之活動以因應需求與挑戰</p></li>\r\n							</ul>\r\n                            <p>SEMI 於不同區域籌辦展會、貿易考察和會議，促進產業和各生產與製造重鎮的發展與成長。SEMI不僅與地方、國家政府和立法單位，以及各界維持緊密的合作，更投入產業研究，發表市場資訊，亦支持其他有助投資、貿易與科技創新的活動。</p>\r\n                            <p>SEMI 不僅支持會員打入各區域市場，更進一步協助會員探索新興與相鄰市場之商機，促進產業成長。</p>\r\n                    	</div>\r\n                    </div>\r\n            	</div>\r\n            </div>'),
(5, 4, 1111075200, 1, 1, '<div class="about_big">\n	<h4>\n		助学基金\n	</h4>\n	<p>\n		我们自认是一家有情怀的公司。情怀意味着责任。企业作为社会的一个组织，应该有社会责任感，这无关企业规模大小。\n	</p>\n	<p>\n		基于这样的想法，我们成立了助学基金，专项资助贫困学生。我们的团队小伙伴们作为志愿者，会利用周末去安徽农村走访受助学生的家庭。\n	</p>\n	<p>\n		欲知详情，请猛戳下面的链接。当然，这个助学平台也是我们志愿者的努力成果。\n	</p>\n	<p>\n		<a href="http://101.sinocontact.com"><img width="66%" src="/images/test/lll.png" /></a> \n	</p>\n	<p>\n		<br />\n	</p>\n	<p>\n		我们这样做，是因为我们这样做的时候很快乐。\n	</p>\n</div>'),
(6, 1, 1101139200, 1, 1, '<div class="about_big">\n	<h4>\n		Who We Are ?\n	</h4>\n	<p>\n		我们是一家数字营销服务公司。以创新和技术为本。\n	</p>\n</div>\n<div class="line">\n</div>\n<div class="about_s">\n	<h4>\n		Mission\n	</h4>\n	<p>\n		我们存在的意义是什么？（使命）<br />\n－－帮助我们的客户在营销领域获得成功\n	</p>\n</div>\n<div class="line">\n</div>\n<div class="about_s">\n	<h4>\n		Vision\n	</h4>\n	<p>\n		我们的目标是什么？（愿景）<br />\n－－5年内成为中国TOP5的数字营销公司\n	</p>\n</div>\n<div class="line">\n</div>\n<div class="about_s">\n	<h4>\n		Value\n	</h4>\n	<p>\n		我们推崇什么？（价值）<br />\n－－责任、创新、高效的执行力、信任\n	</p>\n</div>\n<div class="line">\n</div>\n<div class="about_s">\n<p><a href="/view/article/about_business">我们做什么</a></p>\n</div>'),
(13, 23, 1476697616, 1, 1, '<div class="row">\n            	<div class="col-md-12">\n                	<h2 class="block_title">關於 SEMI</h2>\n            	</div>\n        	</div>\n            <div class="row">\n            	<div class="col-md-6">\n                	<p>SEMI 為全球化的產業協會，致力於促進電子供應鏈的整體發展，其領域含括：</p>\n                    <ul>\n                    	<li>半導體</li>\n                        <li>太陽光電（PV）</li>\n                        <li>發光二極體（LED）</li>\n                        <li>微機電（MEMS）</li>\n                        <li>軟性電子</li>\n                        <li>微電子與奈米電子相關領域</li>\n                        <li>平面顯示器 (FPD)</li>\n					</ul>\n                    <p class="rtejustify">SEMI 連結全球1,900多家會員企業以及逾25萬位專業人士，推動電子製造科學與商業發展。SEMI會員致力創新材料、設計、設備、軟體及服務，促成更聰明、快速、功能強且價格實惠的電子產品。</p>\n                    <p class="rtejustify">40多年來，SEMI 透過規劃各式會議、倡議和行動，協助會員及業界拓展商機，並促進市場成長。SEMI 於全球科技重鎮均設立辦公據點，為廣大的會員提供即時且專業的服務。</p>\n                    <p class="rtejustify">&nbsp;</p>\n            	</div>\n                <div class="col-md-6">\n                	<iframe height="300px" src="http://player.vimeo.com/video/30873968" width="100%"></iframe>\n                </div>\n			</div>\n            <div class="row">\n            	<div class="col-md-12">\n                	<h2 class="block_title">目的</h2>\n                    <div class="row">\n                    	<div class="col-md-4 col-sm-4">\n                        	<img class="img_responsive" src="<?=$siteurl;?>images/test/about_our_purpose.jpg" />\n                    	</div>\n                        <div class="col-md-8 col-sm-8">\n                        	<p>微電子供應鍊之相關產業日趨複雜，重資本且互相依賴。為持續讓頂尖電子產品更為順利地推入市場，須具備下列元素：</p>\n                            <ul>\n                            	<li><p>興建新廠房（晶圓廠)</p></li>\n                                <li><p>發展新製程、工具、材料和製造標準</p></li>\n                                <li><p>政策與規範倡議並採取行動，促進商業成長</p></li>\n                                <li><p>投資組織和財務資源</p></li>\n                                <li><p>全球橫跨產業之各面向的整合</p></li>\n                                <li><p>發起全球性規模之活動以因應需求與挑戰</p></li>\n							</ul>\n                            <p>SEMI 於不同區域籌辦展會、貿易考察和會議，促進產業和各生產與製造重鎮的發展與成長。SEMI不僅與地方、國家政府和立法單位，以及各界維持緊密的合作，更投入產業研究，發表市場資訊，亦支持其他有助投資、貿易與科技創新的活動。</p>\n                            <p>SEMI 不僅支持會員打入各區域市場，更進一步協助會員探索新興與相鄰市場之商機，促進產業成長。</p>\n                    	</div>\n                    </div>\n            	</div>\n            </div>'),
(14, 24, 1476783938, 2, 2, '<p>123额的期望v出去玩v出去玩v人权为荣v去</p>');

-- --------------------------------------------------------

--
-- 表的结构 `semi_column`
--

CREATE TABLE IF NOT EXISTS `semi_column` (
  `ID` int(5) NOT NULL,
  `column_title` varchar(20) NOT NULL COMMENT '栏目名称',
  `column_linktitle` varchar(20) NOT NULL COMMENT '连接名',
  `column_templet` varchar(20) DEFAULT NULL COMMENT '文章\\栏目模板',
  `column_type` int(1) NOT NULL COMMENT '栏目类型1:普通文章,2:新闻,3:活动',
  `column_parent` int(5) NOT NULL DEFAULT '0' COMMENT '父栏目ID',
  `column_order` int(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `column_show` varchar(20) DEFAULT NULL COMMENT '显示区域',
  `column_semtitle` varchar(50) DEFAULT NULL,
  `column_keywords` varchar(200) DEFAULT NULL,
  `column_description` varchar(200) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='栏目表';

--
-- 转存表中的数据 `semi_column`
--

INSERT INTO `semi_column` (`ID`, `column_title`, `column_linktitle`, `column_templet`, `column_type`, `column_parent`, `column_order`, `column_show`, `column_semtitle`, `column_keywords`, `column_description`) VALUES
(1, '我们是谁', 'about', 'index_about', 1, 8, 1, '["1","2"]', '请问请问', '请问请问23', '去问驱蚊器为'),
(2, '成功案例', 'case', 'index_marketInfo', 2, 0, 2, '["1","2"]', '去问驱蚊器为', '去问驱蚊器为', '去问驱蚊器为'),
(3, 'CRM服务', 'crm', 'index_about', 1, 0, 3, '["1","2"]', 'www', '222', '111'),
(4, '助学基金', '101', 'index_about', 1, 0, 4, '["1","2"]', '', '', ''),
(5, '我们做什么', 'about_business', 'index_about', 1, 3, 0, '["1","2"]', '', '', ''),
(7, '联系我们', 'about_us', 'index_about', 1, 3, 0, '["1","2"]', '', '', ''),
(8, '整合营销', 'marketing', NULL, 2, 2, 0, '["1","2"]', '', '', ''),
(9, '网站设计', 'design', NULL, 2, 2, 0, '["1","2"]', '', '', ''),
(10, '微信', 'wechat', NULL, 2, 2, 0, '["1","2"]', '', '', ''),
(21, '移动媒体', 'interaction', '', 2, 2, 0, '["1","2"]', '', '', ''),
(23, 'SEMI', 'semi', 'index_about', 1, 0, 0, '["1","2"]', 'SEMI ABOUT', 'SEMI ABOUT 111', 'SEMI ABOUT 222'),
(24, 'SEMI TEST', 'semitest', 'index_about', 1, 0, 1, '["1","2"]', '123123123', '123123123123', '12312312sadafeddf');

-- --------------------------------------------------------

--
-- 表的结构 `semi_newslist`
--

CREATE TABLE IF NOT EXISTS `semi_newslist` (
  `ID` int(9) NOT NULL,
  `ColumnID` int(5) NOT NULL COMMENT '所属栏目ID',
  `Title` varchar(200) NOT NULL COMMENT '新闻标题',
  `Pic` varchar(45) NOT NULL COMMENT '封面图',
  `Article` varchar(21000) NOT NULL COMMENT '新闻内容',
  `Introduced` varchar(500) NOT NULL COMMENT '内容简介',
  `Focus` int(1) NOT NULL DEFAULT '2' COMMENT '焦点:1是,2否',
  `Hot` int(1) NOT NULL DEFAULT '2' COMMENT '头条:1是,2否',
  `Power` int(1) NOT NULL DEFAULT '1' COMMENT '浏览权限:1普通，2:会员浏览',
  `Showpage` int(1) NOT NULL DEFAULT '1' COMMENT '发布状态1:未发布,2:已发布',
  `Templet` varchar(40) DEFAULT NULL COMMENT '模板',
  `NewsTime` int(10) NOT NULL COMMENT '新闻发布时间',
  `EditTime` int(10) NOT NULL COMMENT '最后编辑时间',
  `AdminID` int(5) NOT NULL COMMENT '最后编辑管理员ID'
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='新闻列表';

--
-- 转存表中的数据 `semi_newslist`
--

INSERT INTO `semi_newslist` (`ID`, `ColumnID`, `Title`, `Pic`, `Article`, `Introduced`, `Focus`, `Hot`, `Power`, `Showpage`, `Templet`, `NewsTime`, `EditTime`, `AdminID`) VALUES
(2, 2, '测试新闻测试新闻', '01ada4bbe8cf7b20a175f2ddbe1e9fda_s.jpg', '太太太太太1231231231231231231231231231231', '123123123', 2, 2, 1, 1, 'index_about', 1476892800, 1476954338, 1),
(3, 21, 'cececece', '837d7d178411f6ada5ba0f7bdfb1dd55_s.jpg', '<p><img src="/images/admin_upload/c79f5d33dd80c0ba26ff1a1456867bd2.jpg" style="width: 600px;">qweqweqwe</p>', '23123123123去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯', 2, 1, 2, 2, 'index_about', 1475424000, 1477538726, 1),
(5, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(6, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(7, 2, '测试新闻测试新闻', '01ada4bbe8cf7b20a175f2ddbe1e9fda_s.jpg', '太太太太太1231231231231231231231231231231', '123123123', 2, 2, 1, 1, 'index_about', 1476892800, 1476954338, 1),
(8, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(9, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(10, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(11, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(12, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(13, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(14, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(15, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(16, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(17, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(18, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(19, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(20, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 1, 1, 1, 1, 'index_about', 1475510400, 1477021658, 1),
(21, 9, '测试测试测试测试测试', 'fcfc75641a40a6948d51b2094e00e346_s.jpg', '<p><img src="/images/admin_upload/19dff9ad30558316028a3802ceb7a956.jpg" style="width: 598px;">测试测试测试测试测试<br></p>', '测试测试测试测试', 2, 2, 2, 2, 'index_about', 1475510400, 1477030270, 1),
(22, 1, 'qweqweqweqwe', 'fd6f7115b75f12a908b6c818ca22e934_s.jpg', '<p>qweqweqweqwe111222<span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span></p>', 'qweqweqwe去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯', 2, 2, 1, 1, 'index_about', 432000, 1477537868, 1),
(24, 21, '请问请问武器恶趣味请问', '43e0177c1e8724c662ea807852a14046_s.jpg', '<p><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><span style="line-height: 18.5714px;">去问驱蚊器恶趣味全额万绮雯</span><br></p>', '委屈委屈委屈我去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯去问驱蚊器恶趣味全额万绮雯', 2, 1, 2, 1, 'index_about', 1475510400, 1477537855, 1);

-- --------------------------------------------------------

--
-- 表的结构 `semi_siteinfo`
--

CREATE TABLE IF NOT EXISTS `semi_siteinfo` (
  `ID` int(1) NOT NULL,
  `Title` varchar(50) NOT NULL COMMENT 'title',
  `Keywords` varchar(200) NOT NULL COMMENT 'keywords',
  `Description` varchar(200) NOT NULL COMMENT 'description'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='站点设置信息';

--
-- 转存表中的数据 `semi_siteinfo`
--

INSERT INTO `semi_siteinfo` (`ID`, `Title`, `Keywords`, `Description`) VALUES
(1, 'SEMI大半导体产业网', '国际合作,协会,封测委员会,半导体,光伏,光伏发电,LED,PV,FPD,半导体市场,半导体产业分析,半导体产业规划,光伏产业规划,光电产业规划,开发区规划,产业分析,产业规划,FAB数据库,产业研究报告,技术评估,项目评估,产业政策,产业智库,技术路线图,标准', 'SEMI中国官方网站');

-- --------------------------------------------------------

--
-- 表的结构 `semi_user`
--

CREATE TABLE IF NOT EXISTS `semi_user` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_power` int(1) NOT NULL COMMENT '权限'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员表';

--
-- 转存表中的数据 `semi_user`
--

INSERT INTO `semi_user` (`ID`, `user_name`, `user_password`, `user_power`) VALUES
(1, 'datouboy', 'cd80e364a9d23ec193cccb5af382e3e4', 9),
(2, 'admin', '4e66f8665b6a273e80d9ef436614145d', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `semi_admin`
--
ALTER TABLE `semi_admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `semi_article`
--
ALTER TABLE `semi_article`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `semi_column`
--
ALTER TABLE `semi_column`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `column_linktitle` (`column_linktitle`),
  ADD KEY `column_linktitle_2` (`column_linktitle`);

--
-- Indexes for table `semi_newslist`
--
ALTER TABLE `semi_newslist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `semi_siteinfo`
--
ALTER TABLE `semi_siteinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `semi_user`
--
ALTER TABLE `semi_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `semi_admin`
--
ALTER TABLE `semi_admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semi_article`
--
ALTER TABLE `semi_article`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `semi_column`
--
ALTER TABLE `semi_column`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `semi_newslist`
--
ALTER TABLE `semi_newslist`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `semi_siteinfo`
--
ALTER TABLE `semi_siteinfo`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `semi_user`
--
ALTER TABLE `semi_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
