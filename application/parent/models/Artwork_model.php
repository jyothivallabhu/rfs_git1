<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Artwork_model extends CI_Model{
	private $tbl_name 		= ' artwork';
	private $tbl_users 		= 'users';
	private $tbl_comments 	= 'comments';
	
	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
   function update($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
	}
	
	function artworkInfo($id){
		$this->db->select('a.id,l.lesson_id,l.lesson_name, s.first_name, s.last_name, c.class_name,c.c_id,sec.section_name, a.*');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->join('users as u', 'u.id = a.added_by');
		$this->db->join('students as s', 'a.student_id = s.student_id');
		$this->db->join('student_academic_details as sd', 'sd.sd_id = s.student_id');
		$this->db->join('classes as c', 'sd.sd_class_id = c.c_id');
		$this->db->join('sections as sec', 'sd.sd_section_id = sec.section_id');
		$this->db->where('a.id', $id);
		$this->db->group_by('a.id');
		
		
		$q = $this->db->get("$this->tbl_name as a");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->row();
		}
		return array('num' => $num, 'data' => $data);
		
	}
	function artworkInfoByStudentLessonId($id,$lid){
		$this->db->select('a.id,l.lesson_id,l.lesson_name, s.first_name, s.last_name, c.class_name,sec.section_name, a.*');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->join('users as u', 'u.id = a.added_by');
		$this->db->join('students as s', 's.parent_id = u.id');
		$this->db->join('student_academic_details as sd', 'sd.sd_id = s.student_id');
		$this->db->join('academic_year as ay','ay.id = sd.sd_academic_year');
		$this->db->join('classes as c', 'sd.sd_class_id = c.c_id');
		$this->db->join('sections as sec', 'sd.sd_section_id = sec.section_id');
		$this->db->where('s.student_id', $id);
		$this->db->where('a.lesson_id', $lid);
		$this->db->where('a.status', 1);
		$this->db->where('a.is_del', 0);
		$this->db->where('ay.name', 'currrent_year');
		$this->db->group_by('a.id');
		$q = $this->db->get("$this->tbl_name as a");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->row();
		}
		return array('num' => $num, 'data' => $data);
		
	}
	
	
	function getAllArtWorks($id){
		$this->db->select('l.lesson_id,l.lesson_name,a.*,concat(s.first_name, " ", s.last_name) as student_name, c.class_name,sec.section_name');
		$this->db->join('classes as c', 'c.c_id = a.class_id');
		$this->db->join('sections as sec', 'sec.section_id = a.section_id');
		$this->db->join('students as s', 's.student_id = a.student_id');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->where('a.added_by', $id);
		$this->db->where('a.status', 1);
		$this->db->where('a.is_del', 0);
		$q = $this->db->get("$this->tbl_name as a");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	
	function getAllStudentArtWorks($params = array()){
		 $this->db->select('l.lesson_id,l.lesson_name,a.*,concat(s.first_name, " ", s.last_name) as student_name, c.class_name,sec.section_name');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->join('students as s', 's.student_id = a.student_id');
		$this->db->join('student_academic_details as sa','sa.sd_student_id = s.student_id');
		$this->db->join('classes as c', 'c.c_id = a.class_id');
		$this->db->join('sections as sec', 'sec.section_id = a.section_id');
		$this->db->join('academic_year as ay','ay.id = a.academic_year');
		
		$this->db->where('a.status', 1);
		$this->db->where('a.is_del', 0);
        
		$this->db->where('s.status','1');
		$this->db->where('s.is_del','0');
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('a_id',$params['sortby']);
			}
			
			if(!empty($params['student_id']) && $params['student_id'] != "undefined" && $params['student_id'] != "" ){
				$this->db->where('a.student_id',$params['student_id']);
			}
			if(!empty($params['academic_year']) && $params['academic_year'] != "undefined" ){
				$this->db->where('a.academic_year',$params['academic_year']);
			}else{
				$this->db->where("ay.name", 'currrent_year');
			}
			
			$this->db->group_by("a.id");
			
			
			if(isset($params['c_id']) && $params['c_id'] != "undefined" && $params['c_id'] !=''){
				$this->db->where('c.c_id',$params['c_id']);
			}
			if(isset($params['lesson_id']) && $params['lesson_id'] != "undefined" && $params['lesson_id'] !=''){
				$this->db->where('l.lesson_id',$params['lesson_id']);
			}
			if(isset($params['request_from']) && $params['request_from'] != "undefined" && $params['request_from'] =='classportfolio'){
				
			}else{
				$this->db->where('a.added_by', $this->uid);
			}
			
			
			
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			}
			
			/* get records */
			$query = $this->db->get("$this->tbl_name as a");
			
		 /* echo $this->db->last_query(); */  
			
			/* //return fetched data */
			$data = ($query->num_rows() > 0)?$query->result_array():FALSE;
			if($data){
				
				$data = json_decode(json_encode($data), FALSE);
				return $data;
			}else{
				return FALSE;
			}
	}
	
	function getclassArtWorks($id){
		$this->db->select('l.lesson_id,l.lesson_name,a.*,concat(s.first_name, " ", s.last_name) as student_name, c.class_name,sec.section_name');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->join('classes as c', 'c.c_id = a.class_id');
		$this->db->join('sections as sec', 'sec.section_id = a.section_id');
		$this->db->join('students as s', 's.student_id = a.student_id');
		$this->db->where('a.class_id', $id);
		$this->db->where('a.is_del', 0);
		$q = $this->db->get("$this->tbl_name as a");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
		function getcomments($id){
		$this->db->select('c.feedback, case when (from_user.profile_pic is null or from_user.profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.BASE_URLPATH.'",from_user.profile_pic) end as "from_user_image_path", case when (to_user.profile_pic is null or to_user.profile_pic = "") then "'.BASE_URLPATH.'assets/images/user.png" else concat("'.base_url().'",to_user.profile_pic) end as "to_user_image_path",concat(from_user.first_name," ", from_user.last_name) as from_username ,concat(to_user.first_name," ", to_user.last_name) as to_username, c.created_at  ');
		$this->db->join($this->tbl_users.' as from_user', 'c.from_id = from_user.id');
		$this->db->join($this->tbl_users.' as to_user', 'c.to_id = to_user.id');
		$this->db->where('c.artwork_id', $id);
		$this->db->where('c.is_del', 0);
		$q = $this->db->get("artwork_feedback as c");
		
		$num = $num = $q->num_rows();
		$data = "";
		if($num>0){
			$data=$q->result_array();
			$data = $data;	
		}
		return array('num' => $num, 'data' => $data);	
	}
	
	
}
?>