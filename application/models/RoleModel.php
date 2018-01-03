<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModel extends BaseModel {

	protected $_table = "roles";

	public function __construct() {
		parent::__construct();
	}


	public function get_permissions($role_id)
	{
		$permissions = [];
		foreach ($this->role_permission->get_many_by("role_id", $role_id) as $role_permission) {
			$permission = $this->permission->get($role_permission["permission_id"]);
			$permissions[] = $permission["id"];	
		}
		return $permissions;
	}

}
