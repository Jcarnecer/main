<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubscriptionModuleModel extends BaseModel {

	protected $_table = "subscription_modules";

	protected $before_create = ['get_module_id'];

	public function __construct() {
		parent::__construct();
	}

	public function get_module_id($row)
	{
		$row['module_id'] = $this->module->get_by(['code' => $row['module_id']])['id'];
		return $row;
	}
}