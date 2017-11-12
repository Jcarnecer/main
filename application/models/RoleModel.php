<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModel extends BaseModel {

	public $table = "roles";

	public function __construct() {
		parent::__construct();
	}
}
