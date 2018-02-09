<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
		$this->output->set_content_type("application/json");
	}


	public function get_companies()
	{
		return $this->output->set_output(json_encode($this->company->get_all(), JSON_PRETTY_PRINT));
	}


	public function get_company_users()
	{
		$data['data'] = [];
		if (parent::can_user("USER_LIST")) {
			$current_user = parent::current_user();
			foreach ($this->user->get_many_by(["company_id" => $current_user->company_id]) as $user) {
				$user["role"] = $this->role->get($user["role"]);
				unset($user["password"]);
				unset($user["role"]["id"]);
				$data['data'][] = $user;
			}
		} else {
			$data["error"] = [
				"message" => "Requires authentication"
			];
		}
		return $this->output->set_output(json_encode($data, JSON_PRETTY_PRINT));
	}


	public function get_company_roles()
	{
		$data = [];
		if (parent::can_user("ROLE_LIST")) {
			$current_user = parent::current_user();
			$data["data"] = [];
			foreach ($this->role->get_many_by("company_id", $current_user->company_id) as $role) {
				unset($role["company_id"]);
				$data["data"][] = $role;
			}
		} else {
			$data["error"] = [
				"message" => "Requires authentication"
			];
		}
		return $this->output->set_output(json_encode($data, JSON_PRETTY_PRINT));
	}
}