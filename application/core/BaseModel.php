<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseModel extends CI_Model {

	protected $table;

	public function __construct() {
		parent::__construct();
	}

	public function get($value) {
		return $this->get_by(["id" => $value]);
	}

	public function get_by() {
		$where = func_get_args();
		return $this->db->get_where($this->table, $where[0])->row_array();
	}

	public function get_many_by() {
		$where = func_get_args();
		return $this->db->get_where($this->table, $where[0])->result_array();
	}

	public function get_all() {
		return $this->db->get_where($this->table)->result_array();
	}
}