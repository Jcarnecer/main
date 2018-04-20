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

        $body = "<h2>Your PayakApps Subscription has expired.</h2>";
        $body .= "<p>Your account is past due.</p>";

        $data = [
        	'subject' => $subject,
        	'body'	  => $body
        ];

        return $data;
	}
}