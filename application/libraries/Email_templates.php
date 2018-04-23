<?php
if (!defined('BASEPATH')) exit('No direct access allowed');

class Email_templates 
{

	private $CI;


	public function __construct()
	{
		$this->CI =& get_instance();
	}


	public function password_reset($keyId) {

		$newPasshref = base_url('users/set_new_password/' . $keyId);
		$resetLinkStr = "<a href=\"$newPasshref\" target=\"_blank\">click here</a>";
		$cancelResethref = base_url('users/cancel_reset/' . $keyId);
		$cancelLinkStr = "<a href=\"$cancelResethref\" target=\"_blank\">click here</a>";

		$subject = 'Payakapps Password Reset';

		$body = "<h2>Password reset instructions</h2>";
		$body .= "<p>A password reset was iniated on your account</p>";
		$body .= "<h3>If you want to reset your password, " . $resetLinkStr . ".</h3>";
		$body .= "<p><small>Ignore this message if you do not want your password reset.</small></p>";
		$body .= "<p><small style=\"color:pink;\">If you think someone else is wants to change your password, " . $cancelLinkStr . ".</small></p>";

		$data = [
			'subject' 	=> $subject,
			'body'		=> $body
		];

		return $data;
	}


	public function overdue_account($days) {
		
		// create a switch case for varying days
		$subject = 'Payakapps Subscription';

		switch($days) {

			case 1: // advising their subscription is past due
		        $body = "<h2>Your PayakApps Subscription has expired.</h2>";
		        $body .= "<p>Your account is past due.</p>";

		    	break;

		    case 8: // remind about payment issue
		        $body = "<h2>Your PayakApps Subscription has expired.</h2>";
		        $body .= "<p>Your account is past due.</p>";

		        break;

	        case 15: // danger of suspension
	        case 22: //
	        	$body = "<h2>Your PayakApps Subscription has expired.</h2>";
		        $body .= "<p>Your account is past due.</p>";

		        break;

		    case 30: // subscription has been suspended
		    	$body = "<h2>Your PayakApps Subscription has expired.</h2>";
		        $body .= "<p>Your account is past due.</p>";

		        break;

		    case 35: // 
		    case 42: // advise them their subscription remains suspended
		    case 49: //
		    case 60: //
		    	$body = "<h2>Your PayakApps Subscription has expired.</h2>";
		        $body .= "<p>Your account is past due.</p>";

		        break;
    	}

    	$data = [
        	'subject' => $subject,
        	'body'	  => $body
        ];

        return $data;
	}


	public function subscription_reactivated($keyId) {

		$subject = 'Payakapps Password Reset';

		$body = "<h2>Password reset instructions</h2>";
		$body .= "<p>Your subscription has been reactivated</p>";
		

		$data = [
			'subject' 	=> $subject,
			'body'		=> $body
		];

		return $data;
	}
}