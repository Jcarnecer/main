<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleController extends Base_Controller {

	public function __construct() {
		parent::__construct();
	}


	public function index() {
		return parent::main_page("role/index.php");
	}


	public function view($role_id) {
		$user = $this->authenticate->current_user();

		if ($user &&
			($user->permissions & $this->permission->ROLE_VIEW) === $this->permission->ROLE_VIEW) {

			$role = $this->db->get_where("roles", ["id" => $role_id])->row_array();
			return parent::main_page("role/view.php", ["role" => $role]);
		}

		return redirect("/");
	}

	public function view_rest($role_id) {
		header("Content-Type: application/json");
		$user = $this->authenticate->current_user();

		if ($user &&
			($user->permissions & $this->permission->ROLE_VIEW) === $this->permission->ROLE_VIEW) {

			$role = $this->db->get_where("roles", ["id" => $role_id])->row_array();

			$role["users"] = $this->db->select("users.id, users.first_name, users.last_name")
				->from("users")
				->where(["role" => $role_id])
				->get()
				->result_array();

			return print json_encode($role, JSON_PRETTY_PRINT);
		}

		return print json_encode(["error" => "Authentication issues"]);	
	}
}
