<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teachers_model extends CI_Model{
	private $tbl_name = 'teachers';
	
	public function get_modules($id)
    {
        $this->db->select('GROUP_CONCAT(name) as module');
        $this->db->from("modules");
        $this->db->where_in("id", explode(',', $id));
        $query = $this->db->get();
        $data = $query->result();
		
        return $data;
    }
	
	public function get_teacherassignedsections($id)
    {
        $this->db->select('GROUP_CONCAT(class_id) as class_id , GROUP_CONCAT(section_ids) as section_ids');
        $this->db->from("teacher_sections_assigned");
        $this->db->where_in("teacher_id", $id);
        $query = $this->db->get();
        $data = $query->result();
		
        return $data;
    }
	
	
	
	
	
	public function get_grades($section_ids)
    {
        $this->db->select("GROUP_CONCAT(CONCAT(c.class_name, ' -', CAST(s.section_name AS CHAR(15)), '') SEPARATOR ', ') as sections");
        $this->db->from("sections as s");
		$this->db->join('classes as c','c.c_id = s.class_id');
        $this->db->where_in("s.section_id", explode(',', $section_ids));
        $query = $this->db->get();
		/* echo $this->db->last_query(); */
        $data = $query->result();
        return $data;
    }
	
	
	
	public function get_schoolteachers($params = array())
    {
		
        $this->db->select('u.*, s.id as school_id,s.name as school_name,, case when (profile_pic is null or profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",profile_pic) end as "image_path"');
        $this->db->from("users as u");
		$this->db->where("role_id", '10');
		$this->db->where("u.is_del", '0');
        $this->db->join('schools as s','u.school_id = s.id');
       /*  $this->db->join('teacher_sections_assigned as ts','ts.teacher_id = u.id'); */
		
		if(!empty($params['school_id']) && $params['school_id'] != "undefined"  && $params['school_id'] != ""){
				$this->db->where('school_id',$params['school_id']);
			} 
			
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" ( u.first_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" u.last_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" u.email LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" u.phone LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(isset($params['status']) && $params['status'] != "undefined" ){
				$this->db->where('u.status',$params['status']);
			}else{
				$this->db->where('u.status','1');
			}
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('u.first_name',$params['sortby']);
			}
			
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit'],$params['start']);
			}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
				$this->db->limit($params['limit']);
			}
			
			/* get records */
			$query = $this->db->get();
			//echo $this->db->last_query();
			/* //return fetched data */
			$data = ($query->num_rows() > 0)?$query->result_array():FALSE;
			if($data){
				
				$data = json_decode(json_encode($data), FALSE);
				return $data;
			}else{
				return FALSE;
			}
    }
	
	public function get_classesBySchoolID($id)
    {
        $this->db->select('*');
        $this->db->from("classes");
        $this->db->where("school_id", $id);
        $this->db->where("status", '1');
        $this->db->where("is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	public function get_teachers($id)
    {
        $this->db->select('*, u.id as user_id,u.status as tstatus, case when (profile_pic is null or profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",profile_pic) end as "image_path", GROUP_CONCAT(ts.class_id) as class_id , GROUP_CONCAT(ts.section_ids) as section_ids');
        $this->db->from("users as u");
        $this->db->where("u.id", $id);
		$this->db->join('teacher_sections_assigned as ts','u.id = ts.teacher_id');

        $query = $this->db->get();
		
        $data = $query->result();
		
        return $data;
    }
	
	function check_if_sections_assigned_exists($params = array())
	{

        $this->db->select('*');
        $this->db->from("teacher_sections_assigned");        
        $this->db->where("section_ids", $params['section_ids']);
        $this->db->where("class_id ",$params['class_id']);
        $this->db->where("academic_year", $params['academic_year']);
        $this->db->where("teacher_id",  $params['teacher_id']);
        $query = $this->db->get();
		$num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->row();
        }
        return array('num' => $num, 'data' => $data);
    }
	
	function insert($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
	
   function update($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update('users',$data);
		return $q;
	}
	
	function userInfo($id){
		$sql = "select * from users  where id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	
	
	function isMobileExists($mobile){		
		return  $this->db->where('mobile',$mobile)->get($this->tbl_name)->result();			
	}
	
	
	function getTeacherScheData(){
		
		$this->db->select('c.c_id, c.class_name,s.section_id,s.section_name,s.week_day as weekday, l.lesson_id,l.lesson_name,ls.*');
		$this->db->join('classes as c', 'c.c_id=ls.class_id');
		$this->db->join('sections as s', 's.section_id = ls.section_id');
		$this->db->join('lessons  as l', 'l.lesson_id=ls.lesson_id');
		$this->db->where('ls.is_del', 0);
		if($this->role_id  == 10){
			$this->db->join('teacher_sections_assigned ts', 'ls.section_id = ts.section_ids');
			$this->db->where('ts.teacher_id', $this->uid);
		}else{
			$this->db->where('ls.school_id', $this->school_id);
		}
		
		$q = $this->db->get("lesson_schedule ls ");
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	function getSchoolactivityData(){
		
		$this->db->select('*');
		
		$this->db->where('school_id', $this->school_id);
		$this->db->where('status', 1);
		$this->db->where('is_del', 0);
		
		$q = $this->db->get("school_activities ");
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	
	
	public function getNotificationList()
    {
        $this->db->select('*');
        $this->db->from("notifications");
        $this->db->where("school_id", $this->school_id);
        $this->db->where("user_id", $this->uid);
        $this->db->where("seen", 0);

        $q = $this->db->get();
	
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
		
    }
	
	public function getTeacherTrailCount($type,$status,$id,$class_id)
    {
        $this->db->select('count(*) as totalcount');
        $this->db->from("trial_and_mentoring");
        $this->db->where("type", $type);
        $this->db->where("added_by", $id);
		$this->db->where("status", $status);
		$this->db->where("is_del", 0);
		if($class_id != 'all'){
			$this->db->where("class_id", $class_id);
		}
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    } 
	
	public function getTeacherTrailFeedbackGiven($type,$status,$id,$class_id)
    {
        $this->db->select('count(*) as totalcount');
        $this->db->from("trial_and_mentoring");
        $this->db->where("type", $type);
        $this->db->where("added_by", $id);
		$this->db->where("feedback", 1);
		$this->db->where("is_del", 0);
		if($class_id != 'all'){
			$this->db->where("class_id", $class_id);
		}
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    } 
	
	
}
?>