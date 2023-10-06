<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teacher_students_model extends CI_Model{
	private $tbl_name 				= ' students';
	private $tbl_lessons 			= ' lessons';
	private $tbl_schedules 			= ' lesson_schedule';
	private $tbl_lessons_assigned 	= ' lessons_assigned';
	private $tbl_sections_assigned 	= ' teacher_sections_assigned';
	
	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
   function update($data,$id){
		$this->db->where('student_id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
	}
	
	function getstudentscount($sec_id){
		$this->db->select(" COUNT(*) as total_students");
        $this->db->from($this->tbl_name." as s");
		$this->db->join('student_academic_details as sa ON s.student_id = sa.sd_student_id');
        $this->db->where("sa.sd_section_id ", $sec_id);
        $query = $this->db->get();
		/* echo $this->db->last_query(); */
        $data = $query->result();
        return $data;
		
	}
	/* ON FIND_IN_SET(b.id, a.forDepts) > 0
	
	function getAssignedLessons($id){
		$this->db->select('l.lesson_id,l.lesson_name,a.*');
		$this->db->join($this->tbl_schedules.' as ls', 'l.lesson_id = a.lesson_id');
		$this->db->join($this->tbl_lessons_assigned.' as la', 'la.lesson_id = l.lesson_id');
		$this->db->join($this->tbl_sections_assigned.' as ts', 'ON FIND_IN_SET(ts.id, la.lesson_id) > 0');
		$this->db->where('a.added_by', $id);
		$q = $this->db->get("$this->tbl_lessons as a");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	} */
	
	
	public function getAassignedSections($params = array())
    {
		/* $this->db->join('sections as s','FIND_IN_SET(s.section_id, sa.section_ids) > 0'); */
        $this->db->select(" c.class_name,s.section_name,s.section_id");
        $this->db->from($this->tbl_sections_assigned." as sa");
		$this->db->join('sections as s','s.section_id = sa.section_ids');
		$this->db->join('classes as c','c.c_id = sa.class_id');
        $this->db->where("sa.teacher_id", $this->uid);
      
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (first_name LIKE '%".$params['search_text']."%'   ");
			} 
			
		if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
			$this->db->order_by('id',$params['sortby']);
		}
		
		if(!empty($params['class_id']) && $params['class_id'] != "all" ){
			 $this->db->where("sa.class_id", $params['class_id']);
		}
		
		
		/* if(!empty($params['academic_year']) && $params['academic_year'] != "undefined" ){
			$this->db->where(" s.academic_year", $params['academic_year']);
		}else{
			$this->db->where("a.name", 'currrent_year');
			} */
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
   
	public function getAassignedLessons($params = array())
    {
		$this->db->select('l.*,c.class_name,a.id as lesson_assignId');
		$this->db->from('lessons as l');
	   
		$this->db->where("a.is_del", '0');
		
		$this->db->where("a.school_id", $params['school_id']);
		$this->db->join('lessons_assigned as a','a.lesson_id = l.lesson_id'); 
		$this->db->join('classes as c','c.c_id = a.class_id'); 
		$this->db->join('teacher_sections_assigned as ts', 'ts.class_id = c.c_id');
		$this->db->where("l.status", 1 );
		$this->db->where("l.is_del", 0 );
		$this->db->where("ts.teacher_id", $this->uid );
		$this->db->group_by('a.lesson_id');
		
		 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
			$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'   ");
			$this->db->or_where(" medium LIKE '%".$params['search_text']."%' )  ");
		} 
		if(!empty($params['class_id']) && $params['class_id'] != "undefined"  && $params['class_id'] != ""){
			$this->db->where("a.class_id", $params['class_id']);
		} 
			
		if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
			$this->db->order_by('c.c_id',$params['sortby']);
		}
		/* if(!empty($params['academic_year']) && $params['academic_year'] != "undefined" ){
			$this->db->where(" s.academic_year", $params['academic_year']);
		}else{
			$this->db->where("a.name", 'currrent_year');
			} */
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
   
	
	
	
	function getAassignedSections1($params = array()){
		
		$this->db->select(" GROUP_CONCAT(CONCAT(c.class_name, ' -', CAST(s.section_name AS CHAR(15)), ' -', CAST(s.section_id AS CHAR(15)), '') SEPARATOR ', ') as sections");
        $this->db->from($this->tbl_sections_assigned." as sa");
		$this->db->join('sections as s','FIND_IN_SET(s.section_id, sa.section_ids) > 0');
		$this->db->join('classes as c','c.c_id = s.class_id');
        $this->db->where("sa.teacher_id", $this->uid);
		
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (first_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" last_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" email LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" phone LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('id',$params['sortby']);
			}
			
			
			/* if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			} */
			
			/* get records */
			$query = $this->db->get();
			/*  echo $this->db->last_query(); exit; */
			/* //return fetched data */
			$data = ($query->num_rows() > 0)?$query->result_array():FALSE;
			if($data){
				
				$data = json_decode(json_encode($data), FALSE);
				return $data;
			}else{
				return FALSE;
			}
	}
	
	
	/*Teacher Artwork_model
	getSectionStudentsCount*/
	
}
?>