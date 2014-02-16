<?php
class Feedback extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$this->load->view('admin/feedback', $this->data);
		echo "这里是反馈管理页面";
	}
	public function edit() {
		echo "这里是反馈管理的编辑页面";
	}
	public function delete() {
		echo "这里是反馈管理的删除操作";
	}

}