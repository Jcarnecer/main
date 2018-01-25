<?php
require "Paymaya-PHP-SDK/autoload.php";

use PayMaya\PayMayaSDK;
use PayMaya\API\Checkout;
use PayMaya\Model\Checkout\Item;
use PayMaya\Model\Checkout\ItemAmount;
use PayMaya\Model\Checkout\ItemAmountDetails;
Class Paymaya{

    private $CI;


    public function __construct()
	{
        $this->CI =& get_instance();
       
        PayMayaSDK::getInstance()->initCheckout("pk-AyydW1knvyLFfmNI3Xme9Lzi2dvSFQJgtCgGEJK6mZL","sk-OKMK8pGN1PpG219mzO3yhxWkrkfYdr5vWYWAtFJ8vDp", "SANDBOX");
    }
    
    public function Checkout(){
        $itemCheckout=new PayMaya\API\Checkout();
        $itemCheckout->execute();
        $itemCheckout->url();
    }


}