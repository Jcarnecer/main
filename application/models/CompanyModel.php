<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyModel extends BaseModel {

	public $id;
	public $name;

	public $table = "companies";

	public function __construct() {
		parent::__construct();
	}

	public function insert_company($company_details) {
		return $this->db->insert('companies', $company_details);
	}


	public function get_company($query) {
		return $this->db->get_where('companies', $query)->row();
	}

	public function search($query) {
		foreach ($query as $key => $value) {
			$this->db->like($key, $value);
		}

		return $this->db->get('companies')->result();
	}
}
