<?php
class User extends Feedback_Controller {

	public function __construct ()
	{
		parent::__construct();
	}

	public function login()
	{
		$this->load->view('login', $this->data);
	}
}