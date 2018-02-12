<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Add_Companies extends CI_Migration {


	public function up() {
		$this->companies();
	}

	public function down() {
		$this->dbforge->drop_table("companies", TRUE);
	}

	public function companies() {
		$this->dbforge->add_field([
			"id" => [
				"type" => "VARCHAR",
				"constraint" => 11
			],
			"name" => [
				"type" => "VARCHAR",
				"constraint" => 50
			],
			"created_at" => [
				"type" => "DATETIME",
			]
		]);

		$this->dbforge->add_key("id", TRUE);
		$this->dbforge->create_table("companies", TRUE);
	}
}