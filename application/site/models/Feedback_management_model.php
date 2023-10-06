<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Feedback_management_model extends CI_Model{
	private $tbl_name = ' artwork';
	private $lessons_assigned = ' lessons_assigned';
	
	
	function getAllLessons($id){
		$this->db->select('*');
		$this->db->where('lesson_id', $id);
		$q = $this->db->get("$this->tbl_name");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	
	function getAllLessonsassigned($school_id){
		$this->db->select('l.lesson_name,l.lesson_id');
		$this->db->join($this->lessons_assigned.' as la', 'la.lesson_id = l.lesson_id');
		$this->db->where('la.school_id', $school_id);
		$this->db->group_by('l.lesson_id');
		$q = $this->db->get("lessons as l ");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	
	
	function getSchoolArtwork($params = array()){
		
			$this->db->select('a.id,l.lesson_id,l.lesson_name,c.c_id, c.class_name,sec.section_id,sec.section_name,concat(s.first_name," ",s.last_name ) as student_name,s.school_id, case when (artwork_upload is null or artwork_upload = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url('parent/').'",artwork_upload) end as "image_path", a.*');
			$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
			$this->db->join('classes as c', 'a.class_id = c.c_id');
			$this->db->join('sections as sec', 'a.section_id = sec.section_id');
			$this->db->join('students as s', 'a.student_id = s.student_id');
			$this->db->where('c.school_id', $params['school_id']);
			$this->db->where('a.is_del', 0);
			$this->db->group_by('a.id');
			$this->db->from('artwork a');
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (s.first_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" s.last_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" l.lesson_name LIKE '%".$params['search_text']."%' )  ");
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('a.id',$params['sortby']);
			}
			if(!empty($params['class_id']) && $params['class_id'] != "undefined" ){
				$this->db->where('a.class_id', $params['class_id']);
			}
			if(!empty($params['lesson_id']) && $params['lesson_id'] != "undefined" ){
				$this->db->where('a.lesson_id', $params['lesson_id']);
			}
			
			
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			}
			
			/* get records */
			$query = $this->db->get();
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
	
	function getArtWorksByID($id){
		$this->db->select('a.id,l.lesson_id,l.lesson_name, s.first_name, s.last_name, c.class_name,sec.section_name, a.*');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->join('users as u', 'u.id = a.added_by');
		$this->db->join('students as s', 's.parent_id = u.id');
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
	
	function trial_and_mentoring($params = array()){
			$this->db->select('tm.*, case when (image1 is null or image1 = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",image1) end as "image_path",c.class_name as class_name,l.lesson_name, concat(u.first_name," ",u.last_name) as teacher_name');
            $this->db->from('trial_and_mentoring as tm');
			$this->db->join('classes as c', 'c.c_id = tm.class_id');
			$this->db->join('lessons as l', 'tm.lesson_id = l.lesson_id');
			$this->db->join('users as u', 'u.id = tm.added_by');
			$this->db->where('tm.is_del', '0');
			$this->db->where('tm.type', $params['type']);
			
			$this->db->where('tm.school_id', $params['school_id']);
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(isset($params['class_id']) && $params['class_id'] != "" ){
				$this->db->where('tm.class_id',$params['class_id']);
			}
			
			if(isset($params['lesson_id']) && $params['lesson_id'] != "" ){
				$this->db->where('tm.lesson_id',$params['lesson_id']);
			}
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('tm.id',$params['sortby']);
			}
			
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			}
			
			/* get records */
			$query = $this->db->get();
			
			/* //return fetched data */
			$data = ($query->num_rows() > 0)?$query->result_array():FALSE;
			if($data){
				
				$data = json_decode(json_encode($data), FALSE);
				return $data;
			}else{
				return FALSE;
			}
		
    }

	
}
?>