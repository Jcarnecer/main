<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_Controller extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	
	public function index() {
		$user = $this->authenticate->current_user();
		parent::main_page("subscription/index.php", ["company_id" => $user->company_id]);
	}
}