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

	function __construct() {
		parent::__construct();
	}

	public function login() {
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		), TRUE);

		if (count($user)) {
			$data = array(
				'name' => $user->name,
				'email' => $use->email,
				'id' => $user->id,
				'loggedin' => TRUE,
			);
			$this->session->set_userdata($data);
		}
	}

	public function logout() {
		$this->session->sess_destroy();
	}

	public function loggedin () {
		return (bool) $this->session->userdata('loggedin');
	}



}