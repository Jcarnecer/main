<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleController extends BaseController {

	public function __construct() {
		parent::__construct();
	}


	public function index() {
		$user = $this->authenticate->current_user();

		if ($user &&
			in_array("ROLE_LIST", $user->permissions)) {
			return parent::main_page("role/index.php");
		}

		return redirect("/");
	}


	public function view($name) {
		$user = $this->authenticate->current_user();

		if ($user &&
			in_array("ROLE_VIEW", $user->permissions)) {

			$role = $this->db->get_where("roles", ["company_id" => $user->company_id, "name" => $name])->row_array();
			return parent::main_page("role/view.php", ["role" => $role]);
		}

		return redirect("/");
	}

	public function add_permission($name) {
		$user = $this->authenticate->current_user();

		if ($user &&
			in_array("ROLE_UPDATE", $user->permissions)) {
			return parent::main_page("role/add_permissions.php", ["permissions" => $permissions]);
		}

		return redirect("/");
	}
}
