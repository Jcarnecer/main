<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_Controller extends Base_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$user = $this->authenticate->current_user();

		if ($user) {
			parent::main_page("dashboard");
		} else {
			parent::guest_page("welcome");
		}
		
	}
}
