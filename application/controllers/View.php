<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}

	//首页
	public function index()
	{
		$data['siteurl'] = base_url();
	
		$this->load->model('Nommon_m');
		$this->load->library('Dboysclass');//加载自有类库
		$data['siteInfo'] = $this->_get_siteInfo();
		$data['topNavArray'] = $this->_get_nav_array(array(1));
		$data['fotterNavArray'] = $this->_get_nav_array(array(2));

		//中文截词
		$data['SubString'] = function($str, $num){
			return $this->dboysclass->SubString($str,$num);
		};
		//为模版提供新闻列表输出接口
		$data['showNewsList'] = function($id='*', $focus=false, $hot=false, $limit=10, $offset=0, $order_by='DESC'){
			if($order_by == 'ASC'){
				$order_by='ID ASC';
			}else{
				$order_by='ID DESC';
			}
			$selectArray = array ();
			if(gettype($focus)!='boolean'){
				$focus = 2;
			}else{
				if($focus == true){
					$selectArray['Focus'] = '1';
				}
			}
			if(gettype($hot)!='boolean'){
				$hot = 2;
			}else{
				if($hot == true){
					$selectArray['Hot'] = '1';
				}
			}
			if($id!='*'){
				$selectArray['ColumnID'] = $id;
			}
			$getNewsList = $this->Nommon_m->select_list('newslist', '*', $selectArray, $limit, $offset, $order_by);
			foreach ($getNewsList as $key => $value) {
				$getNewsList[$key]['Pic_s'] = preg_replace("#_s\.#", "_sf.", $value['Pic']);
			}
			return $getNewsList;
		};

		$this->load->view('template/index', $data);//加载模板
		
	}
	
	//文章
	public function article($linkTitle=''){
		$data['siteurl'] = base_url();
	
		$this->load->model('Nommon_m');
		$data['siteInfo'] = $this->_get_siteInfo();
		$data['topNavArray'] = $this->_get_nav_array(array(1));
		$data['fotterNavArray'] = $this->_get_nav_array(array(2));
		
		$columnInfo = $this->Nommon_m->select_list('column', 'ID,column_templet,column_parent', array('column_linktitle' => $linkTitle), 1, 0);
		if(count($columnInfo)==0){
			echo '栏目不存在！';
			return false;
		}
		$columnInfo = $columnInfo[0];
		$data['columnSeo'] = $this->_get_column_sem_info($linkTitle);

		//查询本栏目二级菜单
		if($columnInfo['column_parent'] == 0){
			$data['subMenu'] = $this->Nommon_m->select_list('column', 'ID,column_title,column_parent,column_type,column_linktitle', array('column_parent' => $columnInfo['ID']), 200, 0, 'column_order ASC, ID ASC');
		}else{
			$data['subMenu'] = $this->Nommon_m->select_list('column', 'ID,column_title,column_parent,column_type,column_linktitle', array('column_parent' => $columnInfo['column_parent']), 200, 0, 'column_order ASC, ID ASC');
		}

		//获取模版名
		if($columnInfo['column_templet'] != ''){
			$templet = $columnInfo['column_templet'];
		}else{
			$templet = 'index_about';
		}
		
		//获取文章内容
		$data['content'] = $this->Nommon_m->select_list('article', '*', array('article_column_id' => $columnInfo['ID']), 1, 0);
		$data['content'] = $data['content'][0];

		//加载模板
		$this->load->view('template/'.$templet, $data);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////
	
	//查询站点信息
	private function _get_siteInfo(){
		$this->load->model('Nommon_m');
		$siteInfo = $this->Nommon_m->select_content("siteinfo", "*", 1);
		return $siteInfo;
	}
	
	//输出内页SEM信息
	private function _get_column_sem_info($linkTitle){
		$this->load->model('Nommon_m');
		$seoInfo = $this->Nommon_m->select_list("column", "column_semtitle,column_keywords,column_description", array('column_linktitle' => $linkTitle), 1, 0, '`ID` ASC');
		$seoInfo = $seoInfo[0];
		return $seoInfo;
	}
	
	private function _add_access_log($linkTitle){//记录访问日志
		$this->load->model('Sino_m');
		$this->Sino_m->get_add_access_log($linkTitle);
		return true;
	}

	//导航栏显示，$places：显示位置(数组)
	private function _get_nav_array($places){
		$this->load->model('Nommon_m');
		$whereAdd = '';
		foreach ($places as $key => $value) {
			$whereAdd .= ' and `column_show` like \'%'.$value.'%\'';
		}
		$where = '`column_parent` = 0'.$whereAdd;
		$navArray = $this->Nommon_m->select_list('column', 'ID,column_title,column_parent,column_type,column_linktitle', $where, 200, 0, 'column_order ASC, ID ASC');
		//获取二级导航数组
		foreach ($navArray as $key => $value) {
			$where = '`column_parent` = '.$value['ID'].$whereAdd;
			$navArray_s = $this->Nommon_m->select_list('column', 'ID,column_title,column_parent,column_type,column_linktitle', $where, 200, 0, 'column_order ASC, ID ASC');
			if(count($navArray)>0){
				$navArray[$key]['subMenu'] = $navArray_s;
				//获取三级导航数组
				foreach ($navArray[$key]['subMenu'] as $key_s => $value_s) {
					$where = '`column_parent` = '.$value_s['ID'].$whereAdd;
					$navArray_ss = $this->Nommon_m->select_list('column', 'ID,column_title,column_parent,column_type,column_linktitle', $where, 200, 0, 'column_order ASC, ID ASC');
					if(count($navArray_s)>0){
						$navArray[$key]['subMenu'][$key_s]['subMenu'] = $navArray_ss;
					}else{
						$navArray[$key]['subMenu'][$key_s]['subMenu'] = false;
					}
				}
			}else{
				$navArray[$key]['subMenu'] = false;
			}
		}
		return $navArray;
	}
}
?>