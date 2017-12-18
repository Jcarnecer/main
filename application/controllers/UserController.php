<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function login() {
		$user = parent::current_user();
		if (!$user) {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$email_address = $_POST['email_address'];
				$password = $_POST['password'];

				if ($this->user->authenticate_user($email_address, $password)) {
					return redirect('/');
				}
            }
            return parent::guest_page("users/login");         
       	}
		return redirect("/");
	}

	public function logout() {
		$this->session->unset_userdata("user");
		return redirect("/");
	}

	public function index() {
		$user = parent::current_user();
		if ($user && in_array("USER_LIST", $user->permissions)) {
			return parent::main_page("users/index");
		}
		return redirect("/");
	}

	public function create() {
		$user = parent::current_user();
		if ($user && in_array("USER_CREATE", $user->permissions)) {
			if ($this->input->server('REQUEST_METHOD') === "POST") {
				$this->form_validation->set_rules("first_name", "first name", "trim|required");
				$this->form_validation->set_rules("last_name", "last name", "trim|required");
				$this->form_validation->set_rules("email_address", "e-mail address", "trim|required|valid_email|unique_email_address");
				$this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|max_length[20]");
				$this->form_validation->set_rules("role", "role", "trim|required");

				if ($this->form_validation->run()) {
					$user_details = [
						'id' => $this->utilities->create_random_string(),
						'company_id' => $user->company_id,
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'email_address' => $this->input->post('email_address'),
						'password' => $this->encryption->encrypt($this->input->post('password')),
						'role' => $this->input->post('role'),
						'created_at' => date("Y-m-d H:i:s"),
						'last_login_at' => null,
						'avatar_url' => base_url("upload/avatar/default.png")
					];
					$this->user->insert($user_details);

					// TODO: Send e-mail for user credentials

					return redirect("users/create");
				}
			}

			return parent::main_page("users/create", [
				"roles" =>  $this->role->get_many_by(["company_id" => $user->company_id])
			]);
		}

		return redirect("/");
	}

	public function update($id) {
		$current_user = parent::current_user();
		
		if ($current_user and in_array("USER_UPDATE", $current_user->permissions)) {
			$user = $this->user->get($id);

			if (!$user) {
				return show_error(404);
			}

			if ($this->input->server("REQUEST_METHOD") === "POST") {
				$this->form_validation->set_rules("first_name", "first name", "trim|required");
				$this->form_validation->set_rules("last_name", "last name", "trim|required");
				$this->form_validation->set_rules("role", "role", "trim|required");
				
				if ($user["email_address"] === $this->input->post("email_address")) {
					$this->form_validation->set_rules("email_address", "e-mail address", "trim|required|valid_email");
				} else {
					$this->form_validation->set_rules("email_address", "e-mail address", "trim|required|valid_email|is_unique[users.email_address]");
				}

				if ($this->form_validation->run()) {
					$user_details = [
						"first_name" => $this->input->post('first_name'),
						"last_name" => $this->input->post('last_name'),
						"email_address" => $this->input->post('email_address'),
						"role" => $this->input->post('role')
					];

					$this->user->update($id, $user_details);
				}
			}

			return parent::main_page("users/update", [
				"user" => $user, 
				"roles" =>  $this->role->get_many_by(["company_id" => $current_user->company_id])
			]);
		}

		return redirect("/");
	}

	public function profile() {
		return parent::main_page('users/profile');
	}

	public function update_profile() {
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
		$current_user = parent::current_user();
		header("Cache-Control: no-cache, must-revalidate");

		$config['upload_path'] = "./upload/avatar/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 800;
        $config['max_height'] = 800;
        $config['file_name'] = "{$current_user->id}.png";
        $config["overwrite"] = TRUE;

		$this->upload->initialize($config);

		if (!$this->upload->do_upload("avatar")) {
			return print json_encode($this->upload->display_errors());
		} else {
			# TODO
			$this->session->user->avatar_url = base_url("upload/avatar/". $config["file_name"]);
			$this->user->update($current_user->id, [
				"avatar_url" => base_url("upload/avatar/" . $config["file_name"])
			]);
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
	