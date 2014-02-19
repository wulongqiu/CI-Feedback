<?php
// 后台控制台控制文件，负责调度数据库和模板显示
// 类名必须和文件名一样，而且第一个字母大写，继承自Admin_Controller
class Dashboard extends Admin_Controller {

// 构造函数，初始化
	public function __construck(){
		parent::__construck();
	}
// 默认的函数的，index，
	public function index() {
        // 指定index的subview视图
		$this->data['subview'] = 'admin/dashboard';
        // 载入模板文件并调用数据
		$this->load->view('admin/_layout_main', $this->data);
	}

}