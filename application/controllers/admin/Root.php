<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Root extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->loginPage = base_url().'admin/root/';
	}

	//管理员登录页面
	public function index()
	{
		if($this->_loginIn()){
			redirect(base_url().'admin/root/home/');
		}
		$data['siteurl'] = base_url();
		$data['siteInfo'] = $this->_get_siteInfo();//查询站点信息
		$this->load->view('admin/login', $data);
	}

	//管理员登录处理
	public function loginfun(){
		$param['Name']     = $this->input->post('user_name');
		$param['Password'] = $this->input->post('user_password');
		$yz = $this->_admin_valid($param);//验证
		if($yz === true){
			header('Content-Type: text/html; charset=utf-8');
			$this->load->model('Admin_user_m');
			$adminInfo = $this->Admin_user_m->select_admin_info($param['Name'], $param['Password']);
			if($adminInfo === false){
				echo '用户名或密码错误';
			}else{
				$newdata = array(
					'AdminLogin' => TRUE,
					'AdminID'    => $adminInfo['ID'],
					'AdminName'  => $adminInfo['Name'],
					'AdminPower' => $adminInfo['Power']
				);
				$this->session->set_userdata($newdata);
				redirect(base_url().'admin/root/home/');
			}
		}else{
			$data['siteurl'] = base_url();
			$data['siteInfo'] = $this->_get_siteInfo();//查询站点信息
			//print_r($yz);
			$data['goPage'] = array(
				'url' => base_url().'admin/root/',
				'text' => '用户名或密码错误'
			);
			$this->load->view('admin/goto_page_error', $data);
		}
	}

	//管理员登录验证
	private function _admin_valid($param) {
		$this->load->library('Validate');//加载验证类
        $obj_validate = new Validate();
        $obj_validate->validateparam = array(
            array("input"=>$param['Name'], "require"=>"true","validator"=>"useranme","message"=>"用户名格式错误"),
            array("input"=>$param['Password'], "require"=>"true","validator"=>"password","message"=>"密码格式错误"),
        );
        $error = $obj_validate->validate();
        if($error != ''){
			return $error;
        }else{
			return true;
		}
    }

    //注销登陆
    public function logout(){
		header('Content-Type: text/html; charset=utf-8');
		$newdata = array('AdminLogin', 'AdminID', 'AdminName', 'AdminPower');
		$this->session->unset_userdata($newdata);
		redirect(base_url().'admin/root/');
	}

	//首页框架
	public function home()
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		$data['siteurl'] = base_url();
		$data['siteInfo'] = $this->_get_siteInfo();//查询站点信息
		$data['leftNav'] = $this->_set_leftNav();//设置左侧菜单

		$this->load->model('Nommon_m');
		$data['adminInfo'] = $this->Nommon_m->select_content('admin', 'Power,FunPower', $this->session->userdata('AdminID'));
		if($data['adminInfo']['FunPower'] == '' || $data['adminInfo']['FunPower'] == null || $data['adminInfo']['FunPower'] == 'null'){
            $data['adminInfo']['FunPower'] = array();
        }else{
            $data['adminInfo']['FunPower'] = json_decode($data['adminInfo']['FunPower']);
        }

		$this->load->view('admin/index', $data);
	}

	//首页内容
	public function emptypage()//首页
	{
		if(!$this->_loginIn()){redirect($this->loginPage);}

		$data['siteurl'] = base_url();
		$data['siteInfo'] = $this->_get_siteInfo();//查询站点信息
		$data['leftNav'] = $this->_set_leftNav();//设置左侧菜单
		$this->load->view('admin/empty_page', $data);
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
}
?>