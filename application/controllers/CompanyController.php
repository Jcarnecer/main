<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function register() {
		$user = parent::current_user();

		if (!$user) {
			if ($this->input->server("REQUEST_METHOD") === "POST") {
				$company_details = [
					"id" => $this->utilities->create_random_string(),
					"name" => $this->input->post('name'),
					"created_at" => date("Y-m-d H:i:s")
				];

				$user_details = [
					'id' => $this->utilities->create_random_string(),
					'company_id' => $company_details['id'],
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email_address' => $this->input->post('email_address'),
					'password' => $this->input->post('password'),
					'role' => "1"
				];

				$this->form_validation->set_rules("name", "company name", "trim|required|min_length[5]|max_length[20]|unique_company_name");
				$this->form_validation->set_rules("first_name", "first name", "trim|required");
				$this->form_validation->set_rules("last_name", "last name", "trim|required");
				$this->form_validation->set_rules("email_address", "e-mail address", "trim|required|valid_email|unique_email_address");
				$this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|max_length[20]");

				if ($this->form_validation->run()) {
					$user_details['password'] = $this->encryption->encrypt($user_details['password']);
					$this->company->insert($company_details);
					$this->user->insert($user_details);
					copy("upload/avatar/default.png", "upload/avatar/{$user_details['id']}.png");
					return redirect("users/login");
				}
			}
			return parent::guest_page("company/register");
		}
		return redirect("/");
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

		return print json_encode($users, JSON_PRETTY_PRINT);
	}

	public function roles() {
		header("Content-Type: application/json");
		$user = $this->authenticate->current_user();

		if ($user && in_array("ROLE_LIST", $user->permissions)) {

			$roles = [];
			foreach ($this->db->get_where("roles", ["company_id" => $user->company_id])->result_array() as $role) {
				$role["user_count"] = $this->db->get_where("users", ["role" => $role["id"]])->num_rows();
				array_push($roles, $role);
			}
			
			return print json_encode($roles, JSON_PRETTY_PRINT);
		}
		return print json_encode(["error" => "Authentication error"], JSON_PRETTY_PRINT);
	}
}
