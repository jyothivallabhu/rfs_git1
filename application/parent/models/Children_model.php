<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Children_model extends CI_Model{
	private $tbl_name = 'students';
	private $tbl_lessons = 'lessons';
	private $tbl_lessons_sch = 'lesson_schedule';
	
	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
   function update($data,$id){
		$this->db->where('student_id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
	}
	
	
	
	function isNameExists($name){		
		return  $this->db->where('cat_name',$name)->where('is_del',0)->get($this->tbl_name)->result();			
	}	
	function getClassIdBySectionId($section_id){		
		$this->db->select('*');
        $this->db->from("sections as s");
		$this->db->join('classes as c', 'c.c_id = s.class_id');
        $this->db->where("s.section_id", $section_id);
        $this->db->where("s.is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        return $data;			
	}	
	
	function getTeachersBySectionId($section_id){		
		$this->db->select('*,u.id as user_id');
        $this->db->from("teacher_sections_assigned as ts");
		$this->db->join('users as u', 'u.id = ts.teacher_id');
        $this->db->where("ts.section_ids", $section_id);
        $this->db->where("ts.is_del", '0');
		$this->db->join('academic_year as a', 'a.id = ts.academic_year');
        $this->db->where("a.name", 'currrent_year');
        $query = $this->db->get();
        $data = $query->result();
        return $data;			
	}	
	
	function getStudentAcademicDetails($student_id){		
		$this->db->select('*');
        $this->db->from("students as s");
		$this->db->join('student_academic_details as sa', 'sa.sd_student_id = s.student_id');
		$this->db->join('academic_year as a', 'a.id = sa.sd_academic_year');
        $this->db->where("a.name", 'currrent_year');
        $this->db->where("sa.student_id", $student_id);
        $this->db->where("sa.is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        return $data;			
	}	
	
	
	
	function getAllChildrenByParent($id){
		$this->db->select('s.*,c.c_id,c.class_name,sc.section_name,sc.section_id,sch.name as school_name,case when (photo is null or photo = "") then "'.BASE_URLPATH.'assets/images/user.png" else concat("'.BASE_URLPATH.'",photo) end as "image_path"');
		$this->db->join('student_academic_details as sa', 'sa.sd_student_id = s.student_id ');
		$this->db->join('schools as sch', 'sch.id = s.school_id');
		$this->db->join('classes as c', 'c.c_id = sa.sd_class_id');
		$this->db->join('sections as sc', 'sc.section_id = sa.sd_section_id');
		$this->db->where('s.status', 1);
		$this->db->where('s.parent_id', $id);
		$this->db->group_by('s.student_id');
		$q = $this->db->get("$this->tbl_name as s");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	function getLessonsBySec($id){
		$this->db->select('l.lesson_id,l.lesson_name');
		$this->db->join('lesson_schedule as ls', 'ls.lesson_id = l.lesson_id');
		$this->db->where('ls.section_id', $id);
		$this->db->group_by('l.lesson_id');
		$q = $this->db->get("$this->tbl_lessons as l");
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	function getLessonsByClass($id){
		$this->db->select('l.lesson_id,l.lesson_name');
		$this->db->join('lesson_schedule as ls', 'ls.lesson_id = l.lesson_id');
		$this->db->where('ls.class_id', $id);
		$this->db->group_by('l.lesson_id');
		$q = $this->db->get("$this->tbl_lessons as l");
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	
	
	function getAllLessons(){
		$this->db->select('s.*,c.class_name,sc.section_name,sch.name as school_name');
		$this->db->join('schools as sch', 'sch.id = s.school_id');
		$this->db->join('classes as c', 'c.c_id = s.class_id');
		$this->db->join('sections as sc', 'sc.section_id = s.section_id');
		$this->db->where('s.status', 1);
		$this->db->where('s.parent_id', $id);
		$q = $this->db->get("$this->tbl_name as s");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	function getAllUnAssigned(){
		$this->db->select('s.*,c.class_name,sc.section_name,sch.name as school_name');
		$this->db->join('student_academic_details as sa', 'sa.sd_student_id = s.student_id ');
		$this->db->join('schools as sch', 'sch.id = s.school_id');
		$this->db->join('classes as c', 'c.c_id = sa.sd_class_id');
		$this->db->join('sections as sc', 'sc.section_id = sa.sd_section_id');
		$this->db->join('academic_year as a', 'a.id = sa.sd_academic_year');
		$this->db->where('s.status', 1);
		$this->db->where('s.parent_id', 0);
		$this->db->where('a.name', 'currrent_year');
		$this->db->where('s.school_id', $this->school_id);
		$q = $this->db->get("$this->tbl_name as s");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	function getStudentById($id){
		$this->db->select('s.*,c.class_name,sc.section_name,sch.name as school_name');
		$this->db->join('student_academic_details as sa', 'sa.sd_student_id = s.student_id ');
		$this->db->join('schools as sch', 'sch.id = s.school_id');
		$this->db->join('classes as c', 'c.c_id = sa.sd_class_id');
		$this->db->join('sections as sc', 'sc.section_id = sa.sd_section_id');
		$this->db->where('s.status', 1);
		/* $this->db->where('s.parent_id', 0); */
		$this->db->where('s.student_id', $id);
		$q = $this->db->get("$this->tbl_name as s");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result_array();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	function getAllActiveByWorkSpace($uid){
		return $this->db->where('is_del',0)
						->where('user_id',$uid)
						->where('status',1)
						->get($this->tbl_name)
						->result();
	}
	
	function catInfo($id){
		$sql = "select * from $this->tbl_name  where id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	
	function getName($id){
		$sql = "select * from $this->tbl_name  where id=?";
		$q = $this->db->query($sql,$id);
		if($q->num_rows()>0){
			$data=$q->result_array();
			return $data[0]->name;	
		}
	}
	
	function getassignedMentors($id){
		$this->db->select('u.*');
		$this->db->join('school_mentors  as sm', 'sm.mentor_id  = u.id ');
		$this->db->where('sm.status', 1);
		$this->db->where('sm.is_del', 0);
		$this->db->where('sm.school_id', $id);
		$q = $this->db->get("users as u");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	function getGradeReportsByStudentId($id){
		$this->db->select('s.*,c.class_name,sc.section_name,sch.name as school_name');
		$this->db->join('student_academic_details as sa', 'sa.sd_student_id = s.student_id ');
		$this->db->join('schools as sch', 'sch.id = s.school_id');
		$this->db->join('classes as c', 'c.c_id = sa.sd_class_id');
		$this->db->join('sections as sc', 'sc.section_id = sa.sd_section_id');
		$this->db->join('grade_reports as gd', 'sc.section_id = sa.sd_section_id');
		$this->db->join('grades as g', 'sc.section_id = sa.sd_section_id');
		$this->db->where('s.status', 1);
		$this->db->where('s.student_id', $id);
		$q = $this->db->get("$this->tbl_name as s");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result_array();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	function getAllChildrenClasses($id){
		$this->db->select('c.c_id,c.class_name');
		$this->db->join('student_academic_details as sa', 'sa.sd_student_id = s.student_id ');
		$this->db->join('schools as sch', 'sch.id = s.school_id');
		$this->db->join('classes as c', 'c.c_id = sa.sd_class_id');
		$this->db->join('sections as sc', 'sc.section_id = sa.sd_section_id');
		$this->db->join('academic_year as a', 'a.id = sa.sd_academic_year');
		$this->db->where('s.status', 1);
		$this->db->where('s.is_del', 0);
		$this->db->where('s.parent_id', $id);
		/* $this->db->where('a.name', 'currrent_year'); */
		$this->db->group_by('c.c_id');
		$q = $this->db->get("$this->tbl_name as s");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	public function get_academicMaster()
    {
        $this->db->select('*');
        $this->db->from("academic_year");
		$this->db->where("status", '1');
		$this->db->where("is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
		
	
    }
	
	 public function get_academic_year()
    {
        $this->db->select('*');
        $this->db->from("academic_year");
		$this->db->where("name", "currrent_year");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
}
?>