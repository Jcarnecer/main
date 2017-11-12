<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RolePermissionModel extends BaseModel {

	public $table = "roles_permissions";

	public function __construct() {
		parent::__construct();
	}

	public function get_by_role($role_id) {
		return $this->db->get_where($this->table, ["role_id", $role_id])->result_array();
	}
}
