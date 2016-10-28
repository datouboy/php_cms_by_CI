<?php
class Admin_nav_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function get_leftNav(){//管理员菜单信息
		$nalArray = array();

		$nalArray['site']['setup'] = array('link'=>'site','title'=>'站点配置','display'=>true,'icon'=>'fa-sitemap','power'=>8);
		$nalArray['site']['nav'][] = array('link'=>'navigation_list','title'=>'导航菜单管理','display'=>true,'power'=>8);
		$nalArray['site']['nav'][] = array('link'=>'site_seo','title'=>'SEO配置','display'=>true,'power'=>8);
		$nalArray['site']['nav'][] = array('link'=>'admin_list','title'=>'网站管理员','display'=>true,'power'=>9);

		$nalArray['article']['setup'] = array('link'=>'article','title'=>'内容管理','display'=>true,'icon'=>'fa-edit','power'=>8);
		$nalArray['article']['nav'][] = array('link'=>'article_list','title'=>'文章内容列表','display'=>true,'power'=>8);
		$nalArray['article']['nav'][] = array('link'=>'news_list','title'=>'新闻列表','display'=>true,'power'=>8);
		
		return $nalArray;
	}

}
?>