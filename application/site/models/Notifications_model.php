<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notifications_model extends CI_Model{
	private $tbl_name = 'teachers';
	
	
	
	public function getNotificationList()
    {
        $this->db->select('*');
        $this->db->from("notifications");
        /* $this->db->where("seen", 0);  */
        $this->db->where("user_id", $this->uid);
		$this->db->order_by('note_id','desc');
        $q = $this->db->get();
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
		
    }
	public function getUnseenNotificationCount()
    {
        $this->db->select('*');
        $this->db->from("notifications");
        $this->db->where("seen", 0); 
        $this->db->where("user_id", $this->uid);

        $q = $this->db->get();
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
		
    }
	
	
	
}
?>