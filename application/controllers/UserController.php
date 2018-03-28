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
			$this->form_validation->set_rules("email_address", "e-mail address", "trim|required|valid_email|is_unique[users.email_address]|callback_user_email_check");
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

	public function user_email_check($str) {

		$email = explode('@', $str);
		$root_email = $this->user->get_by(['company_id' => $this->session->user->company_id, 'role' => '1'])['email_address'];
		$domain = explode('@', $root_email);
		if($email[1] != $domain[1]) {
			$this->form_validation->set_message('user_email_check', 'Company domain must be used. ("' . $domain[1] . '")');
           	return FALSE;
		} else {
			return TRUE;
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


	public function reset_password($id) {

		$new_password = $this->utilities->create_random_string(8);
		$this->user->update(
			$id,
			['password' => $this->encryption->encrypt($new_password)]
		);
		if (parent::can_user("USER_UPDATE")) {
			$current_user = parent::current_user();
			$user = $this->user->get($id) ?? show_error(404);

			return parent::main_page(
				"users/update", [
					"user" => $user, 
					"roles" =>  $this->role->get_many_by(["company_id" => $current_user->company_id]),
					"new_password" => $new_password
				]
			);
		} else {
			return redirect("/");
		}		
	}

	public function sendLinkForPassReset()
	{
		$userEmail = $this->input->post('email');
		$userData = $this->user->get_by('email_address', $userEmail);

		if (!$userData) {
			// user does not exist
			echo 1;
		} else {
			if ($this->sendEmail($userData)) {
				// email is sent
				echo 0;
			} else {
				// email not sent
				echo 2;
			}
		}
	}

	public function setNewPassword($userid)
	{
		if (isset($_COOKIE['userId'])){
			setcookie('userId', "", time() - 3600);
		}
		
		setcookie('userId', $userid, time() + 500, "/");

		return parent::guest_page("users/password-reset-form");
		
	}

	public function setPassword() {
		$userid = base64_decode(str_replace("%3D", "=", $this->input->post('userId')));
		$newpass =  $this->encryption->encrypt($this->input->post('password'));
		
		if (
			!$this->user->update(
				$userid,
				['password' => $newpass]
			)) {
			echo 1;
		} else {
			echo 0;
		}
	}

	public function sendEmail($userData)
	{
		$this->load->library('email');

		$senderEmail = 'mzbguro@gmail.com';
		$senderPassword = 'a4140140!';
		$userId = base64_encode($userData['id']);
		$href = base_url('users/set_new_password/' . $userId);
		$resetLinkStr = "<a href=\"$href\" target=\"_blank\">click here</a>";

		$body = "<h2>Password reset instructions</h2>";
		$body .= "<p>A password reset was iniated on your account</p>";
		$body .= "<h3>If you want to reset your password, " . $resetLinkStr . "</h3>";
		$body .= "<p><small>Ignore this message if you do not want your password reset.</small></p>";
		$body .= "<p><small style=\"color:pink;\">If you think someone else is wants to change your password, contact your administrator</small></p>";

		$config = array(
			'charset' => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => $senderEmail,
			'smtp_pass' => $senderPassword,
			'mailtype' => 'html',
			'newline' => "\r\n",
		);

		$this->email->initialize($config);

		$this->email->from($senderEmail, 'Payakapps Team');
		$this->email->to($userData['email_address']);
		$this->email->subject('Payakapps Password Reset');
		$this->email->message($body);

		if (!$this->email->send()) {
			echo $this->email->print_debugger();
			return false;
		} else {
			return true;
		}
	}

	public function getUserStats()
	{
		$this->load->model('UserStatsModel', 'user_stats');

		$totals = $this->user_stats->getTotals();

		$distribution = $this->user_stats->getDistribution();

		$distribution_r->cols[] = array(
			"id" => "",
			"label" => "Type",
			"pattern" => "",
			"type" => "string",
		);
		$distribution_r->cols[] = array(
			"id" => "",
			"label" => "Total",
			"pattern" => "",
			"type" => "number",
		);

		foreach ($distribution as $cd) {
			$distribution_r->rows[]["c"] = array(
				array(
					"v" => "$cd->type",
					"f" => null,
				),
				array(
					"v" => (int) $cd->users,
					"f" => null,
				),
			);
		}

		$stats = array(
			'distribution' => $distribution_r,
			'totals' => $totals,
		);
		echo json_encode($stats);
	}
}
	