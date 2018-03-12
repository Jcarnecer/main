<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubscriptionModel extends BaseModel {

	protected $_table = "subscriptions";

	public function __construct() {
		parent::__construct();
	}
}