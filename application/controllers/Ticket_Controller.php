<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_Controller extends BaseController {

	public function __construct() {
		parent::__construct();
	}


	public function index() {
		parent::main_page("tickets/index");
	}


	public function all() {
		return print json_encode(
			$this->db->get("main_tickets")
				->result_array()
		);
	}


	public function create() {
		$user = $this->authenticate->current_user();
		
		if ($this->input->server("REQUEST_METHOD") === "POST") {
			$ticket = [
				"id" => $this->utilities->create_random_string(),
				"title" => $this->input->post("title"),
				"type" => $this->input->post("type"),
				"status" => 1,
				"description" => $this->input->post("description"),
				"created_by" => $user->id,
				"created_at" => time()
			];

			$this->db->insert("main_tickets", $ticket);
		}

		return parent::main_page("tickets/create");
	}


	public function show($ticket_id) {
		$user = $this->authenticate->current_user();
		$ticket = $this->db->get_where("main_tickets", ["id" => $ticket_id, "created_by" => $user->id])->row_array();

		if ($ticket) {
			return parent::main_page("tickets/show", ["ticket" => $ticket]);
		}
		return redirect("tickets");
	}
}
