<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}

	//首页
	public function index()
	{
		redirect(base_url().'news/showlist/');
	}
	
	//文章
	public function showlist($linkTitle=''){
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
			$templet = 'index_marketInfo';
		}

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

		//加载模板
		$this->load->view('template/'.$templet, $data);
	}
	
	public function cases($linkTitle=''){//案例
		$data['siteurl'] = base_url();
	
		$this->load->model('Sino_m');
		$this->load->library('Dboysclass');//加载自有类库
		$data['siteInfo'] = $this->_get_siteInfo();
		$data['columnSeo'] = $this->_get_column_sem_info($linkTitle,'default');
		$data['navArray'] = $this->Sino_m->get_nav_array();
		
		$data['caseColumnArray'] = $this->Sino_m->get_nav_array_by_id(2);//输出指定栏目子栏目
		$data['column_title'] = $this->Sino_m->get_column_title($linkTitle);//根据linkTitle查询栏目名称	
		
		$data['linkTitle'] = $linkTitle;
		
		$this->_add_access_log($linkTitle);
		if($this->dboysclass->isMobile()){
			$data['casesList'] = $this->Sino_m->get_cases_list($linkTitle,5,0,'array');
		
			$data['allnum'] = $this->Sino_m->get_cases_list_count($linkTitle);//获取本栏目案例总数
			$this->load->view('case_v', $data);//加载模板
		}else{
			if($data['column_title']['column_parent'] == 0){
				$data['column_title']['ID'] = '';
			};
			$this->load->library('pagination');//加载翻页类
			$config['full_tag_open'] = '<ul class="pagefen"><li class="start"></li>';
			$config['full_tag_close'] = '<li class="end"></li></ul>';
			$config['first_link'] = '第一页';
			$config['last_link'] = '最后页';
			$config['num_links'] = 4;//调整数字出现的个数
			$config['uri_segment'] = 4;
			$config['next_link'] = '下一页';
			$config['prev_link'] = '上一页';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li><strong>';
			$config['cur_tag_close'] = '</strong></li>';
			$config['base_url'] = $data['siteurl'] . 'view/cases/'.$linkTitle;
			$config['total_rows'] = $this->Sino_m->get_case_list_count($data['column_title']['ID']);
			$config['per_page'] = 6;//设置每页显示书的条数
			$this->pagination->initialize($config); 
			$data['pagefen'] = $this->pagination->create_links();
			$data['casesList'] = $this->Sino_m->get_case_list_array($data['column_title']['ID'],$config['per_page'],$this->uri->segment(4));//案例翻页列表
			
			$this->load->view('pc/case_v', $data);//加载模板
		}
	}
	
	public function cases_content($id){//案例内页
		$data['siteurl'] = base_url();
	
		$this->load->model('Sino_m');
		$this->load->library('Dboysclass');//加载自有类库
		$data['siteInfo'] = $this->_get_siteInfo();
		$data['columnSeo'] = $this->_get_column_sem_info($id,'cases_content');
		$data['navArray'] = $this->Sino_m->get_nav_array();
		
		$data['caseColumnArray'] = $this->Sino_m->get_nav_array_by_id(2);//输出指定栏目子栏目
		$data['column_title'] = $this->Sino_m->get_column_title_by_cases_content($id);//根据linkTitle查询栏目名称
		
		$data['casesContent'] = $this->Sino_m->get_cases_content($id);//获取案例详情
		
		$this->load->view('case_content_v', $data);//加载模板
	}
	
	public function ajax_cases_list(){//ajax案例翻页
		$linkTitle = $this->input->post('linkTitle');
		$pagenum   = $this->input->post('pagenum');
		
		$this->load->library('Dboysclass');//加载自有类库
		
		if($linkTitle != '' && is_numeric($pagenum)){
		}else{
			echo json_encode(array ('result'=>FALSE,'message'=>'输入数据类型错误'));
			return FALSE;
		}
		
		$pagenum = ($pagenum+1)*5;
		
		$this->load->model('Sino_m');
		
		header('Content-Type: text/html; charset=utf-8');
		$casesList = $this->Sino_m->get_cases_list($linkTitle,5,$pagenum,'ajax');//每次加载5条记录

		if(count($casesList)>0){
			echo json_encode(array ('result'=>TRUE,'message'=>$casesList));
		}else{
			echo json_encode(array ('result'=>FALSE,'message'=>'已经全部加载完成'));
		}
	}
	
	public function ajax_cases_content(){//ajax获取案例详情
		$case_id = $this->input->post('case_id');
		
		$this->load->model('Sino_m');
		
		header('Content-Type: text/html; charset=utf-8');
		$casesContent = $this->Sino_m->get_cases_content($case_id);//获取案例详情
		
		if(count($casesContent)>0){
			echo json_encode(array ('result'=>TRUE,'message'=>$casesContent));
		}else{
			echo json_encode(array ('result'=>FALSE,'message'=>'加载错误'));
		}
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