<?php
class User extends Admin_Controller {

	public function __construct ()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['users'] = $this->user_m->get();
		$this->load->view('admin/user', $this->data);
	}
	public function login()
	{
		$this->load->view('admin/login', $this->data);
	}

	public function logout()
	{
		echo "退出成功";
	}
}