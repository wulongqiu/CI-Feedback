<?php
// 后台用户控制器文件，负责调度工作
// User类名，继承自Admin_Controller
class User extends Admin_Controller {

// 构造函数，初始化
	public function __construct ()
	{
		parent::__construct();
	}

// 默认控制器index.
	public function index()
	{
		//读取用户数据并存储users,MY_Model
		$this->data['users'] = $this->user_m->get();
		// 指定子视图
		$this->data['subview'] = 'admin/user';
		// 载入模板文件，并传递数据
		$this->load->view('admin/_layout_main', $this->data);
	}

	// 用户的添加和编辑控制器
	public function edit($id = NULL) {

		// 如果获取到了view页面传递过来的ID
		if ($id) {
			// 通过MY_Model执行get函数，读取数据
			$this->data['user'] = $this->user_m->get($id);
			count($this->data['user']) || $this->data['error'][] = "没有用户！";
		}
		// 添加一个新的用户，MY_Model文件的get_new()函数
		else {
			$this->data['user'] = $this->user_m->get_new();
		}

		// 指定edit的表单验证规则
		$rules = $this->user_m->rules_admin;
		// ##################
		$id || $rules['password']['rules'] .= '|required';
		// 设置表单验证
		$this->form_validation->set_rules($rules);

		// 通过验证后，执行数据操作
		if ($this->form_validation->run() == TRUE) {
			// 数据存储data数组
			$data = $this->user_m->array_from_post(array(
				'name',
				'email',
				'password',
			));
			// 密码加密，执行user_m文件中的hash加密函数，对密码进行加密操作
			$data['password'] = $this->user_m->hash($data['password']);
			// 执行保存操作，MY_Model
			$this->user_m->save($data, $id);
			// 保存后跳转
			redirect('admin/user');
		}

		// 指定子视图模板
		$this->data['subview'] = 'admin/user-edit';
		// 指定控制器的模板
		$this->load->view('admin/_layout_main', $this->data);

	}

	// 执行删除操作
	public function delete ($id)
	{
		$this->user_m->delete($id);
		// 跳转
		redirect('admin/user');
	}

	// 登陆函数
	public function login()
	{
		// 命名默认控制器地址变量
		$dashboard = 'admin/dashboard';
		// 没登陆的时候执行跳转
		$this->user_m->loggedin() == FALSE || redirect($dashboard);

		// 取得登陆判断规则
		$rules = $this->user_m->rules;
		// 设置登陆数据表单验证
		$this->form_validation->set_rules($rules);

		// 表单通过验证
		if ($this->form_validation->run() == TRUE) {
			// 执行user_m的login函数
			if ($this->user_m->login() == TRUE) {
				// 登陆后跳转
				redirect($dashboard);
			}
			// 
			else {
				// 设置闪出数据，session类
				$this->session->set_flashdata('error', '账号密码不对！');
				redirect('admin/user/login', 'refresh');
			}
		}
		// 加载视图文件
		$this->load->view('admin/login', $this->data);
	}

	// 退出函数
	public function logout()
	{
		// 执行退出函数
		$this->user_m->logout();
		// 自动跳转
		redirect('admin/user/login');
	}
}