<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
	}


	public function show_login()
	{
		if (!parent::current_user()) {
			return parent::guest_page("users/login");
		} else {
			return redirect("/");
		}
	}


	public function login() {
		if (!parent::current_user()) {
			$email_address = $_POST['email_address'];
			$password = $_POST['password'];

			if (!$this->user->authenticate_user($email_address, $password)) {
				return parent::guest_page("users/login");
			}
		}
		return redirect("/");
	}


	public function forgot() {
		return parent::guest_page("users/forgot-password");
	}


	public function logout()
	{
		$this->session->unset_userdata("user");
		return redirect("/");
	}


	public function index()
	{
		if (parent::can_user("USER_LIST")) {
			return parent::main_page("users/index");
		} else {
			return redirect("/");
		}
	}


	public function show_create()
	{
		if (parent::can_user("USER_CREATE")) {
			$current_user = parent::current_user();
			return parent::main_page("users/create", [
				"roles" =>  $this->role->get_many_by(["company_id" => $current_user->company_id])
			]);
		} else {
			return redirect("/");
		}
	}


	public function create()
	{
		if (parent::can_user("USER_CREATE")) {
			$current_user = parent::current_user();

			$this->form_validation->set_rules("first_name", "first name", "trim|required");
			$this->form_validation->set_rules("last_name", "last name", "trim|required");
			$this->form_validation->set_rules("email_address", "e-mail address", "trim|required|valid_email|is_unique[users.email_address]");
			$this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|max_length[20]");
			$this->form_validation->set_rules("role", "role", "trim|required");

			if ($this->form_validation->run()) {
				$user = [
					'id' => $this->utilities->create_random_string(),
					'company_id' => $current_user->company_id,
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email_address' => $this->input->post('email_address'),
					'password' => $this->encryption->encrypt($this->input->post('password')),
					'role' => $this->input->post('role'),
					'created_at' => date("Y-m-d H:i:s"),
					'last_login_at' => null,
					'avatar_url' => DEFAULT_AVATAR_URL
				];
				$this->user->insert($user);
				return redirect("users/create");
			}
			return parent::main_page(
				"users/create", [
					"roles" =>  $this->role->get_many_by(["company_id" => $current_user->company_id])
				]
			);
		} else {
			return redirect("/");
		}
	}


	public function show_update($id)
	{
		if (parent::can_user("USER_UPDATE")) {
			$current_user = parent::current_user();
			$user = $this->user->get($id) ?? show_error(404);

			return parent::main_page(
				"users/update", [
					"user" => $user, 
					"roles" =>  $this->role->get_many_by(["company_id" => $current_user->company_id])
				]
			);
		} else {
			return redirect("/");
		}
	}


	public function update($id)
	{	
		if (parent::can_user("USER_UPDATE")) {
			$current_user = parent::current_user();
			$user = $this->user->get($id) ?? show_error(404);

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
				return redirect("users");
			}

			return parent::main_page(
				"users/update", [
					"user" => $user, 
					"roles" =>  $this->role->get_many_by(["company_id" => $current_user->company_id])
				]
			);
		} else {
			return redirect("/");
		}
	}


	public function profile()
	{
		if (parent::current_user()) {
			return parent::main_page('users/profile');
		} else {
			return redirect("/");
		}
	}


	public function update_profile()
	{
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


	public function update_avatar()
	{
		$current_user = parent::current_user();
		$this->aws->upload_avatar($current_user->id);
		return redirect("users/profile");
	}


	public function change_password()
	{
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
	