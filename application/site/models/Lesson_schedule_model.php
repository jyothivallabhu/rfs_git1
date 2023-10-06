<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lesson_schedule_model extends CI_Model{
	private $tbl_name = 'lesson_schedule';
	
	 public function get_modules($id)
    {
        $this->db->select('GROUP_CONCAT(name) as module');
        $this->db->from("modules");
        $this->db->where_in("id", explode(',', $id));
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	public function get_all_modules()
    {
        $this->db->select('*');
        $this->db->from("modules");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	public function get_lessonsBySchool($id)
    {
        
		$this->db->select('l.lesson_id,l.lesson_name');
		$this->db->from('lessons as l');
	   
		$this->db->where("l.is_del", '0');
		$this->db->where("a.school_id", $id);
		$this->db->join('lessons_assigned as a','a.lesson_id = l.lesson_id');
			
        $query = $this->db->get();
		
        $data = $query->result();
        
        
        return $data;
    }
	
	function create_bulk_schedules($data){
		$q = $this->db->insert_batch('lesson_schedule',$data);
		return $q;
	}
	
	function getRowslessons($params = array()){
		
			$this->db->select('*, a.id as scheduled_lesson_id');
            $this->db->from('lessons as l');
           
			$this->db->where("a.is_del", '0');
			$this->db->where("a.school_id", $params['school_id']);
			$this->db->join('lesson_schedule as a','a.lesson_id = l.lesson_id');
			$this->db->join('sections as s','s.section_id = a.section_id');
			$this->db->join('classes as c','c.c_id = s.class_id');
			$this->db->group_by('a.id');
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('l.lesson_id',$params['sortby']);
			}
			
			if(!empty($params['class_id']) && $params['class_id'] != "undefined" && $params['class_id'] != ""){
				$this->db->where('a.class_id',$params['class_id']);
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
	
	function check_lessons_assigned($lesson_id){
		$this->db->select('*');
        $this->db->from("lessons_assigned");
        $this->db->where("lesson_id", $lesson_id);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
	}
	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
   function update($data,$id){
		$this->db->where('lesson_id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
	}
	
	
	
	function isMobileExists($mobile){		
		return  $this->db->where('mobile',$mobile)->get($this->tbl_name)->result();			
	}
	
	function scheduleInfo($id){
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
	
	function deptInfo($id){
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
	
}
?>