<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$user = parent::current_user();

		if ($user) {
			parent::main_page("dashboard");
		} else {
			parent::guest_page("welcome");
		}
		
	}
}
