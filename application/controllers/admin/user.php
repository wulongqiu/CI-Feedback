<?php
class User extends Admin_Controller {

	public function __construct ()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['users'] = $this->user_m->get();
		$this->data['subview'] = 'admin/user';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($id = NULL) {

		if ($id) {
			$this->data['user'] = $this->user_m->get($id);
			count($this->data['user']) || $this->data['error'][] = "没有用户！";
		}
		else {
			$this->data['user'] = $this->user_m->get_new();
		}

		$rules = $this->user_m->rules_admin;
		$id || $rules['password']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = $this->user_m->array_from_post(array(
				'name',
				'email',
				'password',
			));
			$data['password'] = $this->user_m->hash($data['password']);
			$this->user_m->save($data, $id);
			redirect('admin/user');
		}

		$this->data['subview'] = 'admin/user-edit';
		$this->load->view('admin/_layout_main', $this->data);

	}

	public function delete ($id)
	{
		$this->user_m->delete($id);
		redirect('admin/user');
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