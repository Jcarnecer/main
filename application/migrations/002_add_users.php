<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Add_Users extends CI_Migration {


	public function up() {
		$this->roles();
		$this->permissions();
		$this->roles_permissions();
		$this->users();
	}


	public function down() {
		$this->dbforge->drop_table("users", TRUE);
		$this->dbforge->drop_table("roles_permissions", TRUE);
		$this->dbforge->drop_table("permissions", TRUE);
		$this->dbforge->drop_table("roles", TRUE);
	}

	public function roles() {
		$this->dbforge->add_field([
			"id" => [
				"type" => "VARCHAR",
				"constraint" => 11
			],
			"company_id" => [
				"type" => "VARCHAR",
				"constraint" => 11,
				"null" => true
			],
			"name" => [
				"type" => "VARCHAR",
				"constraint" => 20
			],
			"created_at" => [
				"type" => "DATETIME"
			],
			'CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key("id", TRUE);
		$this->dbforge->add_key("company_id");
		$this->dbforge->create_table("roles", TRUE);
	}

	public function permissions() {
		$this->dbforge->add_field([
			"id" => [
				"type" => "VARCHAR",
				"constraint" => "11"
			],
			"name" => [
				"type" => "VARCHAR",
				"constraint" => "50"
			],
			"description" => [
				"type" => "TEXT"
			]
		]);

		$this->dbforge->add_key("id", TRUE);
		$this->dbforge->create_table("permissions", TRUE);
	}

	public function roles_permissions() {
		$this->dbforge->add_field([
			"role_id" => [
				"type" => "VARCHAR",
				"constraint" => "11"
			],
			"permission_id" => [
				"type" => "VARCHAR",
				"constraint" => "11"
			],
			'CONSTRAINT `roles_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
			'CONSTRAINT `roles_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key("role_id");
		$this->dbforge->add_key("permission_id");
		$this->dbforge->create_table("roles_permissions", TRUE);
	}

	public function users() {
		$this->dbforge->add_field([
			"id" => [
				"type" => "VARCHAR",
				"constraint" => 11
			],
			"company_id" => [
				"type" => "VARCHAR",
				"constraint" => 11
			],
			"email_address" => [
				"type" => "VARCHAR",
				"constraint" => 255
			],
			"password" => [
				"type" => "VARCHAR",
				"constraint" => 255
			],
			"first_name" => [
				"type" => "VARCHAR",
				"constraint" => 200,
			],
			"last_name" => [
				"type" => "VARCHAR",
				"constraint" => 200
			],
			"role" => [
				"type" => 'VARCHAR',
				"constraint" => 11
			],
			"created_at" => [
				"type" => "DATETIME"
			],
			"last_login_at" => [
				"type" => "DATETIME",
				"null" => true
			],
			"avatar_url" => [
				"type" => "VARCHAR",
				"constraint" => "255"
			],
			"uuid" => [
				"type" 	=> "VARCHAR",
				"constraint" => 11,
				"null" => true
			],
			'CONSTRAINT `users_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
			'CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('company_id');
		$this->dbforge->create_table('users', TRUE);
	}
}