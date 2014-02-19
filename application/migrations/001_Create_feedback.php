<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// 迁移类，文件名和类名
class Migration_Create_feedback extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '32',
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'pubdate' => array(
				'type' => 'DATETIME',
			),
			'ip' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),

			'content' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
		));

		// 指定主键
		$this->dbforge->add_key('id');
		// 指定要创建的表名
		$this->dbforge->create_table('feedback');
	}

	public function down()
	{
		$this->dbforge->drop_table('feedback');
	}
}