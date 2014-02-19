<?php
// 迁移文件，数据库管理
class Migration extends CI_Controller {
	// 构造函数
	public function __construct ()
	{
		parent::__construct();
	}

	// 默认控制器
	public function index ()
	{
		// 载入migration库文件
		$this->load->library('migration');
		// 如果没有正常的执行迁移操作
		if (! $this->migration->current()) {
			// 输出错误提示
			show_error($this->migration->error_string());
		}
		// 输出成功提示
		else {
			echo 'Migration worked!';
		}

	}
}