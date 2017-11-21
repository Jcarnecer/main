<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RolePermissionModel extends BaseModel {

	public $_table = "roles_permissions";

	public function __construct() {
		parent::__construct();
	}
}
