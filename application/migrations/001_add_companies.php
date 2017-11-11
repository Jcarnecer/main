<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Add_Companies extends CI_Migration {


	public function up() {
		$this->sessions();
		$this->dbforge->add_field([
			'id'              => [

				'type'           => 'VARCHAR',
				'constraint'	 => 11
			],
			'name'			  => [

				'type'           => 'VARCHAR',
				'constraint'	 => 20,
				'null'			 => TRUE
			]
		]);

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('companies');
	}


	public function down() {
		$this->dbforge->drop_table('companies', TRUE);
		$this->dbforge->drop_table('ci_sessions', TRUE);
	}


	public function sessions() {
		/*
			CREATE TABLE `ci_sessions` (
			  `id` varchar(128) NOT NULL,
			  `ip_address` varchar(45) NOT NULL,
			  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
			  `data` blob NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		 */
		$this->dbforge->add_field([
			"id" => [
				"type" => "VARCHAR",
				"constraint" => 128
			],
			"ip_address" => [
				"type" => "VARCHAR",
				"constraint" => 45
			],
			"timestamp" => [
				"type" => "INT",
				"constraint" => 10,
				"default" =>  "0"
			],
			"data" => [
				"type" => "BLOB"
			]
		]);	
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('ci_sessions');
	}

}