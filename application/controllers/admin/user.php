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

	public function edit() {
		echo "这里是用户编辑页面";
	}

	public function delete() {
		echo "这里是用户删除页面";
	}

	public function login()
	{
		$dashboard = 'admin/dashboard';
		$this->user_m->loggedin() == FALSE || redirect($dashboard);

		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			if ($this->user_m->login() == TRUE) {
				redirect($dashboard);
			}
			else {
				$this->session->set_flashdata('error', '账号密码不对！');
				redirect('admin/user/login', 'refresh');
			}
		}

		$this->load->view('admin/login', $this->data);
	}

	public function logout()
	{
		echo "退出成功";
	}
}