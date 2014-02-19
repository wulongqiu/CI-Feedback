<?php
// 核心控制器，继承CI_Controller
class MY_Controller extends CI_Controller {
    // 初始化
	public $data = array();
		function __construct() {
			parent::__construct();
			$this->data['errors'] = array();
			$this->data['site_name'] = config_item('site_name');

		}
}