<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModuleModel extends BaseModel {

	protected $_table = "modules";

	public function __construct() {
		parent::__construct();
	}
}