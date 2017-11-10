<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIController extends Base_Controller {

	public function __construct() {
		parent::__construct();
		header("Content-Type: application/json");
	}


	public function get_role($name) {		
		$user = $this->authenticate->current_user();

		if ($user &&
			in_array("ROLE_VIEW", $user->permissions)) {

			$role = $this->db->get_where("roles", ["company_id" => $user->company_id, "name" => $name])->row_array();
			$role["users"] = $this->db->select("users.id, users.first_name, users.last_name")
				->from("users")
				->where(["role" => $role["id"]])
				->get()
				->result_array();

			$role["permissions"] = [];
			foreach ($this->db->get_where("roles_permissions", ["role_id" => $role["id"]])->result_array() as $permission) {
				$role["permissions"][] = $permission["name"];
			}

			return print json_encode($role, JSON_PRETTY_PRINT);
		}

		return print json_encode(["error" => "Authentication issues"]);	
	}

	public function get_roles_permissions($name) {
		$user = $this->authenticate->current_user();

		if ($user &&
			in_array("ROLE_UPDATE", $user->permissions)) {

			$role = $this->db->get_where("roles", ["company_id" => $user->company_id, "name" => $name])->row_array(); 
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
	
}