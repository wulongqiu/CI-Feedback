<?php
class MY_Model extends CI_Model {

	protected $_table_name = '';
	protected $_primary_key = 'id';
	public $rules = array();
	protected $_timestamps = FALSE;

	function __construct()	{
		parent::__construct();
	}

	public function array_from_post($fields){
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}

	public function save($data, $id = NULL){

		//获取时间
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
//			$id || $data['created'] = $now;
			$data['pubdate'] = $now;
		}
		//获取本机IP
		$data['ip'] = $this->input->ip_address();

		// 插入数据
		if ($id === NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();

		}
		return $id;
	}

}