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


	public function send_email($userEmailAddress, $subject, $message) {
		$this->load->library('email');

		$senderEmail = 'mzbguro@gmail.com';
		$senderPassword = 'a4140140!';

		$config = array(
			'charset' => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => $senderEmail,
			'smtp_pass' => $senderPassword,
			// 'smtp_timeout' => 1,
			'mailtype' => 'html',
			'newline' => "\r\n",
		);

		$this->email->initialize($config);

		$this->email->from($senderEmail, 'Payakapps Team');
		$this->email->to($userEmailAddress);
		$this->email->subject($subject);
		$this->email->message($message);

		if (!$this->email->send()) {
			echo $this->email->print_debugger();
			return false;
		} else {
			return true;
		}

	}
}
