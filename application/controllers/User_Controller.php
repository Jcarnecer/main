<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function login($company_id) {
		$company = $this->company->get_company(['id' => $company_id]);

		if ($company == null) {
			return redirect('/');
		}

		$error = null;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email_address = $_POST['email_address'];
			$password = $_POST['password'];

			$user = (array) $this->user->authenticate_user($email_address, $password, $company->id);
			if ($user != null) {
				$this->authenticate->login_user($user);
				return redirect('/');
			}

			$error = 'Invalid login credentials';
		}
		return $this->load->view('users/login', ['company' => $company, 'error' => $error]);
	}


	public function logout() {
		$this->authenticate->logout_user();
		redirect('/');
	}
}
