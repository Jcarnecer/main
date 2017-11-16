<?php
if (!defined('BASEPATH')) exit('No direct access allowed');


class Authenticate {

	private $CI;


	public function __construct() {
		$this->CI =& get_instance();
	}


	public function login_user($user) {
		unset($user->password);
		$this->CI->session->set_userdata('user', $user);
	}


	public function logout_user() {
		$this->CI->session->unset_userdata('user');
	}


	public function current_user() {
		if ($this->CI->session->user) {
			$user = $this->CI->session->user;

			$user->permissions = [];
			foreach ($this->CI->db->get_where("roles_permissions", ["role_id" => $user->role])->result_array() as $role_permissions) {
				$user->permissions[] = $role_permissions["permission_id"];
			}

			return $user;
		}
		return NULL;
	}


	public function is_login() {
		if (!$this->CI->session->userdata('user')) {
			return redirect('users/login');
		}
	}


	public function is_guest() {
		if ($this->CI->session->userdata('user')) {
			return redirect('/');
		}
	}	
}