<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teacher_trial_model extends CI_Model{
	private $tbl_classes			= 'classes';
	private $tbl_sections			= 'sections';
	private $tbl_name 				= 'trial_and_mentoring';
	private $tbl_lessons 			= 'lessons';
	private $tbl_schedules 			= 'lesson_schedule';
	private $tbl_lessons_assigned 	= 'lessons_assigned';
	private $tbl_sections_assigned 	= 'teacher_sections_assigned';
	private $tbl_comments 			= 'comments';
	private $tbl_users 				= 'users';
	
	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
   function update($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
	}
	
	function getClassesassigned($id){
		$this->db->select('c.*');
		$this->db->join($this->tbl_sections.' as s', 's.class_id = c.c_id');
		$this->db->join($this->tbl_sections_assigned.' as ts', ' FIND_IN_SET(s.section_id,ts.section_ids) > 0');
		$this->db->where('ts.teacher_id', $id);
		$this->db->where('c.is_del', 0);
		$this->db->group_by('ts.id');
		$q = $this->db->get("$this->tbl_classes as c");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	
	function getSchoolLessons($sid){
		$this->db->select('l.lesson_id , l.lesson_name');
		$this->db->join($this->tbl_schedules.' as ls', 'l.lesson_id = ls.lesson_id');
		$this->db->where('ls.school_id', $sid);
		$this->db->where('l.is_del', 0);
		$this->db->group_by('ls.id');
		$q = $this->db->get("$this->tbl_lessons as l");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	function getAlltrial_and_mentoring($sid){
		$this->db->select('l.lesson_id , l.lesson_name');
		$this->db->join($this->tbl_schedules.' as ls', 'l.lesson_id = ls.lesson_id');
		$this->db->where('ls.school_id', $sid);
		$this->db->where('l.is_del', 0);
		$q = $this->db->get("$this->tbl_lessons as l");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	
	function getassignedclassandlessons($params = array()){
			$this->db->select('c.c_id,c.class_name,l.lesson_id,l.lesson_name');
            $this->db->from('teacher_sections_assigned ts');
			$this->db->join('lessons_assigned as ls', 'ls.class_id = ts.class_id');
			$this->db->join('classes as c', 'c.c_id = ls.class_id');
			$this->db->join('lessons as l', 'l.lesson_id = ls.lesson_id');
			$this->db->where('ts.teacher_id', $this->uid);
			$this->db->group_by('ls.id'); 
		
			
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(isset($params['class_id']) && !empty($params['class_id']) && $params['class_id'] != "undefined" ){
				$this->db->where('ls.class_id',$params['class_id']);
			}
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('ls.id',$params['sortby']);
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
	
	
	function getAlltrialAndMentoring($params = array()){
		
			$this->db->select('*');
            $this->db->from('lessons');
			
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('lesson_id',$params['sortby']);
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
	
	function getInfo($id){
		$this->db->select('tm.*, case when (image1 is null or image1 = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",image1) end as "image_path", case when (reference_image is null or reference_image = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",reference_image) end as "reference_image", c.c_id,c.class_name as class_name,l.lesson_id,l.lesson_name, sec.section_id, sec.section_name');
		$this->db->join($this->tbl_lessons.' as l', 'tm.lesson_id = l.lesson_id');
		$this->db->join($this->tbl_classes.' as c', 'c.c_id = tm.class_id' ,'left');
		$this->db->join($this->tbl_sections.' as sec', 'sec.section_id = tm.section_id' ,'left');
		$this->db->where('tm.id', $id);
		$this->db->where('l.is_del', 0);
		$q = $this->db->get("$this->tbl_name as tm");
		$num = $num = $q->num_rows();
		$data = "";
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num' => $num, 'data' => $data);	
	}
	
	
		function getMonthlyInfo($id){
		$this->db->select('tm.* ,  s.id,s.name as school_name'); 
		$this->db->join( ' schools as s', 's.id = tm.school_id');
		$this->db->where('tm.id', $id);
		$this->db->where('s.is_del', 0);
		$q = $this->db->get("$this->tbl_name as tm");
		$num = $num = $q->num_rows();
		$data = "";
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num' => $num, 'data' => $data);	
	}
	
	
	
	function getcomments($id){
		$this->db->select('c.comments, case when (from_user.profile_pic is null or from_user.profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",from_user.profile_pic) end as "from_user_image_path", case when (to_user.profile_pic is null or to_user.profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",to_user.profile_pic) end as "to_user_image_path",concat(from_user.first_name," ", from_user.last_name) as from_username ,concat(to_user.first_name," ", to_user.last_name) as to_username, c.created_at  ');
		$this->db->join($this->tbl_users.' as from_user', 'c.from_id = from_user.id');
		$this->db->join($this->tbl_users.' as to_user', 'c.to_id = to_user.id');
		$this->db->where('c.trial_and_mentoring_id', $id);
		$this->db->where('c.is_del', 0);
		$q = $this->db->get("$this->tbl_comments as c");
		
		$num = $num = $q->num_rows();
		$data = "";
		if($num>0){
			$data=$q->result_array();
			$data = $data;	
		}
		return array('num' => $num, 'data' => $data);	
	}
	
	
	function getAllmentoring($params = array()){
		
			$this->db->select('tm.*, case when (image1 is null or image1 = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",image1) end as "image_path",c.class_name as class_name,l.lesson_name,sec.section_name');
            $this->db->from('trial_and_mentoring as tm');
			$this->db->join('classes as c', 'c.c_id = tm.class_id');
			$this->db->join('sections as sec', 'sec.section_id = tm.section_id','left');
			$this->db->join('lessons as l', 'tm.lesson_id = l.lesson_id');
			$this->db->where('tm.is_del', '0');
			$this->db->where('tm.type', $params['type']);
			
			$this->db->where('tm.added_by', $this->uid);

			/* $select = 'tm.*,concat(u.first_name ," ", u.last_name) as teacher_name,s.name as school_name,l.lesson_name,c.class_name';
		$column = array('name');
		$order = array('tm.id' => 'desc');
		$where=" sm.mentor_id = '$this->uid' AND tm.type = 'monthlymentoring' and tm.is_del = 0 ";
		$join = array();
		$join[] = array('table_name'=>'school_mentors as sm','on'=>'sm.school_id = tm.school_id');
		$join[] = array('table_name'=>'schools as s','on'=>'s.id=tm.school_id');
		$join[] = array('table_name'=>'classes as c','on'=>'c.c_id = tm.class_id');
		$join[] = array('table_name'=>'users as u','on'=>'u.id = tm.added_by');
		$join[] = array('table_name'=>'lessons as l','on'=>'l.lesson_id = tm.lesson_id');
		$tb_name = 'trial_and_mentoring as tm'; */
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(isset($params['class_id']) && $params['class_id'] != "undefined" ){
				$this->db->where('tm.class_id',$params['class_id']);
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
	
	function getAllmonthlymentoring($params = array()){
			$this->db->select('tm.*, concat(u.first_name ," ", u.last_name) as mentor_name,case when (image1 is null or image1 = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",image1) end as "image_path",c.class_name as class_name,l.lesson_name,l.final_artwork , case when (reference_image is null or reference_image = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",reference_image) end as "reference_image"');
            $this->db->from('trial_and_mentoring as tm');
			$this->db->join('classes as c', 'c.c_id = tm.class_id');
			$this->db->join('teacher_sections_assigned as ts', 'ts.class_id=tm.class_id');
			$this->db->join('schools as s', 's.id=tm.school_id');
			$this->db->join('lessons as l', 'tm.lesson_id = l.lesson_id');
			$this->db->join('users as u', 'u.id = tm.added_by');
			$this->db->where('tm.is_del', '0');
			$this->db->where('tm.type', 'monthlymentoring');
			$this->db->where('s.id', $this->school_id);
			$this->db->group_by('tm.id');
			
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(isset($params['class_id']) && $params['class_id'] != "undefined" && $params['class_id'] != ""){
				$this->db->where('tm.class_id',$params['class_id']);
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
	
		function getAllmonthlymentoringNew($params = array()){
			$this->db->select('tm.*,  s.name as school_name');
            $this->db->from('trial_and_mentoring as tm');  
			$this->db->join('schools as s', 's.id=tm.school_id'); 
			$this->db->join('users as u', 'u.id = tm.added_by');
			$this->db->where('tm.is_del', '0');
			$this->db->where('tm.type', 'monthlymentoring');
			$this->db->where('s.id', $this->school_id);
			$this->db->group_by('tm.id');
			
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(isset($params['class_id']) && $params['class_id'] != "undefined" && $params['class_id'] != ""){
				$this->db->where('tm.class_id',$params['class_id']);
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