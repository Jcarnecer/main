<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}


	public function main_page($view, $data=[], $title="Payakapps") {
		$this->load->view("partials/header", ["title" => $title]);
		$this->load->view("partials/sidebar");
		$this->load->view($view, $data);
		$this->load->view("partials/footer");
	}


	public function login_page($route) {
		
	}
}
