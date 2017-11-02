<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Add_Users extends CI_Migration {


	public function up() {
		$this->users();
		$this->tickets();
	}


	public function down() {
		$this->dbforge->drop_table("main_tickets", TRUE);
		$this->dbforge->drop_table('users', TRUE);
	}


	public function users() {
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
			
			'CONSTRAINT `users_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('company_id');
		$this->dbforge->create_table('users');
	}

	public function tickets() {
		$this->dbforge->add_field([
			"id" => [
				"type" => "VARCHAR",
				"constraint" => 11
			],
			"title" => [
				"type" => "VARCHAR",
				"constraint" => 20
			],
			"description" => [
				"type" => "TEXT"
			],
			"type" => [
				"type" => "TINYINT",
				"constraint" => 1
			],
			"status" => [
				"type" => "TINYINT",
				"constraint" => 1
			],
			"created_by" => [
				"type" => "VARCHAR",
				"constraint" => 11
			],
			"created_at" => [
				"type" => "VARCHAR",
				"constraint" => 30
			],
			'CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key("created_by");
		$this->dbforge->create_table("main_tickets");
	}
}