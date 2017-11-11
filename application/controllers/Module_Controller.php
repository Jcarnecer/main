<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_Controller extends Base_Controller {

	public function __construct() {
		parent::__construct();
	}

	
	public function all() {
		return print json_encode(
			$this->db->get_where("main_modules")->result_array()
		);
	}


	public function seed() {
		$this->db->insert("main_modules", [
			"id" => $this->utilities->create_random_string(),
			"name" => "Chat",
			"url" => "chat.payakapps.com" 
		]);

		$this->db->insert("main_modules", [
			"id" => $this->utilities->create_random_string(),
			"name" => "Task",
			"url" => "task.payakapps.com" 
		]);
	}
}
