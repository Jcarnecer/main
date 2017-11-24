<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Add_Companies extends CI_Migration {


	public function up() {
		$this->sessions();
		$this->companies();
	}

	public function down() {
		$this->dbforge->drop_table("companies", TRUE);
		$this->dbforge->drop_table("ci_sessions", TRUE);
	}

	public function sessions() {
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

	public function companies() {
		$this->dbforge->add_field([
			"id" => [
				"type" => "VARCHAR",
				"constraint" => 11
			],
			"name" => [
				"type" => "VARCHAR",
				"constraint" => 20
			],
			"created_at" => [
				"type" => "DATETIME",
			]
		]);

		$this->dbforge->add_key("id", TRUE);
		$this->dbforge->create_table("companies");
	}
}