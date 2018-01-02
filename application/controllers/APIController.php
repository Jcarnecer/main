<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->output->set_content_type("application/json");
	}

	public function get_current_user() {
		return $this->output->set_output(json_encode(parent::current_user(), JSON_PRETTY_PRINT));
	}

	public function get_companies() {
		return $this->output->set_output(json_encode($this->company->get_all(), JSON_PRETTY_PRINT));
	}

	public function get_company_users() {
		$data = [];
		$current_user = parent::current_user();

		if ($current_user and 
			in_array("USER_LIST", $current_user->permissions)) {

			foreach ($this->user->get_many_by(["company_id" => $current_user->company_id]) as $user) {
				$user["role"] = $this->role->get($user["role"]);
				unset($user["password"]);
				unset($user["role"]["id"]);
				$data[] = $user;
			}

		} else {
			$data["error"] = [
				"message" => "Requires authentication"
			];
		}

		return $this->output->set_output(json_encode($data, JSON_PRETTY_PRINT));
	}

	public function get_company_roles() {
		$data = [];
		$current_user = parent::current_user();

		if ($current_user and 
			in_array("ROLE_LIST", $current_user->permissions)) {

			$data["roles"] = [];
			foreach ($this->role->get_many_by("company_id", $current_user->company_id) as $role) {
				unset($role["company_id"]);
				$data["roles"][] = $role;
			}

		} else {
			$data["error"] = [
				"message" => "Requires authentication"
			];
		}
	
		return $this->output->set_output(json_encode($data, JSON_PRETTY_PRINT));
	}

	public function get_role($name) {
		$current_user = parent::current_user();

		if ($current_user and 
			in_array("ROLE_VIEW", $current_user->permissions)) {

			$role = $this->db->get_where("roles", ["company_id" => $current_user->company_id, "name" => $name])->row_array();
			$role["permissions"] = [];

			foreach ($this->role_permission->get_many_by("role_id", $role["id"]) as $role_permission) {
				$permission = $this->permission->get($role_permission["permission_id"]);
				$role["permissions"][] = $permission;
			}

			return print json_encode($role, JSON_PRETTY_PRINT);
		}

		return print json_encode([
			"error" => [
				"message" => "Authentication issues"
			]
		]);	
	}

	public function get_roles_permissions($name) {
		$current_user = parent::current_user();

		if ($current_user &&
			in_array("ROLE_UPDATE", $current_user->permissions)) {

			$role = $this->db->get_where("roles", ["company_id" => $current_user->company_id, "name" => $name])->row_array(); 
			$permissions = $this->db->query("
				SELECT *
				  FROM permissions
				 WHERE id IN (
				 	SELECT permission_id FROM roles_permissions WHERE role_id = '{$role["id"]}'
				 )
			")->result_array();
			return print json_encode($permissions, JSON_PRETTY_PRINT);
		}

		return print json_encode(["error" => "Authentication error"]);
	}

	public function get_permissions() {
		return $this->output->set_output(json_encode($this->permission->get_all(), JSON_PRETTY_PRINT));
	}
}