<?php
// 后台feedback控制文件，负责调度工作，协调Models文件和view模板文件之间的关系
// feedback控制器文件，类首字母大写，与文件名相同，承继Admin_Controller
class Feedback extends Admin_Controller {

// 构造函数
	public function __construct()
	{
		parent::__construct();
	}
// 默认管理界面函数
	public function index() {
		// 使用MY_Model核心模型中get函数取得数据，存入feedbacks数组，feedback_m模型文件中指定了表名feedback
		$this->data['feedbacks'] = $this->feedback_m->get();

		// 指定模板的子视图
		$this->data['subview'] = 'admin/feedback';
		// 载入模板并调用数据
		$this->load->view('admin/_layout_main', $this->data);
	}
	// 添加和编辑反馈函数
	public function edit($id = NULL) {
		// 如果接受到从view视图文件中传递过来ID，执行下边的函数，读取出来数据
		if($id) {
			// 读取数据
			$this->data['feedback'] = $this->feedback_m->get($id);
			// 错误判断#############
			count($this->data['feedback']) || $this->data['errors'][] ='没有反馈信息';
		}
		// 如果没有收到传递ID，就执行get_new()函数添加一个新的反馈
		else {
			$this->data['feedback'] = $this->feedback_m->get_new();
		}

		// 访问feedback_m文件中feedback_m类的rules成员，并传递给$rules.用做数据提交的表单验证
		$rules = $this->feedback_m->rules;
		// CI系统表单验证类，设置验证规则为$rules
		$this->form_validation->set_rules($rules);

		// 通过验证规则
		if($this->form_validation->run() == TRUE) {
			// 使用MY_Model的array_from_post函数保存数据到$data数组
			$data = $this->feedback_m->array_from_post(array(
				'name',
				'title',
				'content',
				'pubdate',
				'ip'
			));
			// 数据执行MY_Model的save函数操作，如果是编辑的反馈，sava会执行update操作
			$this->feedback_m->save($data, $id);
			// 数据保存后跳转到反馈管理首页
			redirect('admin/feedback');
		}

		// 指定edit控制器的显示子视图
		$this->data['subview'] = 'admin/feedback-edit';
		// 指定父模板，并传递数据
		$this->load->view('admin/_layout_main', $this->data);

	}

	// 调度执行删除操作，使用MY_Model的delete函数。view视图文件view/admin/feedback.php传递ID
	public function delete($id) {
		// 执行删除函数
		$this->feedback_m->delete($id);
		// 删除后跳转
		redirect('admin/feedback');
	}

}