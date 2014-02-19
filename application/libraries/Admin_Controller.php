<?php
// 库文件，反台全局引用
class Admin_Controller extends MY_Controller {

	function __construct ()
	{
		parent::__construct();
		// 载入form辅助函数
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');

		// 判断是否登陆
		$exception_uris = array(
			'admin/user/login',
			'admin/user/logout'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			// 没有登陆的话跳转到登陆状态
			if($this->user_m->loggedin() == FALSE) {
				redirect('admin/user/login');
			}
		}

	}
}