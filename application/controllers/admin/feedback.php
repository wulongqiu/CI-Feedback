<?php
class Feedback extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('feedback_m');
	}

	public function index() {
		$this->data['feedbacks'] = $this->feedback_m->get();

		$this->data['subview'] = 'admin/feedback';
		$this->load->view('admin/_layout_main', $this->data);
	}
	public function edit($id = NULL) {

		}
	}
	public function delete() {
		echo "这里是反馈管理的删除操作";
	}

}