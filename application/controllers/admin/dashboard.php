<?php
class Dashboard extends Admin_Controller {

	public function __construck(){
		parent::__construck();
	}

	public function index() {

		$this->load->view('admin/dashboard', $this->data);
	}

}