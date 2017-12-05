<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$user = parent::current_user();
		if ($user && in_array("ROLE_LIST", $user->permissions)) {
			return parent::main_page("role/index.php");
		}
		return redirect("/");
	}

	public function create() {
		$user = parent::current_user();

		if ($user && in_array("ROLE_CREATE", $user->permissions)) {
			if ($this->input->server("REQUEST_METHOD") === "POST") {
				$this->form_validation->set_rules("name", "role name", "trim|ucwords|required|unique_role_name");

				if ($this->form_validation->run()) {
					$role_details = [
						"id" => $this->utilities->create_random_string(),
						"company_id" => $user->company_id,
						"name" => $this->input->post("name"),
						"created_at" => date("Y-m-d H:i:s")
					];

					$this->role->insert($role_details);

					if ($this->input->post("permissions")) {
						foreach ($this->input->post("permissions") as $permission) {
							$role_permission_details = [
								"role_id" => $role_details["id"],
								"permission_id" =>  $permission
							];

							$this->role_permission->insert($role_permission_details);
						}
					}
					return redirect("roles");
				}
			}
			return parent::main_page("role/create.php", [
				"permissions" => $this->permission->get_all()
			]);
		}
		return redirect("/");
	}

	public function view($name) {
		$user = parent::current_user();

		if ($user && in_array("ROLE_VIEW", $user->permissions)) {
			$role = $this->role->get_by(["company_id" => $user->company_id, "name" => $name]);
			$role["permissions"] = [];

			foreach ($this->role_permission->get_many_by("role_id", $role["id"]) as $role_permission) {
				$permission = $this->permission->get($role_permission["permission_id"]);
				$role["permissions"][] = $permission;
			}

			return parent::main_page("role/view.php", ["role" => $role]);
		}

		return redirect("/");
	}

	public function update($name) {
		$user = parent::current_user();

		if ($user && in_array("ROLE_UPDATE", $user->permissions)) {
			$name = urldecode($name);
			$role = $this->role->get_by(["company_id" => $user->company_id, "name" => $name]);
			$role["permissions"] = [];

			foreach ($this->role_permission->get_many_by("role_id", $role["id"]) as $role_permission) {
				$permission = $this->permission->get($role_permission["permission_id"]);
				$role["permissions"][] = $permission["id"];
			}

			if ($this->input->server("REQUEST_METHOD") === "POST") {
				if ($role["name"] === $this->input->post("name")) {
					$this->form_validation->set_rules("name", "role name", "trim|ucwords|required");
				} else {
					$this->form_validation->set_rules("name", "role name", "trim|ucwords|required|is_unique[roles.name]");
				}

				if ($this->form_validation->run()) {
					$role_details = [
						"name" => $this->input->post("name")
					];

					$this->role->update($role["id"], $role_details);
					$this->role_permission->delete_by(["role_id" => $role["id"]]);

					foreach ($this->input->post("permissions") as $permission) {
						$role_permission_details = [
							"role_id" => $role["id"],
							"permission_id" =>  $permission
						];

						$this->role_permission->insert($role_permission_details);
					}

					return redirect("roles");
				}
			}

			return parent::main_page("role/update.php", [
				"role" => $role,  
				"permissions" => $this->permission->get_all()
			]);
		}

		return redirect("/");
	}
}
