<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleController extends BaseController 
{

	public function __construct() 
	{
		parent::__construct();
	}


	public function index() 
	{	
		if (parent::can_user("ROLE_LIST")) {
			return parent::main_page("role/index.php");
		} else {
			return redirect("/");
		}
	}


	public function show_create()
	{
		if (parent::can_user("ROLE_CREATE")) {
			$company = $this->company->get(parent::current_user()->company_id);
			return parent::main_page("role/create.php", ["permissions" => $this->permission->get_all(), "company" =>  $company['name']]);
		} else {
			return redirect("/");
		}
	}


	public function create()
	{
		if (parent::can_user("ROLE_CREATE")) {
			$current_user = parent::current_user();

			$this->form_validation->set_rules("name", "role name", "trim|ucwords|required"); //|is_unique[roles.name]
			
			if ($this->form_validation->run()) {
				$role = [
					"id" => $this->utilities->create_random_string(),
					"company_id" => $current_user->company_id,
					"name" => $this->input->post("name"),
					"created_at" => date("Y-m-d H:i:s")
				];
				$this->role->insert($role);
				
				if ($this->input->post("permissions")) {
					foreach ($this->input->post("permissions") as $permission) {
						$role_permission = [
							"role_id" => $role["id"],
							"permission_id" =>  $permission
						];
						$this->role_permission->insert($role_permission);
					}
				}
				return redirect("roles");
			}
			return $this->show_create();
		} else {
			return redirect("/");
		}
	}


	public function show_update($name)
	{
		if (parent::can_user("ROLE_UPDATE")) {
			$current_user = parent::current_user();
			$company = $this->company->get($current_user->company_id);
			$name = urldecode($name);
			$role = $this->role->get_by(["company_id" => $current_user->company_id, "name" => $name]) ?? 
					show_error(404);
			$role["permissions"] = $this->role->get_permissions($role["id"]);
			$role["name"] = preg_replace('/^' . preg_quote($company['name'] . ' ','/') . '/', '', $name);

			return parent::main_page(
				"role/update.php", [
					"role" => $role,
					"company" => $company['name'],  
					"permissions" => $this->permission->get_all()
				]
			);
		} else {
			return redirect("/");
		}
	}


	public function update($name)
	{
		if (parent::can_user("ROLE_UPDATE")) {
			$current_user = parent::current_user();
			$name = urldecode($name);
			$role = $this->role->get_by(["company_id" => $current_user->company_id, "name" => $name]) ?? 
					show_error(404);
			$role["permissions"] = $this->role->get_permissions($role["id"]);
			
			$validation["name"] = "trim|ucwords|required";
			// if ($role["name"] !== $this->input->post("name")) {
			// 	$validation["name"] .= "|is_unique[roles.name]";
			// }
			$this->form_validation->set_rules("name", "role name", $validation["name"]);

			if ($this->form_validation->run()) {
				$this->role->update($role["id"], ["name" => $this->input->post("name")]);
				$this->role_permission->delete_by(["role_id" => $role["id"]]);
				foreach ($this->input->post("permissions") as $permission) {
					$role_permission = [
						"role_id" => $role["id"],
						"permission_id" =>  $permission
					];
					$this->role_permission->insert($role_permission);
				}
				return redirect("roles");
			}

			return $this->show_update($name);
		} else {
			return redirect("/");
		}
	}
}
