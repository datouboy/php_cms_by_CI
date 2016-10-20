<?php
class Nommon_m extends CI_Model {
	
	/*
	通用行数据库驱动模型，
	$otherInfo参数用于检索关联表数据，数据格式如下：
	$otherInfo 格式：
	array(
		array(
			'table'  => 'tablename',//关联表表名
			'select' => '*',//需要检索的数据字段
			'where'  => 'ID',//关联表字段名
			'need'   => 'ID',//原始表字段名
		)
	)
	2016.1.29 By Alex
	*/
	
    function __construct()
    {
        parent::__construct();
		$this->tableFirstName = 'semi_';
    }
	
	function select_content($table,$select='*',$id,$otherInfo=array()){
		$this->db->select($select);
		$this->db->where(array('ID'=>$id));
		$query = $this->db->get($this->tableFirstName.$table);
		$list = $query->result_array();

		if(count($otherInfo)>0){
			foreach($otherInfo as $key => $item){
				if(isset($item['need'])){
					$info = $this->select_list($item['table'],$item['select'],array($item['where']=>$list[0][$item['need']]),1,0);
					if(count($info)>0){
						$info = $info[0];
					}
					foreach($info as $key_s => $item_s){
						$list[0]['More_'.$item['table']] = $info;
					}
				}
			}
		}
		
		if(count($list)>0){
        	return $list[0];
		}else{
			return '没有数据';
		}
	}
	
	function select_list($table,$select='*',$where='',$limit=10,$offset=0,$order_by='ID ASC',$otherInfo=array()){
		$this->db->select($select);
		if($where != ''){
			$this->db->where($where);
		}
		$this->db->order_by($order_by);
		$this->db->limit($limit, $offset);
		$query = $this->db->get($this->tableFirstName.$table);
		$list = $query->result_array();
		
		if(count($otherInfo)>0){
			foreach($list as $key => $item){
				foreach($otherInfo as $key_s => $item_s){
					if(isset($item_s['need'])){
						$info = $this->select_list($item_s['table'],$item_s['select'],array($item_s['where']=>$list[$key][$item_s['need']]),1,0);
						if(count($info)>0){
							$info = $info[0];
						}
						foreach($info as $key_ss => $item_ss){
							$list[$key]['More_'.$item_s['table']] = $info;
						}
					}
				}
			}
		}

        return $list;
	}
	
	function select_count($table,$where=''){
		if($where != ''){
			$this->db->where($where);
		}
		return $this->db->count_all_results($this->tableFirstName.$table);
	}
	
	//插入新记录，返回ID
	function insert($table,$param){
		$this->db->insert($this->tableFirstName.$table, $param);
		
		$this->db->select('ID');
		$this->db->order_by('ID DESC');
		$this->db->limit('1,0');
		$query = $this->db->get($this->tableFirstName.$table);
		$list = $query->result_array();
		return $list[0]['ID'];
	}
	
	function updata($table,$where,$param){
		$this->db->where($where);
		$this->db->update($this->tableFirstName.$table, $param);
	}
	
	function del($table,$where){
		$this->db->where($where);
		$this->db->delete($this->tableFirstName.$table);
	}

}
?>