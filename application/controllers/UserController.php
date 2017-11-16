<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends BaseController {

	public function __construct() {
		parent::__construct();
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
			if ($this->input->server("REQUEST_METHOD") === "POST") {
				$user_details = [
					"id" => $this->utilities->create_random_string(),
					"company_id" => $user->company_id,
					"first_name" => $this->input->post("first_name"),
					"last_name" => $this->input->post('last_name'),
					"email_address" => $this->input->post('email_address'),
					"password" => $this->input->post('password'),
					"role" => $this->input->post('role')
				];

				$this->form_validation->set_rules("first_name", "first name", "trim|required|alpha_numeric_spaces");
				$this->form_validation->set_rules("last_name", "last name", "trim|required|alpha_numeric_spaces");
				$this->form_validation->set_rules("email_address", "e-mail address", "trim|required|valid_email");
				$this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|max_length[20]");
				$this->form_validation->set_rules("role", "role", "trim|required");

				if ($this->form_validation->run()) {
					$user_details['password'] = $this->encryption->encrypt($user_details['password']);
					$user_details["created_at"] = date("Y-m-d H:i:s");
					$user_details["last_login_at"] = date("Y-m-d H:i:s");
					$user_details["avatar_url"] = "http://localhost/main/upload/avatar/default.png";

					$this->user->insert($user_details);
					# TODO: Send e-mail for user credentials
					return redirect("users/create");
				}
			}

			return parent::main_page("users/create", 
				["roles" => $this->role->get_many_by(["company_id" => $user->company_id])]
			);
		}
		
		return redirect("/");
	}

	public function profile() {
		$user = parent::current_user();

		if ($user) {
			return parent::main_page('users/profile');
		}
		return redirect("/");
	}

	public function login() {
		$user = parent::current_user();

		if (!$user) {
			if ($this->input->server("REQUEST_METHOD") === "POST") {
				$email_address = $this->input->post('email_address');
				$password = $this->input->post('password');

				if ($this->user->authenticate_user($email_address, $password)) {
					return redirect("/");
				} else {
					$this->session->set_flashdata("message", "Invalid login credentials");
					return redirect("users/login");
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

	public function update() {
		$user = parent::current_user();
		
		if ($user) {
			if($this->input->server("REQUEST_METHOD") === "POST") {
				$data = [
					"first_name" => $this->input->post("first_name"),
					"last_name" => $this->input->post("last_name")
				];

				$this->user->update($user->id, $data);
				$user = $this->db->get_where("users", ["id" => $user->id])->row();
				unset($user->password);
				$this->session->set_userdata("user", $user);
			}	

			return redirect("users/profile");
		}
	}

	public function update_avatar() {
		$this->output->set_content_type("Cache-Control: no-store, no-cache, must-revalidate");

		$config['upload_path'] = "./upload/avatar/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 800;
        $config['max_height'] = 800;
        $config['file_name'] = "{$this->session->user->id}.png";
        $config["overwrite"] = TRUE;

		$this->upload->initialize($config);

		if (!$this->upload->do_upload("avatar")) {
			$this->session->set_flashdata("message", $this->upload->display_errors("", ""));
		}

		return redirect("users/profile");
	}

	public function change_password() {
		$user = $this->user->current_user();
		if ($user) {
			if($this->input->server("REQUEST_METHOD") === "POST") {
				$this->form_validation->set_rules("password", "password", "required|password_check");
				$this->form_validation->set_rules("new_password", "new password", "required|min_length[8]|max_length[20]|differs[password]");
				$this->form_validation->set_rules("confirm_password", "confirm password", "required|matches[new_password]");

				if ($this->form_validation->run()) {
					$this->user->update($user->id, 
						["password" => $this->encryption->encrypt($this->input->post("new_password"))]);
					$this->session->set_flashdata("message", "Successfully changed password");
					return redirect("users/profile/change-password");
				}
			}
			return parent::main_page("users/change-password");
		}
		return redirect("/");
	}
}