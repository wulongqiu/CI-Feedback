<?php
// 创建Feedback_m控制器文件
class Feedback_m extends MY_Model {

	// 指定私有变量，表名
	protected $_table_name = 'feedback';
	// 打开时间变量，因为这个是在核心模型里，全站通用。
	protected $_timestamps = TRUE;
	// 同上
	protected $_ip = TRUE;

	// 定义表单提交验证规则
	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			// trim为PHP函数，修整函数，去年表单数据两端的空白
			'rules' => 'trim|required|max_length[32]|xss_clean'
		),
		'title' => array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'content' => array(
			'field' => 'content',
			'label' => 'Content',
			'rules' => 'trim|required'
		),

	);

//	   添加一个新的反馈
	public function get_new() {
		$feedback = new stdClass();
//		 使用id是为了在增加反馈时自动隐藏日期和IP选项
		$feedback->id = '';
		$feedback->name = '';
		$feedback->title = '';
		$feedback->content = '';

		return $feedback;
	}
}