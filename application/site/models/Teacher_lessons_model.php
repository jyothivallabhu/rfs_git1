<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teacher_lessons_model extends CI_Model{
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
	
	function getAllArtWorks($id){
		$this->db->select('l.lesson_id,l.lesson_name,a.*');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->where('a.section_id', $id);
		$q = $this->db->get("$this->tbl_name as a");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
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
	function getLessonsCount($section_id,$academic_year){
		 $this->db->select('COUNT(*) as total_lessons');
        $this->db->from("lesson_schedule");
        $this->db->where("section_id", $section_id);
        $this->db->where("academic_year", $academic_year);		 
        $this->db->where("is_del", 0);		 
        $query = $this->db->get();
        $data = $query->result();
        return $data;
	}
	
	
	public function getlessonScheduleBYID($id)
    {
        $this->db->select('l.lesson_id,l.lesson_name,c.class_name,sec.section_name,sec.section_id, a.*');
        $this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->join('classes as c', 'a.class_id = c.c_id');
		$this->db->join('sections as sec', 'a.section_id = sec.section_id');
        $this->db->where("a.id", $id);
        $q = $this->db->get("lesson_schedule as a");
        $data = $q->result();
		
        return $data;
    }
	
	
}
?>