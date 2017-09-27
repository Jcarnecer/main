<?php
if (!defined('BASEPATH')) exit('No direct access allowed');


class Utilities {

	private $CI;


	public function __construct() {
		$this->CI =& get_instance();
	}


	public function create_random_string($length=11) {
		$string = "";
	    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	    for ($i = 0; $i < $length; $i++) {
	        $string .= $characters[rand(0, strlen($characters) - 1)];
	    }

    	return $string;
	}


	public function validate_company_details($company_details) {
		$errors = [];

		if (empty($company_details['name'])) {
			$errors['name'] = 'Name field is required';
		} else if (strlen($company_details['name'] > 20) || strlen($company_details['name']) < 5) {
			$errors['name'] = 'Name field must be 5-20 characters long';
		} else if (preg_match('/[^a-zA-Z0-9 ]/', $company_details['name'])) {
			$errors['name'] = 'Name field must contain letters, numbers, and spaces only';
		} else if ($this->CI->company->get_company(['name' => $company_details['name']]) != null) {
			$errors['name'] = 'Name field must be unique';
		}

		return $errors;
	}


	public function validate_user_details($user_details) {
		$errors = [];

		if (empty($user_details['first_name'])) {
			$errors['first_name'] = 'First name field is required';
		} else if (preg_match('/[^a-zA-Z ]/', $user_details['first_name'])) {
			$errors['first_name'] = 'First name field must contain letters only';
		}

		if (empty($user_details['last_name'])) {
			$errors['last_name'] = 'Last name field is required';
		} else if (preg_match('/[^a-zA-Z ]/', $user_details['last_name'])) {
			$errors['last_name'] = 'Last name field must contain letters only';
		}

		if (empty($user_details['email_address'])) {
			$errors['email_address'] = 'E-mail address field is required';
		} else if (!filter_var($user_details['email_address'], FILTER_VALIDATE_EMAIL)) {
			$errors['email_address'] = 'E-mail address is not valid';
		} else if ($this->CI->user->get_users(['email_address' => $user_details['email_address']]) != null) {
			$errors['email_address'] = 'E-mail address must be unique';
		}

		if (empty($user_details['password'])) {
			$errors['password'] = 'Password field is required';
		}

		return $errors;
	}
	
}