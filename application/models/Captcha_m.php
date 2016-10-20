<?php
class Captcha_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->tableFirstName = 'again_';
    }
	
	function del_captha_list(){//删除过期验证码
		$this->db->where('AddTime < '.(time() - 300));//5分钟内验证码有效
		$this->db->delete($this->tableFirstName.'captcha');
	}
	
	function select_sms_vcode($moblieNum,$type){//查询此号码是否具有获取验证码权限
		if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$/",$moblieNum)){//号码正确
		}else{//号码错误
			return array(FALSE,'手机号码错误');
		}
		
		if($type == 'reg'){
			$sql = 'SELECT COUNT(*) FROM `'.$this->tableFirstName.'user` WHERE `Mobile` = '.$moblieNum;
			$query = $this->db->query($sql);
			$userOk = $query->result_array();		
			if($userOk[0]['COUNT(*)'] > 0){//已注册用户，不可再验证
				return array(FALSE,'此号码已注册');
			}
		}

		$sql = 'SELECT COUNT(*) FROM `'.$this->tableFirstName.'sms_post` WHERE `Mobile` = '.$moblieNum.' AND `Type`= 1';
		$query = $this->db->query($sql);
		$mobileCount = $query->result_array();		
		if($mobileCount[0]['COUNT(*)'] > 10){//同一号码重复发送10次，拒绝再发送
			return array(FALSE,'此号码验证次数过多，请联系管理员');
		}else{
			$sql = 'SELECT `PostTime` FROM `'.$this->tableFirstName.'sms_post` WHERE `Mobile` = '.$moblieNum.' AND `Type`= 1 ORDER BY `ID` DESC LIMIT 0 ,1';
			$query = $this->db->query($sql);
			$PostTime = $query->result_array();
			
			if(count($PostTime) > 0){
				$sTime = time() - $PostTime[0]['PostTime'];
				if($sTime < 60){
					return array(FALSE,'请在60秒后再次提交');
				}
			}
			return array(TRUE,'');
		}
	}

}
?>