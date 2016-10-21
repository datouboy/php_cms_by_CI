<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->loginPage = base_url().'admin/root/';
	}

	public function index()
	{
		redirect(base_url().'admin/article/article_list/');
	}

	//文章列表
	public function article_list()
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		$data['siteurl'] = base_url();
		$data['siteInfo'] = $this->_get_siteInfo();//查询站点信息
		//$data['leftNav'] = $this->_set_leftNav();//设置左侧菜单

		$this->load->model('Nommon_m');
		$this->load->library('pagination');//加载翻页类
		$config = $this->_page_fen();
		$config['base_url'] = $data['siteurl'] . 'admin/article/article_list/';
		$config['total_rows'] = $this->Nommon_m->select_count('article');
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data['pagefen'] = $this->pagination->create_links();

		$select = 'ID,article_column_id,article_time,article_power,article_show';

		$otherInfo = array(
			array(
				'table'  => 'column',//关联表表名
				'select' => 'column_title',//需要检索的数据字段
				'where'  => 'ID',//关联表字段名
				'need'   => 'article_column_id',//原始表字段名
			)
		);
		$data['articleArray'] = $this->Nommon_m->select_list('article', $select, '', $config['per_page'], $this->uri->segment(4), 'ID ASC', $otherInfo);

		$this->load->view('admin/article_table', $data);
	}

	//文章编辑
	public function article_edit($id)
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		$data['siteurl'] = base_url();
		$data['siteInfo'] = $this->_get_siteInfo();//查询站点信息
		//$data['leftNav'] = $this->_set_leftNav();//设置左侧菜单

		$this->load->model('Nommon_m');

		$otherInfo = array(
			array(
				'table'  => 'column',//关联表表名
				'select' => 'column_title',//需要检索的数据字段
				'where'  => 'ID',//关联表字段名
				'need'   => 'article_column_id',//原始表字段名
			)
		);
		$data['article'] = $this->Nommon_m->select_content('article', '*', $id, $otherInfo);
		$data['article_id'] = $id;

		$this->load->view('admin/article_edit', $data);
	}

	//文章编辑,接受Post
	public function article_editpost($id)
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		header('Content-Type: text/html; charset=utf-8');
		$this->load->model('Nommon_m');

		$param['article_power']   = $this->input->post('article_power');
		$param['article_show']    = $this->input->post('article_show');
		$param['article_content'] = $this->input->post('article_content');
		$param['article_time'] = time();

		$this->Nommon_m->updata('article', array('ID'=>$id), $param);

		redirect(base_url().'admin/article/article_list/');
	}

	//新闻列表
	public function news_list($column='all', $goMember='all', $goShow='all', $searchText='all')
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		$data['siteurl'] = base_url();
		$data['siteInfo'] = $this->_get_siteInfo();//查询站点信息
		//$data['leftNav'] = $this->_set_leftNav();//设置左侧菜单

		$this->load->model('Nommon_m');
		//获取导航栏数组
		$data['navArray'] = $this->_get_nav_list();

		$data['urlInfo'] = array(
			'column' => $column,
			'goMember' => $goMember,
			'goShow' => $goShow,
			'searchText' => urldecode(urldecode($searchText))
		);

		$where = array();
		if($column!='all'){
			$where['ColumnID'] = $column;
		}
		if($goMember!='all'){
			$where['Power'] = $goMember;
		}
		if($goShow!='all'){
			$where['Showpage'] = $goShow;
		}
		if($searchText!='all' && $searchText!='' && $searchText!=null){
			$searchText = urldecode(urldecode($searchText));
			$whereText = '';
			foreach ($where as $key => $value) {
				$whereText .= '`'.$key.'` = "'.$value.'" and';
			}
			$whereText .= '`Title` like "%'.$searchText.'%"';
			$where = $whereText;
		}

		$this->load->library('pagination');//加载翻页类
		$config = $this->_page_fen();
		$config['base_url'] = $data['siteurl'] . 'admin/article/news_list/'.$column.'/'.$goMember.'/'.$goShow.'/'.$data['urlInfo']['searchText'].'/';
		$config['total_rows'] = $this->Nommon_m->select_count('newslist', $where);
		$config['uri_segment'] = 8;
		$this->pagination->initialize($config); 
		$data['pagefen'] = $this->pagination->create_links();

		$select = 'ID,ColumnID,Title,Pic,Power,Showpage,Templet,EditTime';

		$otherInfo = array(
			array(
				'table'  => 'column',//关联表表名
				'select' => 'column_title',//需要检索的数据字段
				'where'  => 'ID',//关联表字段名
				'need'   => 'ColumnID',//原始表字段名
			)
		);
		$data['articleArray'] = $this->Nommon_m->select_list('newslist', $select, $where, $config['per_page'], $this->uri->segment(8), 'ID DESC', $otherInfo);

		$this->load->view('admin/news_table', $data);
	}

	//新闻编辑
	public function news_edit($id)
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		$data['siteurl'] = base_url();
		$data['siteInfo'] = $this->_get_siteInfo();//查询站点信息
		//$data['leftNav'] = $this->_set_leftNav();//设置左侧菜单

		$this->load->model('Nommon_m');

		//获取导航栏数组
		$data['navArray'] = $this->_get_nav_list();

		$otherInfo = array(
			array(
				'table'  => 'column',//关联表表名
				'select' => 'column_title',//需要检索的数据字段
				'where'  => 'ID',//关联表字段名
				'need'   => 'ColumnID',//原始表字段名
			)
		);
		$data['news_info'] = $this->Nommon_m->select_content('newslist', '*', $id, $otherInfo);
		$data['news_id'] = $id;

		$this->load->view('admin/news_edit', $data);
	}

	//发布新闻,接受Post
	public function news_addpost()
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		header('Content-Type: text/html; charset=utf-8');
		$this->load->model('Nommon_m');

		$param['ColumnID']  = $this->input->post('ColumnID');
		$param['Title']     = $this->input->post('Title');
		$param['Pic']       = $this->input->post('Pic');
		$param['Article']   = $this->input->post('Article');
		$param['Introduced']= $this->input->post('Introduced');
		$param['Focus']     = $this->input->post('Focus');
		$param['Hot']       = $this->input->post('Hot');
		$param['Power']     = $this->input->post('Power');
		$param['Showpage']  = $this->input->post('Showpage');
		$param['Templet']   = $this->input->post('Templet');
		$param['NewsTime']  = strtotime($this->input->post('NewsTime'));
		$param['EditTime']  = time();
		$param['AdminID']   = $this->session->userdata('AdminID');

		$this->Nommon_m->insert('newslist', $param);

		redirect(base_url().'admin/article/news_list/');
	}

	//编辑新闻,接受Post
	public function news_editpost($id)
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		header('Content-Type: text/html; charset=utf-8');
		$this->load->model('Nommon_m');

		$param['ColumnID']  = $this->input->post('ColumnID');
		$param['Title']     = $this->input->post('Title');
		$param['Pic']       = $this->input->post('Pic');
		$param['Article']   = $this->input->post('Article');
		$param['Introduced']= $this->input->post('Introduced');
		$param['Focus']     = $this->input->post('Focus');
		$param['Hot']       = $this->input->post('Hot');
		$param['Power']     = $this->input->post('Power');
		$param['Showpage']  = $this->input->post('Showpage');
		$param['Templet']   = $this->input->post('Templet');
		$param['NewsTime']  = strtotime($this->input->post('NewsTime'));
		$param['EditTime']  = time();
		$param['AdminID']   = $this->session->userdata('AdminID');

		$this->Nommon_m->updata('newslist', array('ID'=>$id), $param);

		redirect(base_url().'admin/article/news_list/');
	}

	//删除新闻
	public function news_del($id)
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}
		header('Content-Type: text/html; charset=utf-8');
		$this->load->model('Nommon_m');

		//删除封面图
		$newsPic = $this->Nommon_m->select_content('newslist', 'Pic', $id);
		$newsPic = $newsPic['Pic'];

		$imgUrl   = dirname(dirname(dirname(dirname(__FILE__)))).'/images/admin_upload/'.$newsPic;
		$imgUrl_s = dirname(dirname(dirname(dirname(__FILE__)))).'/images/admin_upload/'.preg_replace("#\_s.#", "_sf.", $newsPic);
		@unlink($imgUrl);
		@unlink($imgUrl_s);

		//删除新闻
		$this->Nommon_m->del('newslist', array('ID'=>$id));

		redirect(base_url().'admin/article/news_list/');
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////
		
	private function _get_siteInfo(){//查询站点信息
		$this->load->model('Nommon_m');
		$siteInfo = $this->Nommon_m->select_content('siteinfo','*',1);//查询站点信息
		return $siteInfo;
	}
	
	private function _set_leftNav(){//设置左侧菜单
		$this->load->model('Admin_nav_m');
		$navArray = $this->Admin_nav_m->get_leftNav();//设置左侧菜单
		return $navArray;
	}
	
	private function _loginIn()//判断管理员是否登录
	{
		if(is_numeric($this->session->userdata('AdminID')) && $this->session->userdata('AdminLogin') == true){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	private function _page_fen(){//翻页配置
		$config['full_tag_open'] = '<ul class="pagefen">';
		$config['full_tag_close'] = '</ul>';
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
		$config['first_tag_open'] = '<li class="first">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="last">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><strong>';
		$config['cur_tag_close'] = '</strong></li>';
		$config['base_url'] = '';
		$config['total_rows'] = '';
		$config['per_page'] = 15;//设置每页显示条数
		return $config;
	}

	//输出导航栏数组
	private function _get_nav_list(){
		$this->load->model('Nommon_m');
		//获取一级导航栏数组
		$allNavArray = $this->Nommon_m->select_list('column', '*', array('column_parent'=>0), 200, 0, 'column_order ASC, ID ASC');
		//获取二级导航数组
		foreach ($allNavArray as $key => $value) {
			$navArray = $this->Nommon_m->select_list('column', '*', array('column_parent'=>$value['ID']), 200, 0, 'column_order ASC, ID ASC');
			if(count($navArray)>0){
				$allNavArray[$key]['subMenu'] = $navArray;
				//获取三级导航数组
				foreach ($allNavArray[$key]['subMenu'] as $key_s => $value_s) {
					$navArray_s = $this->Nommon_m->select_list('column', '*', array('column_parent'=>$value_s['ID']), 200, 0, 'column_order ASC, ID ASC');
					if(count($navArray_s)>0){
						$allNavArray[$key]['subMenu'][$key_s]['subMenu'] = $navArray_s;
					}else{
						$allNavArray[$key]['subMenu'][$key_s]['subMenu'] = false;
					}
				}
			}else{
				$allNavArray[$key]['subMenu'] = false;
			}
		}
		return $allNavArray;
	}
}
?>