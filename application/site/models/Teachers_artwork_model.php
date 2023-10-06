<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teachers_artwork_model extends CI_Model{
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
		$this->db->select('l.*');
		$this->db->where('l.school_id', $school_id);
		$q = $this->db->get("$this->lessons_assigned as l");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	function getSectionsByclassandlessons($params = array()){
			/* $this->db->select('c.c_id,c.class_name,sec.section_id,sec.section_name,l.lesson_id,l.lesson_name');
            $this->db->from('teacher_sections_assigned ts');
			$this->db->join('lessons_assigned as ls', 'ls.class_id = ts.class_id');
			$this->db->join('classes as c', 'c.c_id = ls.class_id');
			$this->db->join('sections as sec', 'c.c_id = sec.class_id');
			$this->db->join('lessons as l', 'l.lesson_id = ls.lesson_id');
			$this->db->where('ls.class_id', $params['class_id']);
			$this->db->where('ls.lesson_id', $params['lesson_id']);
			$this->db->group_by('sec.section_id'); */
			
			$this->db->select('c.c_id,c.class_name,sec.section_id,sec.section_name,l.lesson_id,l.lesson_name');
            $this->db->from('teacher_sections_assigned ts');
			$this->db->join('lessons_assigned as ls', 'ls.class_id = ts.class_id');
			$this->db->join('classes as c', 'c.c_id = ls.class_id');
			$this->db->join('sections as sec', 'c.c_id = sec.class_id');
			$this->db->join('lessons as l', 'l.lesson_id = ls.lesson_id');
			$this->db->where('ts.teacher_id', $this->uid);
			/* $this->db->group_by('sec.section_id'); */
			
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			/* if(isset($params['class_id']) && $params['class_id'] != "undefined" ){
				$this->db->where('ls.class_id',$params['class_id']);
			} */
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('c_id',$params['sortby']);
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
	
	function getassignedclassandlessons($params = array()){
		
		/* SELECT * FROM teacher_sections_assigned ts JOIN sections s ON s.section_id = ts.section_ids JOIN classes c ON c.c_id = s.class_id JOIN lessons_assigned ls ON ls.class_id = c.c_id JOIN lessons l ON l.lesson_id= ls.lesson_id  WHERE teacher_id = 23  , sec.section_name, sec.section_id*/
		
			$this->db->select('c.c_id, c.class_name, s.section_name, s.section_id, l.lesson_id, l.lesson_name');
            $this->db->from('teacher_sections_assigned ts');  
			 $this->db->join('sections as s', 's.section_id = ts.section_ids');
			$this->db->join('classes as c', 'c.c_id = s.class_id');
			$this->db->join('lessons_assigned as ls', 'ls.class_id = c.c_id');
			$this->db->join('lessons as l', 'l.lesson_id = ls.lesson_id');
			$this->db->where('ts.teacher_id', $this->uid);
			$this->db->where('c.status', 1);
			$this->db->where('c.is_del', 0);
			$this->db->where('s.status', 1);
			$this->db->where('s.is_del', 0);
			$this->db->where('ls.status', 1);
			$this->db->where('ls.is_del', 0);
			$this->db->where('l.status', 1);
			$this->db->where('l.is_del', 0);
			
			
			/* $this->db->group_by('ts.id');  */
			
			
		
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(!empty($params['lesson_id']) && $params['lesson_id'] != "undefined" ){
				$this->db->where('ls.lesson_id',$params['lesson_id']);
			}
			if(!empty($params['class_id']) && $params['class_id'] != "undefined" ){
				$this->db->where('ls.class_id',$params['class_id']);
			}
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('c.c_id',$params['sortby']);
			}
			
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			}
			
			/* get records */
			$query = $this->db->get();
			/*  echo $this->db->last_query();  */
			/* //return fetched data */
			$data = ($query->num_rows() > 0)?$query->result_array():FALSE;
			if($data){
				
				$data = json_decode(json_encode($data), FALSE);
				return $data;
			}else{
				return FALSE;
			}
		
    }
	
	function getAllArtWorks($params = array()){
		
			$this->db->select('a.id,l.lesson_id,l.lesson_name,c.c_id, c.class_name,sec.section_id,sec.section_name,s.first_name, s.last_name, a.*,af.feedback as artwork_feedback,case when (artwork_upload is null or artwork_upload = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url('parent/').'",artwork_upload) end as "image_path"');
			$this->db->join('students as s', 'a.student_id = s.student_id');
			$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
			$this->db->join('classes as c', 'a.class_id = c.c_id');
			$this->db->join('sections as sec', 'a.section_id = sec.section_id');
			$this->db->join('artwork_feedback as af', 'af.artwork_id = a.id','LEFT');
			$this->db->where('a.is_del', 0);
			$this->db->group_by('a.id');
			$this->db->from('artwork a');
			$this->db->order_by('a.feedback','ASC');
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('lesson_id',$params['sortby']);
			}
			if(!empty($params['class_id']) && $params['class_id'] != "undefined" && $params['class_id'] != "" ){
				$this->db->where('a.class_id', $params['class_id']);
			}
			if(!empty($params['section_id']) && $params['section_id'] != "undefined" && $params['section_id'] != "" ){
				$this->db->where('a.section_id', $params['section_id']);
			}
			if(!empty($params['lesson_id']) && $params['lesson_id'] != "undefined" && $params['lesson_id'] != "" ){
				$this->db->where('a.lesson_id', $params['lesson_id']);
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
	
	/* function getAllArtWorks(){
		$this->db->select('a.id,l.lesson_id,l.lesson_name,c.c_id, c.class_name,sec.section_id,sec.section_name, a.*');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->join('classes as c', 'a.class_id = c.c_id');
		$this->db->join('sections as sec', 'a.section_id = sec.section_id');
		$this->db->where('a.is_del', 0);
		$this->db->group_by('a.section_id');
		$q = $this->db->get("$this->tbl_name as a");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	} */
	function getArtWorksByID($id){
		$this->db->select('a.id,l.lesson_id,l.lesson_name, s.first_name, s.last_name, c.class_name,sec.section_name, a.*');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->join('students as s', 's.student_id = a.student_id');
		$this->db->join('student_academic_details as sd', 'sd.sd_id = s.student_id');
		$this->db->join('classes as c', ' c.c_id = a.class_id');
		$this->db->join('sections as sec', ' sec.section_id = a.section_id');
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
	function getartworksCount($section_id,$lesson_id){
		 $this->db->select('COUNT(*) as total_lessons');
        $this->db->from("artwork");
        $this->db->where("section_id", $section_id);
        $this->db->where("lesson_id", $lesson_id);		 
        $this->db->where("is_del", 0);		 
        $query = $this->db->get();
        $data = $query->result();
        return $data;
	}
	function getArtworkByclassandlessons($params = array()){
		
		
		
		$this->db->select('a.id,l.lesson_id,l.lesson_name,c.c_id, c.class_name,sec.section_id,sec.section_name, a.*,concat(s.first_name, " ",s.last_name) as student_name');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->join('classes as c', 'a.class_id = c.c_id');
		$this->db->join('sections as sec', 'a.section_id = sec.section_id');
		$this->db->join('lessons_assigned as ls', 'ls.class_id = a.class_id');
		$this->db->join('students  as s', 's.student_id = a.student_id');
		
		if($this->role_id  == 10){
			$this->db->join('teacher_sections_assigned ts', 'sec.section_id = ts.section_ids');
			$this->db->where('ts.teacher_id', $this->uid);
		}else{
			$this->db->where('ls.school_id', $this->school_id);
		}
		
		$this->db->where('a.is_del', 0);
		
		if(!empty($params['lesson_id']) && $params['lesson_id'] != "undefined" ){
			$this->db->where('a.lesson_id',$params['lesson_id']);
		}
		if(!empty($params['class_id']) && $params['class_id'] != "undefined" ){
			$this->db->where('a.class_id',$params['class_id']);
		}
		$this->db->group_by('a.id');
		
		$q = $this->db->get("artwork a");
		
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
		
	
	}
	
	function getInfo($id){
		
		$this->db->select('a.*, case when (image1 is null or image1 = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",image1) end as "image_path",c.c_id,c.class_name as class_name,l.lesson_id,l.lesson_name');
		$this->db->join($this->tbl_lessons.' as l', 'a.lesson_id = l.lesson_id');
		$this->db->join($this->tbl_classes.' as c', 'c.c_id = a.class_id');
		$this->db->where('a.id', $id);
		$this->db->where('l.is_del', 0);
		$q = $this->db->get("artwork as a");
		$num = $num = $q->num_rows();
		$data = "";
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num' => $num, 'data' => $data);	
	}
	
	function getcomments($id){
		$this->db->select('c.feedback, case when (from_user.profile_pic is null or from_user.profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",from_user.profile_pic) end as "from_user_image_path", case when (to_user.profile_pic is null or to_user.profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",to_user.profile_pic) end as "to_user_image_path",concat(from_user.first_name," ", from_user.last_name) as from_username ,concat(to_user.first_name," ", to_user.last_name) as to_username, c.created_at  ');
		$this->db->join('users as from_user', 'c.from_id = from_user.id');
		$this->db->join('users as to_user', 'c.to_id = to_user.id');
		$this->db->where('c.artwork_id', $id);
		/* $this->db->where('c.from_id', $this->uid); */
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