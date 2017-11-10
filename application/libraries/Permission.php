<?php
if (!defined('BASEPATH')) exit('No direct access allowed');


class Permission {

	private $CI;
	private $USER_LIST = 0x01;
	private $USER_CREATE = 0x02;

	private $ROLE_LIST = 0x10;
	private $ROLE_VIEW = 0x20;

	public function __construct() {
		$this->CI =& get_instance();
	}

	public function __get($key) {
		return $this->$key;
	}
}