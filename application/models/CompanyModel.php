<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyModel extends BaseModel {

	public $id;
	public $name;
	public $created_at;

	protected $_table = "companies";

	public function __construct() {
		parent::__construct();
	}
}