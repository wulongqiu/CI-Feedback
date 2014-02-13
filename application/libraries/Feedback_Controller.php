<?php
class Feedback_Controller extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->data['site_name'] = '表单系统';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('feedback_m');
	}
}