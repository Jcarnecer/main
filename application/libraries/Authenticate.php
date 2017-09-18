<?php
if (!defined('BASEPATH')) exit('No direct access allowed');


class Authenticate {

	private $CI;


	public function __construct() {
		$this->CI =& get_instance();
	}


	public function login_user($user) {
		$this->CI->session->set_userdata('user', $user);
	}


	public function logout_user() {
		$this->CI->session->unset_userdata('user');
	}


	public function current_user() {
		return $this->CI->session->userdata('user');
	}
	
}