<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teaches_common_model extends CI_Model{
	private $tbl_name 				= ' trial_and_mentoring';
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
	
	
	
	/*Teacher Artwork_model*/
	
}
?>