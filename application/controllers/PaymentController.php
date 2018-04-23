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


    public function overdue_payment() {

        $overdue_accounts = $this->subscription->get_many_by('expiration_date < NOW()');

        foreach ($overdue_accounts as $account) {
            $root_account = $this->user->get_by(['company_id' => $account['company_id'], 'role' => '1']);
            // templates to be changed.. suggestion: move the subject and body of the email to the base controller.
            // $subject = 'Payakapps Subscription';

            // $body = "<h2>Your PayakApps Subscription has expired.</h2>";
            // $body .= "<p>Your account is past due.</p>";
            

            $data = [

                'userEmailAddress' => 'jm.nz0723@gmail.com',
                'days'             => date_diff(date_create(date("Y-m-d")), date_create($account['expiration_date']))
            ];
            switch($data['days']){
                case 1:
                case 8:
                case 15:
                case 22:
                case 30:
                case 35:
                case 42:
                case 49:
                case 60:
                    parent::send_email('overdue_account', $data);
            }
        }
    }
}