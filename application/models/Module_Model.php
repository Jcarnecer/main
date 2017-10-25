<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_Model extends CI_Model {


	public function insert($module_details) {
		return $this->db->insert("main_modules", $module_details);
	}
}
