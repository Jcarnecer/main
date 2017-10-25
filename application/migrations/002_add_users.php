<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Add_Users extends CI_Migration {


	public function up() {

		$this->dbforge->add_field([

			'id'			  => [

				'type'           => 'VARCHAR',
				'constraint'	 => 11
			],
			'company_id'	  => [

				'type'           => 'VARCHAR',
				'constraint'	 => 11
			],
			'email_address'	  => [

				'type'           => 'VARCHAR',
				'constraint'	 => 255
			],
			'password'	  	  => [

				'type'           => 'VARCHAR',
				'constraint'	 => 255
			],
			'first_name'	  => [

				'type'           => 'VARCHAR',
				'constraint'	 => 200,
			],
			'last_name'		  => [

				'type'			 => 'VARCHAR',
				'constraint'	 => 200
			],
			'role'			  => [

				'type'			 => 'TINYINT',
				'constraint'	 => 1
			],
			
			'CONSTRAINT `users_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('company_id');
		$this->dbforge->create_table('users');
	}


	public function down() {
		$this->dbforge->drop_table('users', TRUE);
	}

}