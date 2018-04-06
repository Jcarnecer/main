<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	private function createMsg($code, $message = array()) {
		$opMsg['code'] = $code;
		$opMsg['msg'] = $message;

		return $opMsg;
	}

	public function show_login() {
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

	public function logout() {
		$this->session->unset_userdata("user");
		return redirect("/");
	}

	public function index() {
		if (parent::can_user("USER_LIST")) {
			return parent::main_page("users/index");
		} else {
			return redirect("/");
		}
	}

	public function show_create() {
		if (parent::can_user("USER_CREATE")) {
			$current_user = parent::current_user();
			return parent::main_page("users/create", [
				"roles" =>  $this->role->get_many_by(["company_id" => $current_user->company_id])
			]);
		} else {
			return redirect("/");
		}
	}

	public function create() {
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

	public function show_update($id) {
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

	public function update($id) {
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

	public function profile() {
		if (parent::current_user()) {
			return parent::main_page('users/profile');
		} else {
			return redirect("/");
		}
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
		$this->aws->upload_avatar($current_user->id);
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

	public function sendLinkForPassReset() {
		$userEmail = $this->input->post('email');

		$this->form_validation->set_rules(
			'email', 
			'Email',
			'trim|required|min_length[8]|max_length[254]|valid_email',
			array(
				'required' => 'Please provide an email.',
				'min_length' => 'You must provide at least eight characters',
				'valid_email' => 'Please provide the format: example@email.com'
			)
		);

		if ($this->form_validation->run() == FALSE) {
			// invalid input
			echo json_encode($this->createMsg(1, [trim(validation_errors())]));
		} else {
			$userData = $this->user->get_by('email_address', $userEmail);
			if (!$userData) {
				// user is not found
				echo json_encode($this->createMsg(2, ['We couldn\'t find a user with that email address.']));
			} else {
				$this->load->model('PassResetKeysModel', 'PassReset');
				$resetKey = [
					'id' => $this->utilities->create_random_string(),
					'userid' => $userData['id'],
					'request_date' => date("Y-m-d H:i:s"),
					'request_expiry' => date("Y-m-d H:i:s"), // @todo: add expiry time
				];

				if ($this->sendResetLink($resetKey['id'], $userData['email_address'])) { // for deployment
				// if (TRUE) { // for testing
					$this->PassReset->insert($resetKey);
					$href = base_url('users/set_new_password/' . $resetKey['id']);
					// email is sent
					echo json_encode($this->createMsg(0, ['Success', $href]));
				} else {
					// email not sent
					echo json_encode($this->createMsg(3, ['Cannot access SMTP Service.']));
				}
			}
		}
	}

	public function setNewPassword($resetkey) {
		$this->load->model('PassResetKeysModel', 'PassReset');
		
		// check if the key is expired
		$userId = $this->PassReset->getKeyData($resetkey);

		if ($userId) {
			if (isset($_COOKIE['userId'])){
				setcookie('userId', "", time() - 3600);
			}
			
			setcookie('userId', $userId, time() + 500, "/");
			
			return parent::guest_page("users/password-reset-form");
		} else {
			redirect('users/login');
		}
	}

	public function cancelPassReset($resetKey) {
		$this->load->model('PassResetKeysModel', 'PassReset');

		$userId = $this->PassReset->getKeyData($resetKey);

		if ($userId) {
			$keys = $this->PassReset->get_many_by('userid', $userId);

			$keysToDelete = array();
			foreach ($keys as $key) {
				$keysToDelete[] = $key['id'];
			}

			if (!$this->PassReset->delete_many($keysToDelete)) {
				$data['msg'] = 'No keys associated'; 
			} else {
				$data['msg'] = "Success";
			}
		}

		$data['header'] = "Password Reset Canceled";
		$data['instructions'] = null;
		$data['status'] = "Password Reset request has been canceled"; 
		$data['details'] = array(
			"Your password was not reset and the request was voided.",
			"If you think someone wants to get into your account without your permission, contact your admin."
		);

		return parent::guest_page("users/blank_page", $data);
	}

	public function setPassword() {
		$userid = $this->input->post('userId');
		$newpass =  $this->input->post('password');
		$confpass =  $this->input->post('confpass');

		$rules = array(
			array(
				'field' => 'password', 
				'label' => 'Password',
				'rules' => 'trim|required|min_length[8]|max_length[254]',
				'errors' => array(
					'required' => 'Passwords must match.',
					'min_length' => 'You must provide at least eight characters'
				)
			),
			array(
				'field' => 'confpass', 
				'label' => 'Password confirmation',
				'rules' => 'trim|required|min_length[8]|max_length[254]|matches[password]',
				'errors' => array(
					'required' => 'Passwords must match.',
					'min_length' => 'You must provide at least eight characters.',
					'matches' => 'Passwords must match.'
				)
			)
		);

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			// errors in the input
			echo json_encode($this->createMsg(1, [trim(validation_errors())]));
		} else {
			if (!$this->user->update($userid, ['password' => $this->encryption->encrypt($newpass)])) {
				// update not successful
				echo json_encode($this->createMsg(2, ['Password update not successful']));
			} else {
				$this->load->model('PassResetKeysModel', 'PassReset');

				$keys = $this->PassReset->get_many_by('userid', $userid);

				$keysToDelete = array();
				foreach ($keys as $key) {
					$keysToDelete[] = $key['id'];
				}

				$msg = array();

				// delete assoc keys
				if (!$this->PassReset->delete_many($keysToDelete)) {
					$msg[] = 'No keys associated'; 
				}
				
				// clear cookie
				if (isset($_COOKIE['userId'])){
					setcookie('userId', "", time() - 3600);
				}

				$msg[] = 'Success';
				echo json_encode($this->createMsg(0, $msg));
			}
		}
	}

	public function sendResetLink($keyId, $userEmailAddress) {
		
		$newPasshref = base_url('users/set_new_password/' . $keyId);
		$resetLinkStr = "<a href=\"$newPasshref\" target=\"_blank\">click here</a>";
		$cancelResethref = base_url('users/cancel_reset/' . $keyId);
		$cancelLinkStr = "<a href=\"$cancelResethref\" target=\"_blank\">click here</a>";

		$subject = 'Payakapps Password Reset';

		$body = "<h2>Password reset instructions</h2>";
		$body .= "<p>A password reset was iniated on your account</p>";
		$body .= "<h3>If you want to reset your password, " . $resetLinkStr . ".</h3>";
		$body .= "<p><small>Ignore this message if you do not want your password reset.</small></p>";
		$body .= "<p><small style=\"color:pink;\">If you think someone else is wants to change your password, " . $cancelLinkStr . ".</small></p>";
		
		parent::send_email($userEmailAddress, $subject, $message);
	}

	public function getUserStats() {
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
