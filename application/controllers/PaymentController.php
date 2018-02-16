<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
		
    }

    public function paypal_checkout(){
        $config['business']             = 'astrid-seller@gmail.com'; //Your PayPal account
        $config['cpp_header_image']     = 'https://payakapp.com/assets/images/payak-logo-blue-50.png'; //Image header url [750 pixels wide by 90 pixels high]
        $config['return']               = 'success.php';
        $config['cancel_return']        = 'shopping.php';
        $config['notify_url']           = 'process_payment.php';
        $config['production']           = FALSE; //Its false by default and will use sandbox
        $config['discount_rate_cart']   = 0; //This means 20% discount
        $config["invoice"]              = '843843'; //The invoice id

        $this->load->library('Paypal',$config);

        #$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);

        switch($this->input->post('package')) {
            case 'project':
                $item['package']='Project Package';
                break;
            case 'shift':
                $item['package']='Shift Management Package';
                break;
            case 'hr':
                $item['package']='Human Resource Package';
                break;
            case 'suite':
                $item['package']='PayakApp Suite Package';
                break;
        }

        switch($this->input->post('type')) {
            case 'trial':
                $item['type']='Trial';
                $item['price']=0.00;
                break;
                case 'personal':
                $item['type']='Single User';
                $item['price']=7.00;
                break;
                case 'company':
                $item['type']='Company';
                $item['price']=29.00;
                break;
            case 'suite':
                $item['type']='App Suite';
                $item['price']=59.00;
                break;
        }

        $this->paypal->add($item['package'].' ('.$item['type'].')',$item['price']); //First item

        $this->paypal->pay(); //Proccess the payment 
        $received_post = print_r($this->input->post(),TRUE);
    }
}