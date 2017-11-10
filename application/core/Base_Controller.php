<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}


	public function main_page($view, $data=[], $title="Payakapps") {
		$user = $this->authenticate->current_user();

		$this->load->view("partials/header", ["title" => $title]);
		$this->load->view("partials/sidebar", ["user" => $user]);
		$this->load->view($view, $data);
		$this->load->view("partials/footer");
	}


	public function login_page() {
		$this->load->view("partials/header");
		$this->load->view("users/login");
		$this->load->view("partials/footer");
	}


	public function guest_page($view, $data=[], $title="Payakapps") {
		$this->load->view("partials/header", ["title" => $title]);
		$this->load->view($view, $data);
		$this->load->view("partials/footer");
	}
}
