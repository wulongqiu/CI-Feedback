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
		if($id) {
			$this->data['feedback'] = $this->feedback_m->get($id);
			count($this->data['feedback']) || $this->data['errors'][] ='没有反馈信息';
		}
		else {
			$this->data['feedback'] = $this->feedback_m->get_new();
		}

		$rules = $this->feedback_m->rules;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE) {
			$data = $this->feedback_m->array_from_post(array(
				'name',
				'title',
				'content',
				'pubdate',
				'ip'
			));
			$this->feedback_m->save($data, $id);
			redirect('admin/feedback');
		}

		$this->data['subview'] = 'admin/feedback-edit';
		$this->load->view('admin/_layout_main', $this->data);

	}
	public function delete($id) {
		$this->feedback_m->delete($id);
		redirect('admin/feedback');
	}

}