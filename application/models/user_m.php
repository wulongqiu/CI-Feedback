<?php
class User_m extends MY_Model {

	protected $_table_name = 'user';

	public $rules = array(
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|xxs_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required'
		)
	);

	public $rules_admin = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm',
			'label' => 'Confirm password',
			'rules' => 'trim|matches[password]'
		),
	);

	// 构造函数，初始化
	function __construct() {
		parent::__construct();
	}

	// 用户登陆
	public function login ()
	{
		// 验证数据
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password')),
		), TRUE);
		// 验证成功，保存session
		if (count($user)) {
			$data = array(
				'name' => $user->name,
				'email' => $user->email,
				'id' => $user->id,
				'loggedin' => TRUE,
			);
			$this->session->set_userdata($data);
		}
	}

	// 退出，销毁session
	public function logout() {
		$this->session->sess_destroy();
	}

	public function loggedin () {
		return (bool) $this->session->userdata('loggedin');
	}

	// 添加新用户
	public function get_new() {
		$user = new stdClass();
		$user->name = '';
		$user->email = '';
		$user->password = '';
		return $user;
	}

	// hash加密函数
	public function hash($string) {
		// 采用sha512加密方式，加密密码和密钥字符串
		return hash('sha512', $string . config_item('encryption_key'));
	}


}