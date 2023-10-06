<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Artwork_model extends CI_Model{
	private $tbl_name = ' artwork';
	
	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
   function update($data,$id){
		$this->db->where('student_id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
	}
	
	function getAllArtWorks($id){
		$this->db->select('l.lesson_id,l.lesson_name,a.*');
		$this->db->join('lessons as l', 'l.lesson_id = a.lesson_id');
		$this->db->where('a.added_by', $id);
		$q = $this->db->get("$this->tbl_name as a");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	/*Teacher Artwork_model*/
	
}
?>