<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Dboysclass {

    function __construct(){}
	
	function SubString($String,$Length)//中文截词功能
	{
		$Str_length = (strlen($String) + mb_strlen($String,'UTF8')) / 2;
		if($Str_length <= $Length){
			return $String;
		}else{
			$Length = $Length/2 - 1;
			return mb_substr($String,0,$Length,'utf-8').'…';
		}
	}
	
	function strlen_utf8($str) {//计算字数
		
		$str = preg_replace ("#&nbsp;#i", '', $str);//计算前去除无效字符
		$str = preg_replace ("#<br \/>#i", '', $str);
		$str = preg_replace ("#<br\/>#i", '', $str);
		$str = preg_replace ("#<br>#i", '', $str);
		
		$i = 0;
		$count = 0;
		$len = strlen ($str);
		while ($i < $len) {
			$chr = ord ($str[$i]);
			$count++;
			$i++;
			if($i >= $len) break;
			if($chr & 0x80) {
				$chr <<= 1;
				while ($chr & 0x80) {
					$i++;
					$chr <<= 1;
				}
			}
		}
		return $count;
	}
	
	function randomkeys($length)//生成随机数
	{
		$pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
		$key = "";
		for($i=0;$i<$length;$i++)
		{
			$key .= $pattern{mt_rand(0,35)};
		}
		return $key;
	}
	
	function isMobile() {//判断是否手机
		// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
		if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {return true;}
		//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
		if (isset ($_SERVER['HTTP_VIA'])) {//找不到为flase,否则为true
			return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
		}
		//判断手机发送的客户端标志,兼容性有待提高
		if (isset ($_SERVER['HTTP_USER_AGENT'])) {
			$clientkeywords = array ('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile');
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
			if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
				return true;
			}
		}
		//协议法，因为有可能不准确，放到最后判断
		if (isset ($_SERVER['HTTP_ACCEPT'])) {
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
			if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
				return true;
			}
		}
		return false;
	}
	
	function GetIp(){//输出IP
		global $ip; 

		if (getenv("HTTP_CLIENT_IP")) 
		$ip = getenv("HTTP_CLIENT_IP"); 
		else if(getenv("HTTP_X_FORWARDED_FOR")) 
		$ip = getenv("HTTP_X_FORWARDED_FOR"); 
		else if(getenv("REMOTE_ADDR")) 
		$ip = getenv("REMOTE_ADDR"); 
		else 
		$ip = "Unknow";
		
		return $ip;
	}
	
	function strsToArray($strs){//逗号、空格、回车分隔的字符串转换为数组的函数
		$result = array(); 
		$array = array(); 
		$strs = str_replace('，', ',', $strs); 
		$strs = str_replace("n", ',', $strs); 
		$strs = str_replace("rn", ',', $strs); 
		$strs = str_replace(' ', ',', $strs); 
		$array = explode(',', $strs); 
		foreach ($array as $key => $value) { 
			if ('' != ($value = trim($value))) { 
				$result[] = $value; 
			} 
		} 
		return $result; 
	}
	
	function arrayToStrs($array){//数组转换成逗号分隔的字符串
		$strs = '';
		if(count($array)>0){
			foreach ($array as $key => $value) { 
				$strs = $strs.$value.',';
			} 
		}
		return $strs; 
	}
	
	function inWechat(){//判断是否是微信浏览器
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		if (strpos($user_agent, 'MicroMessenger') === false) {// 非微信浏览器
			return false;
		}else{// 微信浏览器
			return true;
		}
	}
	
	function utf8_strlen($string = null){// 计算中文字符串长度
		// 将字符串分解为单元
		preg_match_all("/./us", $string, $match);
		// 返回单元个数
		return count($match[0]);
	}
	
	function getStrPy($str){//获取字符串每个字的首字母
		$yp = '';
		$strLength = $this->utf8_strlen($str);
		if($strLength > 0){
			for($i=0; $i<=$strLength-1; $i++){
				$yp = $yp.$this->getfirstchar(mb_substr($str,$i,$i+1,'utf-8'));
			}
		}
		return $yp;
	}
	
	function getfirstchar($s0){//获取单个汉字首字母
		$firstchar_ord=ord(strtoupper($s0{0})); 
		if (($firstchar_ord>=65 and $firstchar_ord<=91)or($firstchar_ord>=48 and $firstchar_ord<=57)) return $s0{0}; 
		$s=iconv("UTF-8","gb2312", $s0); 
		$asc=ord($s{0})*256+ord($s{1})-65536; 
		if($asc>=-20319 and $asc<=-20284)return "a"; 
		if($asc>=-20283 and $asc<=-19776)return "b"; 
		if($asc>=-19775 and $asc<=-19219)return "c"; 
		if($asc>=-19218 and $asc<=-18711)return "d"; 
		if($asc>=-18710 and $asc<=-18527)return "e"; 
		if($asc>=-18526 and $asc<=-18240)return "f"; 
		if($asc>=-18239 and $asc<=-17923)return "g"; 
		if($asc>=-17922 and $asc<=-17418)return "h"; 
		if($asc>=-17417 and $asc<=-16475)return "j"; 
		if($asc>=-16474 and $asc<=-16213)return "k"; 
		if($asc>=-16212 and $asc<=-15641)return "l"; 
		if($asc>=-15640 and $asc<=-15166)return "m"; 
		if($asc>=-15165 and $asc<=-14923)return "n"; 
		if($asc>=-14922 and $asc<=-14915)return "o"; 
		if($asc>=-14914 and $asc<=-14631)return "p"; 
		if($asc>=-14630 and $asc<=-14150)return "q"; 
		if($asc>=-14149 and $asc<=-14091)return "r"; 
		if($asc>=-14090 and $asc<=-13319)return "s"; 
		if($asc>=-13318 and $asc<=-12839)return "t"; 
		if($asc>=-12838 and $asc<=-12557)return "w"; 
		if($asc>=-12556 and $asc<=-11848)return "x"; 
		if($asc>=-11847 and $asc<=-11056)return "y"; 
		if($asc>=-11055 and $asc<=-10247)return "x"; 
		return null; 
	}
	
	function get_rand($proArr){//抽奖概率
		$result = '';    
		//概率数组的总概率精度   
		$proSum = array_sum($proArr);    
		//概率数组循环   
		foreach ($proArr as $key => $proCur) {   
			$randNum = mt_rand(1, $proSum);   
			if ($randNum <= $proCur) {   
				$result = $key;   
				break;   
			} else {   
				$proSum -= $proCur;   
			}         
		}   
		unset ($proArr);    
		return $result;   
	}
	
	function num2char($num,$mode=false){
		$char = array('零','一','二','三','四','五','六','七','八','九');
		$dw = array('','十','百','千','','万','亿','兆');
		$dec = '点';
		$retval = '';
		if($mode){
			preg_match_all('/^0*(\d*)\.?(\d*)/',$num, $ar);
		}else{
			preg_match_all('/(\d*)\.?(\d*)/',$num, $ar);
		}
		if($ar[2][0] != ''){
			$retval = $dec . ch_num($ar[2][0],false); //如果有小数，先递归处理小数
		}
		if($ar[1][0] != ''){
			$str = strrev($ar[1][0]);
			for($i=0;$i<strlen($str);$i++) {
				$out[$i] = $char[$str[$i]];
				if($mode){
					$out[$i] .= $str[$i] != '0'? $dw[$i%4] : '';
					if($str[$i]+$str[$i-1] == 0){
						$out[$i] = '';
					}
					if($i%4 == 0){
						$out[$i] .= $dw[4+floor($i/4)];
					}
				}
			}
			$retval = join('',array_reverse($out)) . $retval;
		}
		return $retval;
	}
	
	function nextMonthUrl($year,$month)//输出下个月的年份和月份
    {
        if ($month == 12) {
            $month = 1;
            $year = ($year >= 2038) ? 2038 : $year + 1;
        }else{
            $month++;
        }
		if($month < 10){
			$month = "0".$month;
		}
        return array('year'=>$year,'month'=>$month);
    }
	
	function badWord($str){//敏感词过滤
		require(dirname(dirname(dirname(__FILE__)))."/otherfile/badwords.php");
		$badword_fun = array_combine($badword,array_fill(0,count($badword),'*'));
		$str = strtr($str, $badword_fun);
		return $str;
	}
	
	function post_text_replace($str){//提交数据过滤
		if (empty($str)) return false;
		$str = htmlspecialchars($str);
		$str = str_replace('/', "", $str);
		$str = str_replace("\\", "", $str);
		$str = str_replace("&gt", "", $str);
		$str = str_replace("&lt", "", $str);
		$str = str_replace("<SCRIPT>", "", $str);
		$str = str_replace("</SCRIPT>", "", $str);
		$str = str_replace("<script>", "", $str);
		$str = str_replace("</script>", "", $str);
		$str = str_replace("select","select",$str);
		$str = str_replace("join","join",$str);
		$str = str_replace("union","union",$str);
		$str = str_replace("where","where",$str);
		$str = str_replace("insert","insert",$str);
		$str = str_replace("delete","delete",$str);
		$str = str_replace("update","update",$str);
		$str = str_replace("like","like",$str);
		$str = str_replace("drop","drop",$str);
		$str = str_replace("create","create",$str);
		$str = str_replace("modify","modify",$str);
		$str = str_replace("rename","rename",$str);
		$str = str_replace("alter","alter",$str);
		$str = str_replace("cas","cast",$str);
		$str = str_replace("&","&",$str);
		$str = str_replace(">",">",$str);
		$str = str_replace("<","<",$str);
		$str = str_replace(" ",chr(32),$str);
		$str = str_replace(" ",chr(9),$str);
		$str = str_replace("    ",chr(9),$str);
		$str = str_replace("&",chr(34),$str);
		$str = str_replace("'",chr(39),$str);
		$str = str_replace("<br />",chr(13),$str);
		$str = str_replace("''","'",$str);
		$str = str_replace("css","'",$str);
		$str = str_replace("CSS","'",$str);
		return $str;
	}


}
?>