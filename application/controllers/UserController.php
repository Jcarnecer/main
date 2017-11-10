<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends Base_Controller {

	public function __construct() {
		parent::__construct();
	}


	public function index() {
		$user = $this->authenticate->current_user();

		if ($user && 
			($user->permissions & $this->permission->USER_LIST) === $this->permission->USER_LIST) {
			return parent::main_page("users/index", [
				"company_id" => $user->company_id,
				"users" => $this->user->get_users(['company_id' => $user->company_id])
			]);
		}

		return redirect("/");
	}

	public function create() {
		$user = $this->session->userdata("user");

		if ($user &&
			($user->permissions & $this->permission->USER_CREATE) === $this->permission->USER_CREATE) {

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
					copy("upload/avatar/default.png", "upload/avatar/{$user_details['id']}.png");
					# TODO: Send e-mail for user credentials
					return redirect('users/create');
				}
			}

			return parent::main_page("users/create", [
				'roles' => $this->db->get_where("roles", ["company_id" => $user->company_id])->result_array(), 
				'errors' => $errors
			]);
		}
		
		return redirect("/");
	}


	public function profile() {
		return parent::main_page('users/profile');
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
		$user_id = $this->session->user->id;
		
		if($this->input->server("REQUEST_METHOD") === "POST") {
			$data = [
				"first_name" => $this->input->post("first_name"),
				"last_name" => $this->input->post("last_name")
			];

			$this->user->update($user_id, $data);
			$user = $this->db->get_where("users", ["id" => $user_id])->row();
			unset($user->password);
			$this->session->set_userdata("user", $user);
		}

		redirect("users/profile");
	}

	public function update_avatar() {
		header("Cache-Control: no-cache, must-revalidate");

		$config['upload_path'] = "./upload/avatar/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 800;
        $config['max_height'] = 800;
        $config['file_name'] = "{$this->session->user->id}.png";
        $config["overwrite"] = TRUE;

		$this->load->library("upload", $config);

		if (!$this->upload->do_upload("avatar")) {
			return print json_encode($this->upload->display_errors());
		}
		return redirect("users/profile");
	}

	public function change_password() {
		$user_id = $this->session->user->id;

		if($this->input->server("REQUEST_METHOD") === "POST") {

			$this->form_validation->set_rules([
				[
					"field" => "password", 
					"label" => "password",
					"rules" => [
						"required", 
						[
							"password_check",
							function($password) {
								$user_id = $this->session->user->id;
								$user = $this->db->get_where("users", ["id" => $user_id])->row_array();

								return $this->encryption->decrypt($user["password"]) === $password;
							}
						]
					]

				],
				[
					"field" => "new_password", 
					"label" => "new password",
					"rules" => "required|differs[password]"
				],
				[
					"field" => "confirm_password", 
					"label" => "confirm password",
					"rules" => "required|matches[new_password]"
				]
			]);
			$this->form_validation->set_message("password_check", "The password field is incorrect");

			if ($this->form_validation->run()) {
				$this->user->update(
					$user_id, 
					['password' => $this->encryption->encrypt($this->input->post("new_password"))]
				);
				redirect('users/profile');
			}
			
		}
		return parent::main_page("users/change-password");
	}
}
	