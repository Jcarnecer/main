<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		if (parent::current_user()) {
			
			$expiration = (new DateTime($this->company->get(parent::current_user()->company_id)['created_at']))->add(new DateInterval('P15D'));
			$today 		= new DateTime('now');

			$data['expiration'] 	= $expiration->format('F j, Y');
			$data['remaining_day'] 	= $today->diff($expiration)->days;
			$data['first_name']		= parent::current_user()->first_name;
			$data['last_name']		= parent::current_user()->last_name;

			parent::main_page("dashboard", $data);
		} else {
			parent::guest_page("welcome");
		}
	}
}
