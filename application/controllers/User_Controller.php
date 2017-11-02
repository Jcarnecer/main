<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Controller extends Base_Controller {

	public function __construct() {
		parent::__construct();
	}


	public function all() {
		$this->authenticate->is_login();
		$user = $this->authenticate->current_user();

		return parent::main_page("users/index", [
			'company_id' => $user->company_id,
			'users' => $this->user->get_users(['company_id' => $user->company_id])
		]);
	}


	public function create() {
		$this->authenticate->is_login();
		$user = $this->authenticate->current_user();

		$errors = [];
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$user_details = [
				'id' => $this->utilities->create_random_string(),
				'company_id' => $user->company_id,
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'email_address' => $_POST['email_address'],
				'password' => $_POST['password'],
				'role' => $_POST['role']
			];

			$errors = $this->utilities->validate_user_details($user_details);

			if (count($errors) == 0) {
				$user_details['password'] = $this->encryption->encrypt($user_details['password']);
				$this->user->insert_user($user_details);
				copy("assets/img/avatar/default.png", "assets/img/avatar/{$user_details['id']}.png");
				# TODO: Send e-mail for user credentials
				return redirect('users/create');
			}
		}

		return parent::main_page("users/create", ['errors' => $errors]);
	}


	public function profile() {
		$this->authenticate->is_login();
		$user = $this->authenticate->current_user();

		return $this->load->view('users/profile');
	}


	public function login() {
		$this->authenticate->is_guest();

		$error = null;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email_address = $_POST['email_address'];
			$password = $_POST['password'];

			if ($this->user->authenticate_user($email_address, $password)) {
				return redirect('/');
			}
			
			$error = 'Invalid login credentials';
		}
		return $this->load->view('users/login', ['error' => $error]);
	}


	public function logout() {
		$this->authenticate->logout_user();
		redirect('/');
	}


	public function update() {
		$this->load->helper(array('form'));
		$this->load->view('update');
	}


	public function update_user() {
		$user_id = $this->session->user->id;
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = [
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name']
			];

			$this->user->update($user_id, $data);

			redirect('users/profile');
		}
	}


	public function update_password() {
		$user_id = $this->session->user->id;

		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			$this->user->update($user_id, ['password' => $this->encryption->encrypt($_POST['password'])]);

			redirect('users/profile');
		}
	}
}
