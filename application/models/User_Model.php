<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

	public $id;
	public $first_name;
	public $last_name;
	public $username;
	public $password;

	public function authenticate_user($email_address, $password, $company_id) {
		$user = $this->db->get_where('users', [
			'email_address' => $email_address, 
			'password' => $password, 
			'company_id' => $company_id
		], 1);
		return $user->row();
	}
	

	public function insert_user($user_details) {
		return $this->db->insert('users', $user_details);
	}


	public function get_user($query) {
		return $this->db->get_where('users', $query)->result();
	}
}
