<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$user = $this->authenticate->current_user();

		if ($user) {
			return $this->load->view('dashboard');	
		}
		
		return $this->load->view('welcome');
	}
}
