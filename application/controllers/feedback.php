<?php
// feedback前台控制器文件
class Feedback extends Feedback_Controller {

	// 构造函数，初始化
	public function __construct(){
		parent::__construct();
	}

	// 默认控制器
	public function index() {
		// 读取数据
		$this->data['feedbacks'] = $this->feedback_m->get();
		// 载入视图文件，并传递数据
		$this->load->view('feedback', $this->data);
	}

	// 发布控制器
	public function pub() {

		// 
		$this->data['feedbacks'] = $this->feedback_m->get();

		// 赋予验证规则
		$rules = $this->feedback_m->rules;
		// 设置验证规则
		$this->form_validation->set_rules($rules);


		//处理表单的提交
		if ($this->form_validation->run() == TRUE) {
			// 存储数据
			$data = $this->feedback_m->array_from_post(array(
				'name',
				'title',
				'content',
				'pubdate',
				'ip',
			));
			// 保存数据
			$this->feedback_m->save($data);
			redirect('');
		}
		// 指定视图
		$this->load->view('feedback', $this->data);
	}


}