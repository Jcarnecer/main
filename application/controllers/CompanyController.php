<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
	}


	public function show_register()
	{
		if (!parent::current_user()) {
			return parent::guest_page("company/register"); 
		} else {
			return redirect("/");
		}
	}


	public function register()
	{
		if (!parent::current_user()) {
			$this->form_validation->set_rules("name", "company name", "trim|required|min_length[5]|max_length[20]|unique_company_name");
			$this->form_validation->set_rules("first_name", "first name", "trim|required");
			$this->form_validation->set_rules("last_name", "last name", "trim|required");
			$this->form_validation->set_rules("email_address", "e-mail address", "trim|required|valid_email|unique_email_address");
			$this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|max_length[20]");

			if ($this->form_validation->run()) {
				$company = [
					"id" => $this->utilities->create_random_string(),
					"name" => $this->input->post('name'),
					"created_at" => date("Y-m-d H:i:s")
				];

				$user = [
					"id" => $this->utilities->create_random_string(),
					"company_id" => $company['id'],
					"first_name" => $this->input->post('first_name'),
					"last_name" => $this->input->post('last_name'),
					"email_address" => $this->input->post('email_address'),
					"password" => $this->encryption->encrypt($this->input->post('password')),
					"role" => "1",
					"created_at" => date("Y-m-d H:i:s"),
	                "last_login_at" => date("Y-m-d H:i:s"),
	                "avatar_url" => base_url("upload/avatar/default.png")
				];
				
				$this->company->insert($company);
				$this->user->insert($user);
				return redirect("users/login");
			}
			return parent::guest_page("company/register");
		} else {
			return redirect("/");
		}			
	}
}
