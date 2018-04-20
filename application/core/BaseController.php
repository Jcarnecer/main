<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {


	public function __construct() {
		parent::__construct();
	}


	public function main_page(
		$view, 
		$data = [], 
		$title = "PayakApps"
	) {
		$user = $this->current_user();

		$this->load->view("partials/header", ["title" => $title]);
		$this->load->view("partials/sidebar", ["user" => $user]);
		$this->load->view("partials/tutorial");
		$this->load->view($view, $data);
		$this->load->view("partials/footer");
	}


	public function login_page() 
	{
		$this->load->view("partials/header");
		$this->load->view("users/login");
		$this->load->view("partials/footer");
	}


	public function guest_page(
		$view, 
		$data = [], 
		$title = "PayakApps"
	) {
		$this->load->view("partials/header", ["title" => $title]);
		$this->load->view($view, $data);
		$this->load->view("partials/footer");
	}


	public function current_user()
	{
		$user = $this->session->userdata("user");
		if ($user) {
			$user->permissions = [];
			foreach ($this->role_permission->get_many_by("role_id", $user->role) as $permission) {
				$user->permissions[] = $permission["permission_id"];
			}
		}
		return $user;
	}


	public function can_user($permission)
	{
		$current_user = $this->current_user();
		return $current_user and in_array($permission, $current_user->permissions);
	}


	/*
	 * @parameters
	 *    $type - type of email transaction	
	 *    $data - data needed for the email transaction (may vary per transaction)
	 *    $data['userEmailAddress'] - required data
	 */
	public function send_email($type, $data) {
		$this->load->library('email');

		$senderEmail = 'mzbguro@gmail.com';
		$senderPassword = 'a4140140!';
		$email_details = [];

		$config = [
			'charset' => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => $senderEmail,
			'smtp_pass' => $senderPassword,
			// 'smtp_timeout' => 1,
			'mailtype' => 'html',
			'newline' => "\r\n",
		];

		$this->email->initialize($config);

		// switch for email templates. depending on the type of email transaction to process
		switch($type){
			case 'password_reset': $email_details = $this->email_templates->password_reset($data['keyId']); break;
			case 'overdue_account': $email_details = $this->email_templates->overdue_account($data['days']); break;
		}

		$this->email->from($senderEmail, 'Payakapps Team');
		$this->email->to($data['userEmailAddress']);
		$this->email->subject($email_details['subject']);
		$this->email->message($email_details['body']);

		if (!$this->email->send()) {
			echo $this->email->print_debugger();
			return false;
		} else {
			return true;
		}

	}
}
