<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseForm_validation extends CI_Form_validation {

	protected $CI;

	public function __construct() {
		parent::__construct();
		$this->CI =& get_instance();
		
		$this->set_message("password_check", "The password field is incorrect.");
		$this->set_message("unique_company_name", "The company name field is already in use.");
		$this->set_message("unique_email_address", "The e-mail address field is already in use.");
		$this->set_message("unique_role_name", "The role name field is already in use.");
	}

	public function password_check($password) {
		$user_id = $this->CI->session->user->id;
		$user = $this->CI->db->get_where("users", ["id" => $user_id])->row_array();
		return $this->CI->encryption->decrypt($user["password"]) === $password;
	}

	public function unique_company_name($name) {
		if ($this->CI->company->get_by("name", $name)) {
			return FALSE;
		}
		return TRUE;
	}

	public function unique_email_address($email_address) {
		if ($this->CI->user->get_by("email_address", $email_address)) {
			return FALSE;
		}
		return TRUE;
	}

	public function unique_role_name($name) {
		$user = $this->CI->session->userdata("user");
		if ($name === "Root" ||
			$this->CI->role->get_by(["name" => $name, "company_id" => $user->company_id])) {
			return FALSE;
		}
		return TRUE;
	}
}
