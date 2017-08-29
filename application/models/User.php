<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public $id;
	public $first_name;
	public $last_name;
	public $middle_name;
	public $username;
	public $password;

	public function authenticate_user($username, $password) {
		$user = $this->db->get_where('users', ['username' => $username, 'password' => $password], 1);
		return $user->result();
	}
}
