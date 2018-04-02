<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PassResetKeysModel extends BaseModel {

	protected $_table = "pass_reset_keys";
	protected $soft_delete = TRUE;

	public function __construct() {
		parent::__construct();
	}

	public function getKeyData($key) {
		// for testing
		$userId = $this
			->get_by(['id' => $key, 'request_expiry <=' => date('Y-m-d H:i:s')])['userid'];

		// for deployment
		// $userId = $this
		// 	->get_by(['id' => $key, 'request_expiry <=' => date('Y-m-d H:i:s')])['userid'];

		return $userId;
	}
}