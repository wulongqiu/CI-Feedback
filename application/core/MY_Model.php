<?php
// 核心Model函数，全站能用的模型
class MY_Model extends CI_Model {

	// 受保护的类
	protected $_table_name = '';
	// 主键
	protected $_primary_key = 'id';
	// 过虑
	protected $_primary_filter = "intval";
	// 排序
	protected $_order_by = '';
	// 验证规则
	public $rules = array();
	// 时间
	protected $_timestamps = FALSE;
	// IP
	protected $_ip = FALSE;

	// 初始化
	function __construct() {
		parent::__construct();
	}

	// array_from_post传递函数，存储为变量$data数组，核心函数，全站通用
	public function array_from_post($fields){
		// 声明变量
		$data = array();
		// 循环
		foreach ($fields as $field) {
			// 存储
			$data[$field] = $this->input->post($field);
		}
		// 返回
		return $data;
	}

	// get函数，获取数据，核心函数，全站通用。
	public function get($id = NULL, $single = FALSE){

		// 收到ID传递，读取数据
		if ($id != NULL) {
			// 判断id为主键
			$filter = $this->_primary_filter;
			$id = $filter($id);
			// 读取以此id为为主键的数据
			$this->db->where($this->_primary_key, $id);
			// row()方法取得一条数据
			$method = 'row';
		}
		else {
			// result()方法取得一个数组
			$method = 'result';
		}

		// 指定数据表
		return $this->db->get($this->_table_name)->$method();
	}

	// 排序
	public function get_by($where, $single = FALSE){
		$this->db->where($where);
		return $this->get(NULL, $single);
	}

	// 保存函数
	public function save($data, $id = NULL){

		//获取时间并格式化
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
//			$id || $data['created'] = $now;
			$data['pubdate'] = $now;
		}
		//获取本机IP
		if ($this->_ip ==TRUE) {
			$data['ip'] = $this->input->ip_address();
		}

		// 如果ID为空就插入数据
		if ($id === NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			// 插入数据
			$this->db->insert($this->_table_name);
			// 返回ID
			$id = $this->db->insert_id();
		}
		// 更新数据
		else {
			// #########
			$filter = $this->_primary_filter;
			// 
			$id = $filter($id);
			// 
			$this->db->set($data);
			// 
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}
		return $id;
	}

	// 删除函数
	public function delete($id){
		$filter = $this->_primary_filter;
		$id = $filter($id);
		// 失败返回
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}
}