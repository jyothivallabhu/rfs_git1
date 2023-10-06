<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mentor_model extends CI_Model{
	private $tbl_classes			= 'classes';
	private $tbl_sections			= 'sections';
	private $tbl_name 				= 'trial_and_mentoring';
	private $tbl_lessons 			= 'lessons';
	private $tbl_schedules 			= 'lesson_schedule';
	private $tbl_lessons_assigned 	= 'lessons_assigned';
	private $tbl_sections_assigned 	= 'teacher_sections_assigned';
	private $tbl_comments 			= 'comments';
	private $tbl_users 				= 'users';
	private $tbl_schools			= 'schools';
	
	
	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
   function update($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
	}
	
	
	function getInfo($id){
		$this->db->select('tm.*, case when (image1 is null or image1 = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",image1) end as "image_path",c.c_id,c.class_name as class_name,l.lesson_id,l.lesson_name,s.name as school_name, sec.section_id, sec.section_name');
		$this->db->join($this->tbl_lessons.' as l', 'tm.lesson_id = l.lesson_id');
		$this->db->join($this->tbl_classes.' as c', 'c.c_id = tm.class_id' , "left");
		$this->db->join($this->tbl_sections.' as sec', 'sec.section_id = tm.section_id', "left");
		$this->db->join($this->tbl_schools.' as s', 's.id = tm.school_id');
		$this->db->where('tm.id', $id);
		$this->db->where('tm.is_del', 0);
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
	
	function getAssignedSchools(){
		$this->db->select('s.id,s.name as school_name');
		$this->db->join('school_mentors as sm ', 's.id=sm.school_id');
		$this->db->join($this->tbl_users.' as u', 'u.id = sm.mentor_id');
		$this->db->where('u.id', $this->uid);
		$this->db->where('s.is_del', 0);
		$q = $this->db->get("schools as s");
		
		$num = $num = $q->num_rows();
		$data = "";
		if($num>0){
			$data=$q->result_array();
			$data = $data;	
		}
		return array('num' => $num, 'data' => $data);	
	}
	
	function getClassesBySchool($id){
		$this->db->select('c.c_id,c.class_name');
		$this->db->join('classes c', 'c.c_id = la.class_id');
		$this->db->where('la.school_id', $id);
		$this->db->group_by('la.class_id');
		//$this->db->where('academic_year', 2);
		$q = $this->db->get("lessons_assigned la");
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	function getLessonsByclass($id){
		$this->db->select('l.lesson_id,l.lesson_name');
		$this->db->join('lessons l', 'l.lesson_id = la.lesson_id');
		$this->db->where('la.class_id', $id);
		$this->db->where('l.is_del', 0);
		$this->db->where('l.status', 1);
		$this->db->where('la.status', 1);
		$this->db->where('la.is_del', 0);
		$q = $this->db->get("lessons_assigned la");
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	
}
?>