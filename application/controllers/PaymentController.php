<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
		
    }
    
    public function Checkout(){
        $this->PayMaya->Checkout();
    }
}