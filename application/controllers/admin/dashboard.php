<?php
class Dashboard extends Admin_Controller {

	public function __construck(){
		parent::__construck();
	}

	public function index() {
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('admin/_layout_main', $this->data);
	}

}