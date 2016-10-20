<?php
class Admin_nav_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function get_leftNav(){//管理员菜单信息
		$nalArray = array();

		$nalArray['site']['setup'] = array('link'=>'site','title'=>'站点配置','display'=>true,'icon'=>'fa-sitemap','power'=>array(9));
		$nalArray['site']['nav'][] = array('link'=>'navigation_list','title'=>'导航菜单管理','display'=>true,'power'=>array(9));
		$nalArray['site']['nav'][] = array('link'=>'site_seo','title'=>'SEO配置','display'=>true,'power'=>array(9));

		$nalArray['article']['setup'] = array('link'=>'article','title'=>'内容管理','display'=>true,'icon'=>'fa-edit','power'=>array(9));
		$nalArray['article']['nav'][] = array('link'=>'article_list','title'=>'文章内容列表','display'=>true,'power'=>array(9));
		$nalArray['article']['nav'][] = array('link'=>'news_list','title'=>'新闻列表','display'=>true,'power'=>array(9));

		/*$nalArray['goods']['setup'] = array('link'=>'goods','title'=>'产品管理','display'=>true,'icon'=>'fa-sitemap','power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_list','title'=>'产品列表','display'=>true,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_add','title'=>'添加产品','display'=>true,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_add_step2','prev'=>'goods_add','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_add_step3','prev'=>'goods_add','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_add_step4','prev'=>'goods_add','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_add_end','prev'=>'goods_add','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_edit','prev'=>'goods_list','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_edit_step2','prev'=>'goods_list','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_edit_step3','prev'=>'goods_list','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_edit_step4','prev'=>'goods_list','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_edit_step5','prev'=>'goods_list','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_scenic_list','title'=>'推荐景点管理','display'=>true,'power'=>array(9,8));
		$nalArray['goods']['nav'][] = array('link'=>'goods_scenic_add','prev'=>'goods_scenic_list','display'=>false,'power'=>array(9,8));
		$nalArray['goods']['nav'][] = array('link'=>'goods_scenic_edit','prev'=>'goods_scenic_list','display'=>false,'power'=>array(9,8));
		$nalArray['goods']['nav'][] = array('link'=>'goods_scenic_addend','prev'=>'goods_scenic_list','display'=>false,'power'=>array(9,8));
		$nalArray['goods']['nav'][] = array('link'=>'goods_country_list','title'=>'国家管理','display'=>true,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_country_add','prev'=>'goods_country_list','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_flight_list','title'=>'航班管理','display'=>true,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_flight_add','prev'=>'goods_flight_list','display'=>false,'power'=>array(9));
		$nalArray['goods']['nav'][] = array('link'=>'goods_flight_add','prev'=>'goods_flight_addend','display'=>false,'power'=>array(9));
		
		$nalArray['order']['setup'] = array('link'=>'order','title'=>'订单管理','display'=>true,'icon'=>'fa-sitemap','power'=>array(9));
		$nalArray['order']['nav'][] = array('link'=>'order_list','title'=>'旅游订单','display'=>true,'power'=>array(9));
		$nalArray['order']['nav'][] = array('link'=>'order_info','prev'=>'order_list','display'=>false,'power'=>array(9));
		$nalArray['order']['nav'][] = array('link'=>'order_consultant_list','title'=>'定制旅游订单','display'=>true,'power'=>array(9));
		$nalArray['order']['nav'][] = array('link'=>'order_consultant_info','prev'=>'order_consultant_list','display'=>false,'power'=>array(9));
		$nalArray['order']['nav'][] = array('link'=>'order_visa_list','title'=>'签证订单','display'=>true,'power'=>array(9));
		$nalArray['order']['nav'][] = array('link'=>'order_visa_info','prev'=>'order_visa_list','display'=>false,'power'=>array(9));
		
		$nalArray['user']['setup'] = array('link'=>'user','title'=>'用户管理','display'=>true,'icon'=>'fa-sitemap','power'=>array(9));
		$nalArray['user']['nav'][] = array('link'=>'user_list','title'=>'用户列表','display'=>true,'power'=>array(9));
		$nalArray['user']['nav'][] = array('link'=>'user_info','prev'=>'user_list','display'=>false,'power'=>array(9));*/
		
		return $nalArray;
	}

}
?>