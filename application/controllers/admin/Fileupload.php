<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fileupload extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->loginPage = base_url().'admin/root/';
	}

	public function index()
	{
	}

	//后台图片上传接口
	public function img_uoload($inputName){
		header('Content-Type: text/html; charset=utf-8');

		if(!$this->_loginIn()){
			echo json_encode(array('result'=>false, 'error' => '权限错误！'));
			return;
		}

		$config = $this->_img_upload();
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($inputName)){
			$error = $this->upload->display_errors();
			echo json_encode(array('result'=>false, 'error' => $error));
		}else{
			$data['upload_data'] = $this->upload->data();
			$imgName = $data['upload_data']['file_name'];
			echo json_encode(array('result'=>true, 'img' => '/images/admin_upload/'.$imgName));
		}
	}

	//后台图片上传接口
	public function img_uoload_newslist($inputName){
		header('Content-Type: text/html; charset=utf-8');

		if(!$this->_loginIn()){
			echo json_encode(array('result'=>false, 'error' => '权限错误！'));
			return;
		}

		$config = $this->_img_upload();
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($inputName)){
			$error = $this->upload->display_errors();
			echo json_encode(array('result'=>false, 'error' => $error));
		}else{
			$data['upload_data'] = $this->upload->data();
			$imgName = $data['upload_data']['file_name'];
			$imgUrl = dirname(dirname(dirname(dirname(__FILE__)))).'/images/admin_upload/'.$imgName;
			//echo json_encode(array('result'=>true, 'img' => $imgName));

			//缩略图（大图）生成
			$image_size = getimagesize($imgUrl);
			$imgHeight = $image_size[1];
			$imgWidth = $image_size[0];
			$config_img = array();
			if($imgWidth/$imgHeight < 540/347){
				$config_img['width'] = 540;
			}else{
				$config_img['height'] = 347;
			}
			$config_img['image_library'] = 'gd2';
			$config_img['source_image']  = $imgUrl;
			$config_img['quality']       = 100;
			$config_img['maintain_ratio']= TRUE;//保持图片纵横比
			$config_img['new_image']     = preg_replace("#\.#", "_s.", $imgUrl);
			$this->load->library('image_lib', $config_img);
			if (!$this->image_lib->resize())//图片缩放
			{
				echo json_encode(array('result'=>false, 'error' => $this->image_lib->display_errors()));
				return;
			}
			//缩略图（大图）裁剪
			$img_s_Url = preg_replace("#\.#", "_s.", $imgUrl);
			$this->image_lib->clear();
			$image_size = getimagesize($img_s_Url);
			$imgHeight = $image_size[1];
			$imgWidth = $image_size[0];
			$config_img = array();
			if($imgWidth > 540){
				$config_img['x_axis'] = ($imgWidth - 540)/2;
			}else if($imgHeight > 347){
				$config_img['y_axis'] = ($imgHeight - 347)/2;
			}
			$config_img['width'] = 540;
			$config_img['height'] = 347;
			$config_img['image_library'] = 'gd2';
			$config_img['source_image']  = $img_s_Url;
			$config_img['quality']       = 80;
			$config_img['maintain_ratio']= false;//保持图片纵横比
			$config_img['new_image']     = $img_s_Url;
			$this->image_lib->initialize($config_img);//第二次调用图片处理功能必须加的
			$this->load->library('image_lib', $config_img);
			if (!$this->image_lib->crop())//图片缩放
			{
				echo json_encode(array('result'=>false, 'error' => $this->image_lib->display_errors()));
				return;
			}
			//缩略图（小图）生成
			$this->image_lib->clear();
			$image_size = getimagesize($imgUrl);
			$imgHeight = $image_size[1];
			$imgWidth = $image_size[0];
			$config_img = array();
			if($imgWidth/$imgHeight < 138/88){
				$config_img['width'] = 130;
			}else{
				$config_img['height'] = 88;
			}
			$config_img['image_library'] = 'gd2';
			$config_img['source_image']  = $imgUrl;
			$config_img['quality']       = 100;
			$config_img['maintain_ratio']= TRUE;
			$config_img['new_image']     = preg_replace("#\.#", "_sf.", $imgUrl);
			$this->load->library('image_lib', $config_img);
			$this->image_lib->initialize($config_img);//第二次调用图片处理功能必须加的
			if (!$this->image_lib->resize())//图片裁切
			{
				echo json_encode(array('result'=>false, 'error' => $this->image_lib->display_errors()));
				return;
			}
			//缩略图（小图）裁剪
			$img_sf_Url = preg_replace("#\.#", "_sf.", $imgUrl);
			$this->image_lib->clear();
			$image_size = getimagesize($img_sf_Url);
			$imgHeight = $image_size[1];
			$imgWidth = $image_size[0];
			$config_img = array();
			if($imgWidth > 130){
				$config_img['x_axis'] = ($imgWidth - 130)/2;
			}else if($imgHeight > 88){
				$config_img['y_axis'] = ($imgHeight - 88)/2;
			}
			$config_img['width'] = 130;
			$config_img['height'] = 88;
			$config_img['image_library'] = 'gd2';
			$config_img['source_image']  = $img_sf_Url;
			$config_img['quality']       = 80;
			$config_img['maintain_ratio']= false;//保持图片纵横比
			$config_img['new_image']     = $img_sf_Url;
			$this->image_lib->initialize($config_img);//第二次调用图片处理功能必须加的
			$this->load->library('image_lib', $config_img);
			if (!$this->image_lib->crop())//图片缩放
			{
				echo json_encode(array('result'=>false, 'error' => $this->image_lib->display_errors()));
				return;
			}
			//删除原始大图
			@unlink($imgUrl);
			//图片裁图处理结束
			//echo json_encode(array('result'=>true, 'url' => $imgName, 'url_s' => preg_replace("#\.#", "_s.", $imgName), 'url_sf' => preg_replace("#\.#", "_sf.", $imgName)));
			echo json_encode(array('result'=>true, 'url' => preg_replace("#\.#", "_s.", $imgName), 'url_s' => preg_replace("#\.#", "_sf.", $imgName)));
		}
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////
			
	private function _loginIn()//判断管理员是否登录
	{
		if(is_numeric($this->session->userdata('AdminID')) && $this->session->userdata('AdminLogin') == true){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	//图片上传配置
	private function _img_upload(){
		$config['upload_path'] = dirname(dirname(dirname(dirname(__FILE__)))).'/images/admin_upload/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_ext_tolower'] = true;
		$config['max_size'] = '51200';//5120KB
		$config['max_width']  = '8000';
		$config['max_height']  = '8000';
		$config['overwrite'] = false;
		$config['encrypt_name'] = true;
		$config['remove_spaces'] = true;
		return $config;
	}
}
?>