<?php
class MY_Model extends CI_Model {

	protected $_table_name = '';
	protected $_primary_key = 'id';
	public $rules = array();

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
		// Insert
		if ($id === NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}
		return $id;
	}

}