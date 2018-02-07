<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Activity_Logs extends CI_Migration {


	public function up() {
		$this->activity_logs();
	}

	public function down() {
		$this->dbforge->drop_table('activity_logs', TRUE);
	}

	public function activity_logs() {
		$this->dbforge->add_field([

			'id'			  => [
				'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
			],
			'user_id'	  => [

				'type'			 => 'VARCHAR',
				'constraint'	 => 11
			],
			'activity'		  => [

				'type'			 => 'VARCHAR',
				'constraint'	 => 50
			],
			'object_id'		  => [

				'type'			 => 'VARCHAR',
				'constraint'	 => 11
			],
			'object_type'	  => [

				'type'			 => 'VARCHAR',
				'constraint'	 => 30
			],
			'created_at'	  => [

				'type'			 => 'DATETIME'
			]
		]);

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('activity_logs', TRUE);
	}
}
