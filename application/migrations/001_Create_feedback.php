<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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

		$this->dbforge->add_key('id');
		$this->dbforge->create_table('feedback');
	}

	public function down()
	{
		$this->dbforge->drop_table('feedback');
	}
}