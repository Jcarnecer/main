<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Add_Chat extends CI_Migration {


	public function up() {
		$this->conversations();
		$this->messages();
		$this->participants();
	}


	public function down() {
		$this->dbforge->drop_table('chat_participants', TRUE);
		$this->dbforge->drop_table('chat_messages', TRUE);
		$this->dbforge->drop_table('chat_conversations', TRUE);		
	}


	public function conversations() {
		$this->dbforge->add_field([
			'id'			  => [

				'type'           => 'VARCHAR',
				'constraint'	 => '11'
			],
			'company_id'	  => [

				'type'           => 'VARCHAR',
				'constraint'	 => '11'
			],
			'name'			  => [

				'type'           => 'VARCHAR',
				'constraint'	 => '20',
				'null'			 => true
			],
			'type'			  => [

				'type'			 => 'TINYINT',
				'constraint'	 => 1
			],

			'CONSTRAINT `conversations_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON UPDATE CASCADE'
		]);

		$this->dbforge->add_key('id', true);
		$this->dbforge->add_key('company_id');
		$this->dbforge->create_table('chat_conversations', TRUE);
	}

	public function messages() {
		/*
			CREATE TABLE `chat_messages` (
			  `id` varchar(11) NOT NULL,
			  `conversation_id` varchar(11) NOT NULL,
			  `body` text NOT NULL,
			  `created_by` varchar(11) NOT NULL,
			  `created_at` varchar(30) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		 */
		$this->dbforge->add_field([
			"id" => [
				"type" => "VARCHAR",
				"constraint" => "11"
			],
			"conversation_id" => [
				"type" => "VARCHAR",
				"constraint" => "11"
			],
			"body" => [
				"type" => "TEXT"
			],
			"created_by" => [
				"type" => "VARCHAR",
				"constraint" => "11"
			],
			"created_at" => [
				"type" => "VARCHAR",
				"constraint" => "30"
			],
			"CONSTRAINT `chat_messages_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE"
		]);

		$this->dbforge->add_key("id", true);
		$this->dbforge->add_key("conversation_id");
		$this->dbforge->create_table("chat_messages", TRUE);
	}


	public function participants() {
		/*
			CREATE TABLE `chat_participants` (
			  `conversation_id` varchar(11) NOT NULL,
			  `user_id` varchar(11) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		 */
		$this->dbforge->add_field([
			"conversation_id" => [
				"type" => "VARCHAR",
				"constraint" => "11"
			],
			"user_id" => [
				"type" => "VARCHAR",
				"constraint" => "11"
			],
			"CONSTRAINT `chat_participants_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE",
 		 	"CONSTRAINT `chat_participants_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE"
		]);
		$this->dbforge->add_key("conversation_id");
		$this->dbforge->add_key("user_id");
		$this->dbforge->create_table("chat_participants", TRUE);
	}

}