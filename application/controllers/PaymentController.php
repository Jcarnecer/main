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

    public function paypal_checkout(){
        $config['business']             = 'astrid-seller@gmail.com'; //Your PayPal account
        $config['cpp_header_image']     = ''; //Image header url [750 pixels wide by 90 pixels high]
        $config['return']               = 'success.php';
        $config['cancel_return']        = 'shopping.php';
        $config['notify_url']           = 'process_payment.php';
        $config['production']           = FALSE; //Its false by default and will use sandbox
        $config['discount_rate_cart']   = 20; //This means 20% discount
        $config["invoice"]              = '843843'; //The invoice id

        $this->load->library('Paypal',$config);

        #$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);

        $this->paypal->add('T-shirt',2.99,6); //First item
        $this->paypal->add('Pants',40);       //Second item
        $this->paypal->add('Blowse',10,10,'B-199-26'); //Third item with code

        $this->paypal->pay(); //Proccess the payment 
        $received_post = print_r($this->input->post(),TRUE);
       
    }
}