<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
		parent::__construct();
	}

	public function login() {
		$data['error'] = '';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$user = $this->user->authenticate_user($username, $password);

			if (isset($user)) {
				$this->authenticate->login_user($user);
				redirect('/');
			}

			$data['error'] = "Invalid credentials";
		}

		$this->load->view('users/login', $data);
	}


	public function logout() {
		$this->authenticate->logout_user();
		redirect('users/login');
	}

	public function current_user() {
		return print json_encode($this->authenticate->current_user());
	}
}
