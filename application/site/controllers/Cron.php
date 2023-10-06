<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller { 
   public function __construct() 
    {
        header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
		header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
		header ("Cache-Control: no-cache, must-revalidate");  
		header ("Pragma: no-cache");
        parent::__construct();	
		date_default_timezone_set('Asia/Kolkata');		
		$this->load->model('Admin_model');
    }
	
	
	
	public function index(){
		$fromdate = date('Y-m-d');
		
		$datebefore2days = date("Y-m-d", strtotime("-2 day"));
		
		
		$sql = 'SELECT * FROM `trial_and_mentoring` WHERE date(created_at)>="'.$datebefore2days.'" AND date(created_at)<="'.$fromdate.'" and status="1" and  feedback!= 2 and  feedback!= 1';
		$q = $this->db->query($sql);
		$res= $q->result_array();
		
		foreach($res as $row){
			
			$this->db->set(array('feedback' => '2'));
			$this->db->where(array('id' => $row['id']));
			$result = $this->db->update('trial_and_mentoring');
			
			if($result){
				$subject='RainbowFish - Escalation  Mail';	
						$html="<html>
							<body>
								<p> Dear ,<br>
								<p>Please click the below link to set a new password
								<a href='".base_url('forgotpwd/pwdactivate')."'>Click here to get a new password</a>
							<p>Thanks & Regards ,<br> RainbowFish</p>		
							</body>
						</html>";
						
				$res = $this->Admin_model->getassignedMentors($row['school_id']);
				
				if($res['num'] >0){
					foreach($res['data'] as $r){
						$insertData['non_xss'] = array(			
						'notifications'=>'Artwork Uploaded',
						'notification_type'=>'new_artwork',
						'school_id'=>$row['school_id'],
						'notification_root_id'=>$row['id'],
						'view_link'=>'view_artwork/'.$row['id'],
						'user_id'=>$r->id,
					);
					$n = $this->db->insert('notifications',$insertData['non_xss']);
					$email = $r->email;
					$e = $this->comm_fun->send_mail($email,$subject,$html);
					print_r($e);
					}
				}
					  
			}
			
			
		}
		
	}
}
	
	
?>