<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
//require 'vendor/autoload.php';
class Comm_fun
{

	protected $CI;
	public function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI = &get_instance();
	
		
		//$this->load->library('email');
	}

	public function is_logged_in()
	{

		$is_logged_in = $this->CI->session->userdata('rfsparent_user_logged_in');

		if (isset($is_logged_in) && $is_logged_in == true) {
			redirect('Dashboard');
		}
	}


	function is_not_logged_in()
	{
		$is_logged_in = $this->CI->session->userdata('rfsparent_user_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			redirect('Login');
		}
	}

	function header_data(){
		$id = $this->CI->session->userdata('rfsparent_user_id');
		//print_r($id);exit;
		$CI =& get_instance();
		$CI->load->model('Login_model');
		$res = $CI->Login_model->getUser($id);
		/* print_r($res); exit; */
		if($res['num']==1){
			$sd = $res['data'][0]['color_code'];			
			
		}
		return $sd;
	}

	function sendEMAIL($to, $subject, $content)
	{
		// If you are not using Composer
		// require("vendor/sendgrid/sendgrid/sendgrid-php.php");
		$from = new SendGrid\Email("Plout.com", "admin@plout.com");
		/* $subject = "Account activation mail "; */
		$to = new SendGrid\Email("Example User", $to);
		$content = new SendGrid\Content("text/html", $content);
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = "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";
		//print_r($apiKey);exit;
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->mail()->send()->post($mail);
		//echo $response->statusCode();
		//print_r($response->headers());
		//echo $response->body();
	}
	
	function send_mail($to,$subject,$message){

		require_once (APPPATH . 'third_party/vendor/autoload.php');

       $credentials = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
        $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(),$credentials);

        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
             'subject' => $subject,
             'sender' => ['name' => 'Info', 'email' => 'no-reply@rainbowfishstudio.com'],
             'replyTo' => ['name' => 'Info', 'email' => 'no-reply@rainbowfishstudio.com'],
             'to' => [[ 'name' => 'User', 'email' => $to]],
             'htmlContent' => $message,
             'params' => ['bodyMessage' => 'made just for you!']
        ]);

       
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
          /*  print_r($result); */


    }
	
	
	function send_mail_mailgun($email,  $subject, $htmlContent)	{	
	$mailgun = [			'apiKey' => '826aca90ff45534807e89e2445ffda0d-1b3a03f6-175dd82e',			'domain' => 'mg.apexc.io',		];	   		$ch = curl_init();	   		curl_setopt( $ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );		curl_setopt( $ch, CURLOPT_USERPWD, "api:{$mailgun['apiKey']}" );		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );	   		curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );		curl_setopt( $ch, CURLOPT_URL, "https://api.mailgun.net/v3/{$mailgun['domain']}/messages" );		curl_setopt( $ch, CURLOPT_POSTFIELDS,			[				'from' => "Apex <info@{$mailgun['domain']}>",				'to' => $email,				'subject' => $subject,				'html' => $htmlContent,			]		);	   		return $result = curl_exec( $ch );		curl_close( $ch );	}	
	function onlyAdminAccess()
	{
		$is_admin = $this->CI->session->userdata('infiniqo_user_role');

		if (isset($is_admin) && $is_admin != 'ADMIN') {
			$this->CI->session->set_flashdata('invalid', warning_msg('Invalid access'));
			redirect('dashboard');
		}
	}
	function eligible_user($dept)
	{
		$user_dept = strtolower($this->CI->session->userdata('infiniqo_user_department_name'));

		if ($user_dept != $dept) {
			$this->CI->session->set_flashdata('invalid', warning_msg('Invalid Access'));
			redirect('dashboard');
		}
	}
}
