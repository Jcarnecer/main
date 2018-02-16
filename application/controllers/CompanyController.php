<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
	}


	public function show_register()
	{
		if (!parent::current_user()) {
			return parent::guest_page("company/register"); 
		} else {
			return redirect("/");
		}
	}


	public function show_selection()
	{
		if (!parent::current_user() && $this->session->has_userdata('company')) {
			return parent::guest_page("company/cart"); 
		} else {
			return redirect("/");
		}
	}


	public function show_register_success()
	{
		if (!parent::current_user() && $this->session->has_userdata('company') && $this->session->has_userdata('subscription')) {
			$data['company'] = $this->session->userdata('company');
			$data['subscription'] = $this->session->userdata('subscription');

			$this->session->unset_userdata('company');
			$this->session->unset_userdata('subscription');

			return parent::guest_page("company/register_success", $data); 
		} else {
			return redirect("/");
		}
	}


	public function show_register_failed()
	{
		if (!parent::current_user()) {
			return parent::guest_page("company/register_failed"); 
		} else {
			return redirect("/");
		}
	}


	public function register()
	{
		if (!parent::current_user()) {
			$this->form_validation->set_rules("name", "company name", "trim|required|min_length[5]|max_length[20]|unique_company_name");
			$this->form_validation->set_rules("first_name", "first name", "trim|required");
			$this->form_validation->set_rules("last_name", "last name", "trim|required");
			$this->form_validation->set_rules("email_address", "e-mail address", "trim|required|valid_email|unique_email_address");
			$this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|max_length[20]");

			if ($this->form_validation->run()) {
				$company = [
					"id" => $this->utilities->create_random_string(),
					"name" => $this->input->post('name'),
					"created_at" => date("Y-m-d H:i:s")
				];

				$user = [
					"id" => $this->utilities->create_random_string(),
					"company_id" => $company['id'],
					"first_name" => $this->input->post('first_name'),
					"last_name" => $this->input->post('last_name'),
					"email_address" => $this->input->post('email_address'),
					"password" => $this->encryption->encrypt($this->input->post('password')),
					"role" => "1",
					"created_at" => date("Y-m-d H:i:s"),
	                "last_login_at" => date("Y-m-d H:i:s"),
	                "avatar_url" => base_url("upload/avatar/default.png")
				];
				
				$this->company->insert($company);
				$this->user->insert($user);

				$this->session->set_userdata('company', $company);
				return redirect("companies/selection");
			}
			return parent::guest_page("company/register");
		} else {
			return redirect("/");
		}			
	}


	public function checkout(){
        $config['business']             = 'astrid-seller@gmail.com'; //Your PayPal account
        $config['cpp_header_image']     = 'payakapps.com/assets/images/payak-logo-blue-50.png'; //Image header url [750 pixels wide by 90 pixels high]
        $config['return']               = base_url('companies/register_success');
        $config['cancel_return']        = base_url('companies/register_failed');
        $config['notify_url']           = 'process_payment.php';
        $config['production']           = FALSE; //Its false by default and will use sandbox
        $config['discount_rate_cart']   = 0; //This means 20% discount
        $config["invoice"]              = '843843'; //The invoice id

        $this->load->library('Paypal', $config);

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
		$this->session->set_userdata('subscription', $item);

        $this->paypal->pay(); //Proccess the payment 
        // $received_post = print_r($this->input->post(),TRUE);
    }
}
