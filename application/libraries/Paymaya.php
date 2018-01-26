<?php
require "application/libraries/User.php";


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
       
        $itemAmountDetails = new ItemAmountDetails();
        $itemAmountDetails->shippingFee = "14.00";
        $itemAmountDetails->tax = "5.00";
        $itemAmountDetails->subtotal = "50.00";
        $itemAmount = new ItemAmount();
        $itemAmount->currency = "PHP";
        $itemAmount->value = "69.00";
        $itemAmount->details = $itemAmountDetails;
        $item = new Item();
        $item->name = "Leather Belt";
        $item->code = "pm_belt";
        $item->description = "Medium-sized belt made from authentic leather";
        $item->quantity = "1";
        $item->amount = $itemAmount;
        $item->totalAmount = $itemAmount;
        
        // Checkout
        $itemCheckout = new Checkout();
        $user = new User();
        $itemCheckout->buyer = $user->buyerInfo();
        $itemCheckout->items = array($item);
        $itemCheckout->totalAmount = $itemAmount;
        $itemCheckout->requestReferenceNumber = "123456789";
        $itemCheckout->redirectUrl = array(
            "success" => "https://shop.com/success",
            "failure" => "https://shop.com/failure",
            "cancel" => "https://shop.com/cancel"
            );
        $itemCheckout->execute();
        $itemCheckout->retrieve();
        
        echo "Checkout ID: " . $itemCheckout->id . "\n";
        echo "Checkout URL: " . $itemCheckout->url . "\n";


        redirect($itemCheckout->url);
    }


}