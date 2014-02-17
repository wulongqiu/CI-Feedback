<?php
class Feedback_m extends MY_Model {

	protected $_table_name = 'feedback';
	protected $_timestamps = TRUE;
	protected $_ip = TRUE;

	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|max_length[32]|xss_clean'
		),
		'title' => array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'content' => array(
			'field' => 'content',
			'label' => 'Content',
			'rules' => 'trim|required'
		),

	);



}