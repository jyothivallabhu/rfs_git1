<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assign_lessons_model extends CI_Model{
	private $tbl_name = 'users';
	
	 public function get_modules($id)
    {
        $this->db->select('GROUP_CONCAT(name) as module');
        $this->db->from("modules");
        $this->db->where_in("id", explode(',', $id));
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	 public function getAssignedLessonsByClassID($class_id,$school_id)
    {
        $this->db->select('GROUP_CONCAT(lesson_id) as lesson_id');
        $this->db->from("lessons_assigned");
        $this->db->where("class_id", $class_id);
        $this->db->where("school_id", $school_id);
        $this->db->where("status", 1);
        $this->db->where("is_del", 0);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	function create_bulk_lessons_assigned($data){
		$q = $this->db->insert_batch('lessons_assigned',$data);
		return $q;
	}
	
	
	
	
	public function get_all_modules()
    {
        $this->db->select('*');
        $this->db->from("modules");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	function getRowslessons($params = array()){
		
			$this->db->select('l.*,c.class_name,a.id as lesson_assignId');
            $this->db->from('lessons as l');
           
			$this->db->where("a.is_del", '0');
			$this->db->where("l.is_del", '0');
			$this->db->where("l.status", '1');
			$this->db->where("c.is_del", '0');
			$this->db->where("c.status", '1');
			
			$this->db->where("a.school_id", $params['school_id']);
			$this->db->join('lessons_assigned as a','a.lesson_id = l.lesson_id'); 
			$this->db->join('classes as c','c.c_id = a.class_id'); 
			
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" medium LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" c.class_name LIKE '%".$params['search_text']."%'  ) ");
			} 
			if(!empty($params['class_id']) && $params['class_id'] != "undefined"  && $params['class_id'] != ""){
				$this->db->where("a.class_id", $params['class_id']);
			} 
			
			
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('a.id',$params['sortby']);
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
	
	function get_lessons_assigned($school_id,$lesson_id){
		$this->db->select('*');
        $this->db->from("lessons_assigned");
        $this->db->where("school_id", $school_id);
        $this->db->where("lesson_id", $lesson_id);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
	}
	function getAllLessons(){
		$this->db->select('*');
        $this->db->from("lessons");
        $this->db->where("is_del", 0);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
	}
	function getLessons(){
		$this->db->select('lesson_id,lesson_name');
        $this->db->from("lessons");
        $this->db->where("is_del", 0);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
	}
	
	
	
	function check_if_lessonsassigned_exists($school_id,$lesson_id,$class_id)
	{

        $this->db->select('*');
        $this->db->from("lessons_assigned");        
		$this->db->where("school_id", $school_id);
        $this->db->where("lesson_id", $lesson_id);
        $this->db->where("class_id", $class_id);
		$this->db->where("is_del", 0);
        $query = $this->db->get();
		
		$num = $query->num_rows();
        $data = $query->result_array();
        return $num;
    }
	
	
	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
   function update($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
	}
	
	
	
	function isMobileExists($mobile){		
		return  $this->db->where('mobile',$mobile)->get($this->tbl_name)->result();			
	}
	
	
	function assignedlessonInfo($id){
		$sql = "select * from lessons_assigned  where id=?";
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