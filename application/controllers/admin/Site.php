<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->loginPage = base_url().'admin/root/';
	}

	public function index()
	{
		redirect(base_url().'admin/site/navigation_list/');
	}

	//导航列表管理
	public function navigation_list()
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		$data['siteurl'] = base_url();
		$data['siteInfo'] = $this->_get_siteInfo();//查询站点信息
		$data['leftNav'] = $this->_set_leftNav();//设置左侧菜单
		$this->load->model('Nommon_m');

		//获取导航栏数组
		$data['navArray'] = $this->_get_nav_list();

		$this->load->view('admin/nav_table', $data);
	}

	//新建菜单，接收Post
	public function navigation_addpost()
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		header('Content-Type: text/html; charset=utf-8');
		$param['column_title']     = $this->input->post('column_title');
		$param['column_parent']    = $this->input->post('column_parent');
		$param['column_type']      = $this->input->post('column_type');
		$param['column_linktitle'] = $this->input->post('column_linktitle');
		$param['column_templet']   = $this->input->post('column_templet');
		$param['column_show']      = json_encode($this->input->post('column_show'));
		$param['column_semtitle']    = $this->input->post('column_semtitle');
		$param['column_keywords']    = $this->input->post('column_keywords');
		$param['column_description'] = $this->input->post('column_description');

		$yz = $this->_navigation_addpost_valid($param);//验证
		if($yz === true){
			$this->load->model('Nommon_m');
			$column_id = $this->Nommon_m->insert('column', $param);
			$param_article = array(
					'article_column_id' => $column_id,
					'article_time' => time()
				);
			$this->Nommon_m->insert('article', $param_article);
			redirect(base_url().'admin/site/navigation_list/');
		}else{
			print_r($yz);
		}
	}
	//编辑菜单，接收Post
	public function navigation_editpost($id)
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		header('Content-Type: text/html; charset=utf-8');
		$param['column_title']     = $this->input->post('column_title');
		$param['column_parent']    = $this->input->post('column_parent');
		$param['column_type']      = $this->input->post('column_type');
		$param['column_linktitle'] = $this->input->post('column_linktitle');
		$param['column_templet']   = $this->input->post('column_templet');
		$param['column_show']      = json_encode($this->input->post('column_show'));
		$param['column_semtitle']    = $this->input->post('column_semtitle');
		$param['column_keywords']    = $this->input->post('column_keywords');
		$param['column_description'] = $this->input->post('column_description');

		$yz = $this->_navigation_addpost_valid($param);//验证
		if($yz === true){
			$this->load->model('Nommon_m');
			$this->Nommon_m->updata('column', array('ID'=>$id), $param);
			redirect(base_url().'admin/site/navigation_list/');
		}else{
			print_r($yz);
		}
	}
	//新建导航栏，接收Post数据验证
	private function _navigation_addpost_valid($param) {
		$this->load->library('Validate');//加载验证类
        $obj_validate = new Validate();
        $obj_validate->validateparam = array(
            array("input"=>$param['column_title'], "require"=>"true","validator"=>"Length","min"=>"3","max"=>"30","message"=>"菜单名称字符数:3-20"),
            array("input"=>$param['column_parent'], "require"=>"true","validator"=>"number","message"=>"所属栏目格式错误"),
            array("input"=>$param['column_type'], "require"=>"true","validator"=>"number","message"=>"栏目类型格式错误"),
            array("input"=>$param['column_linktitle'], "require"=>"true","validator"=>"Length","min"=>"3","max"=>"20","message"=>"链接名字符数:3-20"),
            array("input"=>$param['column_templet'], "require"=>"true","validator"=>"Length","min"=>"2","max"=>"20","message"=>"模板格式错误"),
            array("input"=>$param['column_semtitle'], "require"=>"true","validator"=>"Length","min"=>"3","max"=>"50","message"=>"Title字符数:3-50"),
            array("input"=>$param['column_keywords'], "require"=>"true","validator"=>"Length","min"=>"3","max"=>"200","message"=>"Keywords字符数:3-20"),
            array("input"=>$param['column_description'], "require"=>"true","validator"=>"Length","min"=>"3","max"=>"200","message"=>"Description字符数:3-200")
        );
        $error = $obj_validate->validate();
        if($error != ''){
			return $error;
        }else{
			return true;
		}
    }

    //编辑导航栏
	public function navigation_edit($id)
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		$data['siteurl'] = base_url();
		$data['siteInfo'] = $this->_get_siteInfo();//查询站点信息
		$data['leftNav'] = $this->_set_leftNav();//设置左侧菜单
		$this->load->model('Nommon_m');

		$data['column_inof'] = $this->Nommon_m->select_content('column', '*', $id);
		$data['column_id'] = $id;

		//获取导航栏数组
		$data['navArray'] = $this->_get_nav_list();

		$this->load->view('admin/nav_edit', $data);
	}

	//删除菜单
	public function navigation_del($id)
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}
		header('Content-Type: text/html; charset=utf-8');
		$this->load->model('Nommon_m');
		//删除菜单
		$this->Nommon_m->del('column', array('ID'=>$id));
		//删除菜单对应的文章
		$this->Nommon_m->del('article', array('article_column_id'=>$id));
		redirect(base_url().'admin/site/navigation_list/');
	}

	//编辑菜单排序
	public function navigation_orderpost()
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}
		header('Content-Type: text/html; charset=utf-8');
		$this->load->model('Nommon_m');

		$column_order = $this->input->post('column_order');
		$column_id = $this->input->post('column_id');

		foreach ($column_id as $key => $value) {
			$this->Nommon_m->updata('column', array('ID'=>$value), array('column_order' => $column_order[$key]));
		}

		redirect(base_url().'admin/site/navigation_list/');
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
		$config['base_url'] = '';
		$config['total_rows'] = '';
		$config['per_page'] = 10;//设置每页显示条数

		return $config;
	}

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