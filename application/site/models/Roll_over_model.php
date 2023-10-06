<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Roll_over_model extends CI_Model{
	private $tbl_name = 'teachers';
	
	
	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
   function update($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update('users',$data);
		return $q;
	}
	
	function studentInfo($params){
		
		$this->db->select('*');
		$this->db->from("student_academic_details");
		$this->db->where("sd_academic_year", $params['academic_year']);
		$this->db->where("sd_class_id", $params['class_id']);
		$this->db->where("sd_school_id", $params['school_id']);
		/* $this->db->where("sd_section_id", $params['section_id']); */
		$q = $this->db->get();
		
		$num = $q->num_rows();
		$data='';
		if($num >= 1){
			$data=$q->result_array();
			$data = $data;	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	
	
	function isMobileExists($mobile){		
		return  $this->db->where('mobile',$mobile)->get($this->tbl_name)->result();			
	}
	
	
	
	
}
?>