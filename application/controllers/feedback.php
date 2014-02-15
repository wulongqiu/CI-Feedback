<?php
class Feedback extends Feedback_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('feedback_m');

	}

	public function index() {

		$this->data['feedbacks'] = $this->feedback_m->get();
		$this->load->view('feedback', $this->data);
	}

	public function pub($id = NULL) {

		$this->data['feedback'] = $this->feedback_m->get();

		$rules = $this->feedback_m->rules;
		$this->form_validation->set_rules($rules);


		//处理表单的提交
		if ($this->form_validation->run() == TRUE) {
			$data = $this->feedback_m->array_from_post(array(
				'name',
				'title',
				'content',
				'pubdate',
				'ip',
			));
			$this->feedback_m->save($data, $id);
			redirect('');
		}

		$this->load->view('feedback', $this->data);
	}

}