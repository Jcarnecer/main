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
				copy("upload/avatar/default.png", "upload/avatar/{$user_details['id']}.png");
				return redirect("users/login");
			}
		}

		return $this->load->view('company/register', ['errors' => $errors]);
	}


	public function users($company_id) {
		header("Content-type: application/json");

		$users = 
			$this->db->select("users.id, users.first_name, users.last_name, users.email_address, roles.name as role")
			->from("users")
			->join("roles", "roles.id = users.role")
			->where(["users.company_id" => $company_id])
			->get()
			->result_array();

		return print json_encode(
			$users,
			JSON_PRETTY_PRINT
		);
	}

	public function roles() {
		header("Content-Type: application/json");
		$user = $this->authenticate->current_user();

		if ($user && 
			($user->permissions & $this->permission->ROLE_LIST) === $this->permission->ROLE_LIST) {

			$roles = [];
			foreach ($this->db->get_where("roles", ["company_id" => $user->company_id])->result_array() as $role) {
				$role["user_count"] = $this->db->get_where("users", ["role" => $role["id"]])->num_rows();
				array_push($roles, $role);
			}
			
			return print json_encode($roles, JSON_PRETTY_PRINT);
		}
		return print json_encode(["error" => "Authentication error"], JSON_PRETTY_PRINT);
	}

	public function subscriptions($company_id) {
		return print json_encode(
			$this->db->get("main_modules")->result_array()
		);
	}
}
