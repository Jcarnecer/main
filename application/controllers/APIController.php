<<<<<<< HEAD
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
		$user = parent::current_user();

		if ($user && in_array("USER_LIST", $user->permissions)) {
			foreach ($this->user->get_many_by(["company_id" => $user->company_id]) as $_user) {
				$_user["role"] = $this->role->get($_user["role"]);
				unset($_user["password"]);
				unset($_user["role"]["id"]);
				$data[] = $_user;
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
		$user = parent::current_user();

		if ($user && in_array("ROLE_LIST", $user->permissions)) {
			$data["roles"] = [];
			foreach ($this->role->get_many_by("company_id", $user->company_id) as $role) {
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
		$data = [];
		$user = parent::current_user();

		if ($user && in_array("ROLE_VIEW", $user->permissions)) {

			$role = $this->db->get_where("roles", ["company_id" => $user->company_id, "name" => $name])->row_array();
			$role["permissions"] = [];
			foreach ($this->role_permission->get_many_by("role_id", $role["id"]) as $role_permission) {
				$permission = $this->permission->get($role_permission["permission_id"]);
				$role["permissions"][] = $permission;
			}

			return print json_encode($role, JSON_PRETTY_PRINT);
		}

		return print json_encode(["error" => "Authentication issues"]);	
	}

	public function get_roles_permissions($name) {
		$user = parent::current_user();

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
	
	public function get_permissions() {
		$user = parent::current_user();

		if ($user) {
			$permissions = $this->permission->get_all();
		}
		return $this->output->set_output(json_encode($permissions, JSON_PRETTY_PRINT));
	}
=======
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
		$user = parent::current_user();

		if ($user && in_array("USER_LIST", $user->permissions)) {
			foreach ($this->user->get_many_by(["company_id" => $user->company_id]) as $_user) {
				$_user["role"] = $this->role->get($_user["role"]);
				unset($_user["password"]);
				unset($_user["role"]["id"]);
				$data[] = $_user;
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
		$user = parent::current_user();

		if ($user && in_array("ROLE_LIST", $user->permissions)) {
			$data["roles"] = [];
			foreach ($this->role->get_many_by("company_id", $user->company_id) as $role) {
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
		$data = [];
		$user = parent::current_user();

		if ($user && in_array("ROLE_VIEW", $user->permissions)) {

			$role = $this->db->get_where("roles", ["company_id" => $user->company_id, "name" => $name])->row_array();
			$role["permissions"] = [];
			foreach ($this->role_permission->get_many_by("role_id", $role["id"]) as $role_permission) {
				$permission = $this->permission->get($role_permission["permission_id"]);
				$role["permissions"][] = $permission;
			}

			return print json_encode($role, JSON_PRETTY_PRINT);
		}

		return print json_encode(["error" => "Authentication issues"]);	
	}

	public function get_roles_permissions($name) {
		$user = parent::current_user();

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
	
	public function get_permissions() {
		$user = parent::current_user();

		if ($user) {
			$permissions = $this->permission->get_all();
		}
		return $this->output->set_output(json_encode($permissions, JSON_PRETTY_PRINT));
	}
>>>>>>> dev
}