<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}


	public function register() {
		$errors = [];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$company_details = [
				'id' => $this->utilities->create_random_string(),
				'name' => $_POST['name'] 
			];

			$user_details = [
				'id' => $this->utilities->create_random_string(),
				'company_id' => $company_details['id'],
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'email_address' => $_POST['email_address'],
				'password' => $_POST['password'],
				'role' => 1
			];

			$errors['company'] = $this->utilities->validate_company_details($company_details);
			$errors['user'] = $this->utilities->validate_user_details($user_details);

			if (!count($errors['company']) && !count($errors['user'])) {
				$user_details['password'] = $this->encryption->encrypt($user_details['password']);
				$this->company->insert_company($company_details);
				$this->user->insert_user($user_details);
				return redirect("users/login");
			}
		}

		return $this->load->view('company/register', ['errors' => $errors]);
	}


	public function users($company_id) {
		return print json_encode($this->db->get_where('users', ['company_id' => $company_id])->result_array());
	}
}
