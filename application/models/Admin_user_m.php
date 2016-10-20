<?php
class Admin_user_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function select_admin_info($name,$password){//管理员登录，查询管理员信息
		$this->db->where(array('Name'=>$name));
		$this->db->where(array('Password'=>$this->_get_md5_password($password)));
		$query = $this->db->get('semi_admin');
		$list = $query->result_array();
        if(count($list)==1){
			return $list[0];
		}else{
			return false;
		}
	}
	
	function updata_admin_password($id,$password){//管理员更改密码
		$this->db->where(array('ID'=>$id));
		$this->db->update('semi_admin', array('Password'=>$this->_get_md5_password($password)));
	}
	
	function _get_md5_password($password){
		return md5(md5('Again@'.$password.'#-$'));
	}

}
?>