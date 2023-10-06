<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function get_modules($id)
    {
        $this->db->select('GROUP_CONCAT(name) as module');
        $this->db->from("modules");
        $this->db->where_in("id", explode(',', $id));
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    
	public function get_school_mentor_names($school_id)
    {
        $this->db->select('GROUP_CONCAT(first_name SEPARATOR ", ") as mentor_name');
        $this->db->from("users as u");
        $this->db->where("sm.school_id", $school_id);
        $this->db->where("role_id", 5);
        $this->db->where("sm.status", 1);		 
        $this->db->where("sm.is_del", 0);		 
        $this->db->where("u.is_del", 0);		 
        $this->db->where("u.status", 1);		 
		$this->db->join('school_mentors  as sm','u.id = sm.mentor_id ');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    public function get_mentors_assigned_schoolnames($mentor_id)
    {
        $this->db->select('GROUP_CONCAT(name SEPARATOR ", ") as school_name ');
        $this->db->from("school_mentors  sm");
         $this->db->join('schools  as s','s.id = sm.school_id ');
        $this->db->where("sm.mentor_id", $mentor_id);
        $this->db->where("s.is_del", 0);
        $this->db->where("s.status", 1);
        $this->db->where("sm.is_del", 0);
        $this->db->where("sm.status", 1);
        $this->db->group_by("sm.mentor_id");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
     public function get_mentors_assigned_schoolIds($mentor_id)
    {
        $this->db->select('GROUP_CONCAT(school_id) as school_id ');
        $this->db->from("school_mentors  sm");
        $this->db->where("sm.mentor_id", $mentor_id);
        $this->db->where("sm.is_del", 0);
        $this->db->where("sm.status", 1);
        $this->db->group_by("sm.mentor_id");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
    
	
    
    public function get_user($id)
    {
        $this->db->select('*, case when (profile_pic is null or profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",profile_pic) end as "image_path"');
        $this->db->from("users");
        $this->db->where("id", $id);

        $query = $this->db->get();
        $data = $query->result();
		
        return $data;
    }
    public function get_mentor($id)
    {
        $this->db->select('*');
        $this->db->from("mentors");
        $this->db->where("id", $id);

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
	 public function get_academic_year()
    {
        $this->db->select('*');
        $this->db->from("academic_year");
		$this->db->where("name", "currrent_year");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	function acedamicInfo($id){
		$sql = "select * from academic_year  where id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	
    public function get_schoolsByID($id)
    {
        $this->db->select('*,case when (logo is null or logo = "") then "assets/images/school.png" else logo end as "logo",');
        $this->db->from("schools");
        $this->db->where("id", $id);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	public function get_GradesschoolsByID($id)
    {
        $this->db->select('*');
        $this->db->from("grades");
        $this->db->where("school_id", $id);
		$this->db->where("status", '1');
		$this->db->where("is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	public function get_GradesByClassID($id)
    {
        $this->db->select('*');
        $this->db->from("grades");
        $this->db->where_in("id", explode(',', $id));
		$this->db->where("status", '1');
		$this->db->where("is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	
	
	

    public function get_classesBySchoolID($id)
    {
        $this->db->select('*');
        $this->db->from("classes");
        $this->db->where("school_id", $id);
        $this->db->where("is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	public function get_ActiveClassesBySchoolID($id)
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
	
	
	public function get_classesBySectionID($id)
    {
        $this->db->select('*');
        $this->db->from("sections");
        $this->db->where("section_id", $id);
        $this->db->where("is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	

    public function get_sectionsByClassID($id)
    {
        $this->db->select('*');
        $this->db->from("sections");
        $this->db->where("class_id", $id);
		$this->db->where("is_del", '0');
        $query = $this->db->get();
        $num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->result_array();
        }
        return array('num' => $num, 'data' => $data);
    }
	
	public function get_StudentsBySectionID($id)
    {
        $this->db->select('student_id, concat(first_name," ",last_name) as full_name');
        $this->db->from("students as s");
		$this->db->join('student_academic_details as sd','s.student_id = sd.sd_student_id');
        $this->db->where("sd.sd_section_id", $id);
		$this->db->where("s.is_del", '0');
        $query = $this->db->get();
		$num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->result_array();
        }
        return array('num' => $num, 'data' => $data);
    }
	 
	
	
	 public function get_studentscountByClassID($id)
    {
        $this->db->select('count(*) as scount');
        $this->db->from("students as s");
		$this->db->join('student_academic_details as sd','s.student_id = sd.sd_student_id');
		$this->db->join('academic_year as a','a.id = sd.sd_academic_year');
        $this->db->where("a.name", 'currrent_year');
        $this->db->where("sd.sd_section_id", $id);
		$this->db->where("s.is_del", '0');
		$this->db->where("s.status", '1');
        $query = $this->db->get();
        $num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            //$data = $query->result_array();
        }
		 $data = $query->result();
        return  $data;
    }
	
	 public function get_parentscountByClassID($id)
    {
        $this->db->select('count(*) as pcount');
        $this->db->from("students as s");
		$this->db->join('student_academic_details as sd','s.student_id = sd.sd_student_id');
		$this->db->join('users  as u','u.id = s.parent_id');
		$this->db->join('academic_year as a','a.id = sd.sd_academic_year');
        $this->db->where("a.name", 'currrent_year');
        $this->db->where("sd.sd_section_id", $id);
		$this->db->where("s.is_del", '0');
        $query = $this->db->get();
        $num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            //$data = $query->result_array();
        }
		$data = $query->result();
        return  $data;
    }
	
	
	
	public function get_all_states()
    {
        $this->db->select('*');
        $this->db->from("states");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	  public function get_lessonsByID($id)
    {
        $this->db->select('*');
        $this->db->from("lessons");
        $this->db->where("lesson_id", $id);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	  public function get_classByID($id)
    {
        $this->db->select('*');
        $this->db->from("sections");
        $this->db->where("section_id", $id);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	
	  public function get_class_sectionsBysecID($id)
    {
        $this->db->select('*');
        $this->db->from("sections as s");
        $this->db->join('classes as c','c.c_id = s.class_id');
        $this->db->where("section_id", $id);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	
	
	
	 public function get_classCountBySchoolId($id)
    {
        $this->db->select('count(c_id) as class_count');
        $this->db->from("classes");
        $this->db->where("school_id", $id);
		$this->db->where("status", '1');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	
	
	
    public function get_sectionsCountBySchoolId($id)
    {
         $this->db->select('count(*) as seccount');
        $this->db->from("sections");
        $this->db->where("school_id", $id);
		$this->db->where("status", '1');
        $query = $this->db->get();
        $data = $query->result();
        
        
        return $data;
    } 
	public function get_adminscountBySchoolId($id)
    {
        $this->db->select('count(*) as admins_count');
        $this->db->from("users");
        $this->db->where("role_id", 4);
        $this->db->where("school_id", $id);
		$this->db->where("status", '1');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	public function get_studentscountBySchoolId($id)
    {
        $this->db->select('count(*) as students_count');
        $this->db->from("students");
        $this->db->where("school_id", $id);
		$this->db->where("status", '1');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	public function get_parentscountBySchoolId($id)
    {
        $this->db->select('count(*) as parents_count');
        $this->db->from("users");
        $this->db->where("role_id", 8);
        $this->db->where("school_id", $id);
		$this->db->where("status", '1');
        $query = $this->db->get();
		
        $data = $query->result();
        return $data;
    }
	
    public function get_mentorscountBySchoolId($id)
    {
		
		 $this->db->select('count(*) as schoolmentorscount');
        $this->db->from("users as u");
        $this->db->where("role_id", 5);
        $this->db->where("sm.school_id", $id);
		$this->db->where("u.status", '1');
		$this->db->where("u.is_del", '0');
		$this->db->where("sm.status", '1');
		$this->db->where("sm.is_del", '0');
		 $this->db->join('school_mentors as sm','u.id = sm.mentor_id');
        $query = $this->db->get();
		
        $data = $query->result();
        
        
        return $data;
    }
	
	
	function getRowslessons($params = array()){
		
			$this->db->select('*');
            $this->db->from('lessons');
			/* $this->db->where("status", '1'); */
			$this->db->where("is_del", '0');
			
			 if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (lesson_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" description LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" artist_art_movement LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" technique LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" duration LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" keywords LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" elements_of_art_covered LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" aim_and_objective LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" medium LIKE '%".$params['search_text']."%' )  ");
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('lesson_id',$params['sortby']);
			}
			
			if(isset($params['status']) && $params['status'] != "undefined" ){
				$this->db->where('status',$params['status']);
			}else{
				$this->db->where('status','1');
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
	
	public function get_all_mentors()
    {

        $this->db->select('*');
        $this->db->from("users");
		$this->db->where("role_id", '5');
		$this->db->where("is_del", '0');
        $this->db->order_by('status', 'ASC');
        $query = $this->db->get();
		
        $data = $query->result();
        return $data;
    }

	public function getallActiveMentors()
    {

        $this->db->select('*');
        $this->db->from("users");
		$this->db->where("role_id", '5');
		$this->db->where("is_del", '0');
		$this->db->where("status", '1');
        $this->db->order_by('status', 'ASC');
        $query = $this->db->get();
		
        $data = $query->result();
        return $data;
    }

	
	
	 public function get_mentors($params = array())
    {
        $this->db->select('*, case when (profile_pic is null or profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",profile_pic) end as "image_path"');
        $this->db->from("users");
		$this->db->where("role_id", '5');
		$this->db->where("is_del", '0');
        
		
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (first_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" last_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" email LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" phone LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('first_name',$params['sortby']);
			}
			
			if(isset($params['status']) && $params['status'] != "undefined" ){
				$this->db->where('status',$params['status']);
			}else{
				$this->db->where('status','1');
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
	
	public function get_all_schools()
    {
        $this->db->select('*');
        $this->db->where("is_del", 0);
        $this->db->where("status", 1);
        $this->db->from("schools");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
		
    }
	
	public function get_schools($params = array())
    {
        $this->db->select('*,  s.status as school_status,state.name as state_name, s.name as school_name,s.id as school_id,case when (logo is null or logo = "") then "'.base_url().'assets/images/school.png" else concat("'.base_url().'",logo) end as "image_path"');
        $this->db->from("schools as s");
		$this->db->where("s.is_del", 0);
		 $this->db->join('states as state','state.id = s.state');
		
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (s.name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" principal_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" address LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" email LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" phone LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('s.name',$params['sortby']);
			}
			
			if(isset($params['status']) && $params['status'] != "undefined" ){
				$this->db->where('s.status',$params['status']);
			}else{
				$this->db->where('s.status','1');
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
	
	
	
	
	public function get_offline_schools($params = array())
    {
        $this->db->select('s.*,   state.name as state_name');
        $this->db->from("offline_schools as s");
		$this->db->where("s.is_del", 0);
		 $this->db->join('states as state','state.id = s.state');
		
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (s.school_name LIKE '%".$params['search_text']."%'   "); 
				$this->db->or_where(" address LIKE '%".$params['search_text']."%'  ) "); 
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('s.name',$params['sortby']);
			}
			
			if(isset($params['status']) && $params['status'] != "undefined" ){
				$this->db->where('s.status',$params['status']);
			}else{
				$this->db->where('s.status','1');
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
	
	
	
	
	
	
	public function get_schoolAdmins($params = array())
    {
		
        $this->db->select('u.*, s.id as school_id,s.name as school_name,u.status as user_status, case when (profile_pic is null or profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",profile_pic) end as "image_path"');
        $this->db->from("users as u");
		$this->db->where("role_id", '4');
		$this->db->where("u.is_del", '0');
        $this->db->join('schools as s','u.school_id = s.id');
		
		if(!empty($params['school_id']) && $params['school_id'] != "undefined"  && $params['school_id'] != ""){
				$this->db->where('u.school_id',$params['school_id']);
			} 
			
		if(isset($params['status']) && $params['status'] != "undefined" ){
			$this->db->where('u.status',$params['status']);
		}else{
			$this->db->where('u.status','1');
		}
			
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" ( u.first_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" u.last_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" u.email LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" u.phone LIKE '%".$params['search_text']."%'  ) ");
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
	
	function check_if_email_exists($email)
    {

        $this->db->select('*');
        $this->db->from("users");        
        $this->db->where("email = '$email'");
		$this->db->where("is_del", '0');
        $query = $this->db->get();

        $num = $query->num_rows();
        $data = $query->result_array();
        return $num;
		
    }
	
	function check_getdata_if_email_exists($email)
    {

        $this->db->select('*');
        $this->db->from("users");        
        $this->db->where("email = '$email'");
        $this->db->where("role_id = 8");
		$this->db->where("is_del", '0');
        $query = $this->db->get();

       	$num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->row();
        }
        return array('num' => $num, 'data' => $data);
		
    }
	
	function check_email_getdata($email)
    {

        $this->db->select('*');
        $this->db->from("users");        
        $this->db->where("email = '$email'");
		$this->db->where("is_del", '0');
        $query = $this->db->get();

       	$num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->row();
        }
        return array('num' => $num, 'data' => $data);
		
    }
	
	function check_school_mentor($school_id, $mentor_id)
    {

        $this->db->select('*');
        $this->db->from("school_mentors");        
        $this->db->where("school_id = '$school_id'");
        $this->db->where("mentor_id = '$mentor_id'");
		$this->db->where("is_del", '0');
        $query = $this->db->get();

       	$num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->row();
        }
        return array('num' => $num, 'data' => $data);
		
    }
	
	
	
	function check_if_class_exists($params)
    {	
        $this->db->select('*');
        $this->db->from("classes");        
        $this->db->where("class_name", $params['class_name'] );
		$this->db->where("school_id", $params['school_id'] );
		$this->db->where("status", '1' );
		$this->db->where("is_del", '0');
		
        $query = $this->db->get();
		
        $num = $query->num_rows();
        $data = $query->result_array();
		return $num;
    }
	
	function check_if_classorder_exists($params)
    {	
        $this->db->select('*');
        $this->db->from("classes");        
        $this->db->where("class_order", $params['class_order'] );
		$this->db->where("school_id", $params['school_id'] );
		$this->db->where("status", '1' );
		$this->db->where("is_del", '0');
		
        $query = $this->db->get();
		
        $num = $query->num_rows();
        $data = $query->result_array();
		return $num;
    }
	
	
	
	function check_if_grade_exists($params)
    {	
        $this->db->select('*');
        $this->db->from("grades");        
        $this->db->where("grade_name", $params['grade_name'] );
		$this->db->where("school_id", $params['school_id'] );
		$this->db->where("status", '1' );
		$this->db->where("is_del", '0');
		
        $query = $this->db->get();
		
        $num = $query->num_rows();
        $data = $query->result_array();
		return $num;
    }
	function check_if_term_exists($params)
    {	
        $this->db->select('*');
        $this->db->from("exam_types");        
        $this->db->where("exam_name", $params['exam_name'] );
		$this->db->where("school_id", $params['school_id'] );
		$this->db->where("status", '1' );
		$this->db->where("is_del", '0');
		
        $query = $this->db->get();
		
        $num = $query->num_rows();
        $data = $query->result_array();
		return $num;
    }
	
	
	
	
	function check_if_section_exists($params)
    {
		
        $this->db->select('*');
        $this->db->from("sections"); 	
        $this->db->where("school_id", $params['school_id'] );
        $this->db->where("class_id" ,$params['class_id']);
        $this->db->where("section_name" ,$params['section_name'] );
        $this->db->where("status" ,$params['status'] );
		$this->db->where("is_del", '0');
        $query = $this->db->get();

        $num = $query->num_rows();
        $data = $query->result_array();
		
		return $num;
    }
	
	public function get_school_mentors($params = array())
    {
		
        $this->db->select('u.*, s.id as school_id,s.name as school_name, case when (profile_pic is null or profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",profile_pic) end as "image_path"');
        $this->db->from("users as u");
        $this->db->join('school_mentors as sm','u.id = sm.mentor_id');
        $this->db->join('schools as s','sm.school_id = s.id');
		$this->db->where("u.role_id", '5');
		$this->db->where("sm.is_del", '0');
		$this->db->where("sm.status", '1');
		$this->db->where("u.status", '1');
		$this->db->where("u.is_del", '0');
		
		
		if(!empty($params['school_id']) && $params['school_id'] != "undefined"  && $params['school_id'] != ""){
				$this->db->where('sm.school_id',$params['school_id']);
			} 
			
		if(isset($params['status']) && $params['status'] != "undefined" ){
			$this->db->where('u.status',$params['status']);
		}else{
			$this->db->where('u.status','1');
		}
			
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" ( u.first_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" u.last_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" u.email LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" u.phone LIKE '%".$params['search_text']."%'  ) ");
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
			
			/* //return fetched data */
			$data = ($query->num_rows() > 0)?$query->result_array():FALSE;
			if($data){
				
				$data = json_decode(json_encode($data), FALSE);
				return $data;
			}else{
				return FALSE;
			}
    }
	
	public function get_all_school_mentors($school_id)
    {
        $this->db->select('GROUP_CONCAT(mentor_id) as mentor_id ');
        $this->db->from("school_mentors");
		$this->db->where("school_id", $school_id);
		$this->db->where("is_del", 0);
		$this->db->where("status", 1);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	 public function get_parents($params = array())
    {
        $this->db->select('*');
        $this->db->from("users");
		$this->db->where("role_id", '8');
		$this->db->where("is_del", 0);
        
		if($params['school_id'] !='all'){
			
			$this->db->where("school_id", $params['school_id']);
		}
		
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (first_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" last_name LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" email LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" phone LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('first_name',$params['sortby']);
			}
			if(isset($params['status']) && $params['status'] != "undefined" ){
				$this->db->where('status',$params['status']);
			}else{
				$this->db->where('status','1');
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
	 public function get_students($params = array())
    {
       $this->db->select('s.*, case when (photo is null or photo = "") then "'.base_url().'assets/images/user.png" else concat("",photo) end as "image_path",c.class_name as class_name, sec.section_name as section_name,a.values as academic_year');
        $this->db->from("students as s");
		$this->db->join('student_academic_details as sa','sa.sd_student_id = s.student_id ');
		$this->db->join('classes as c','c.c_id = sa.sd_class_id');
		$this->db->join('sections as sec','sec.section_id = sa.sd_section_id');
		$this->db->join('academic_year as a','a.id = sa.sd_academic_year');
        $this->db->where("s.school_id", $params['school_id']);
		$this->db->where("s.is_del", '0');
		
		
		
		if(!empty($params['section_id']) && $params['section_id'] != "undefined"  && $params['section_id'] != ""){
			$this->db->where("sa.sd_section_id", $params['section_id']);
		} 
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
			$this->db->where(" (s.first_name LIKE '%".$params['search_text']."%'   ");
			$this->db->or_where(" s.last_name LIKE '%".$params['search_text']."%'   ");
			$this->db->or_where(" s.admission_number LIKE '%".$params['search_text']."%' )  ");
		} 
		
		if(isset($params['status']) && $params['status'] != "undefined" ){
			$this->db->where('s.status',$params['status']);
		}else{
			$this->db->where('s.status','1');
		}
		
		if(!empty($params['academic_year']) && $params['academic_year'] != "undefined" ){
			$this->db->where(" sa.sd_academic_year", $params['academic_year']);
		}else{
			$this->db->where("a.name", 'currrent_year');
		}
		if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
			$this->db->order_by('s.admission_number',$params['sortby']);
		}
		
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit'],$params['start']);
		}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit']);
		}
			
			$this->db->group_by('s.admission_number ');
			
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
	
	function check_if_admission_number_exists($admission_number,$school_id)
    {

        $this->db->select('*');
        $this->db->from("students");        
        $this->db->where("admission_number = '$admission_number'");     
		$this->db->where("school_id = '$school_id'");
        $query = $this->db->get();

        $num = $query->num_rows();
        $data = $query->result_array();
        return $num;
    }
	
    public function getstudentsByAdmissionNumber($admission_number,$school_id)
    {
        $this->db->select('*');
        $this->db->from("students");
        $this->db->where("admission_number", $admission_number);
        $this->db->where("school_id", $school_id);
        $query = $this->db->get();
        $num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->row();
        }
        return array('num' => $num, 'data' => $data);
    }
	
	public function getparentsByemailID($email,$school_id)
    {
        $this->db->select('*');
        $this->db->from("users");
        $this->db->where("email", $email);
        $this->db->where("role_id", 8);
        $query = $this->db->get();
        $num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->row();
        }
        return array('num' => $num, 'data' => $data);
    }
	
	
	function check_if_schooluser_exists($school_id,$email)
	{

        $this->db->select('*');
        $this->db->from("users");        
        $this->db->where("school_id = '$school_id'");
        $this->db->where("email = '$email'");
        $query = $this->db->get();
		$num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->row();
        }
        return array('num' => $num, 'data' => $data);
    }
	
	public function get_usersByRole($id)
    {
         $this->db->select('count(*) as userscount');
        $this->db->from("users");
        $this->db->where("role_id", $id);
		$this->db->where("status", '1');
		$this->db->where("is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        
        
        return $data;
    }
	public function getSchoolsCount()
    {
         $this->db->select('count(*) as schools_count');
        $this->db->from("schools");
		$this->db->where("status", '1');
		$this->db->where("is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        
        
        return $data;
    }
	
	  public function get_studentsByID($id)
    {
        $this->db->select('s.*,sa.sd_academic_year,sa.sd_class_id,sa.sd_section_id, c.class_name,sec.section_name,case when (photo is null or photo = "") then "'.base_url().'assets/images/user.png" else photo end as "image_path", u.first_name as parent_fname, u.last_name as parent_lname, u.email,u.phone');
        $this->db->from("students as s");
		$this->db->join('student_academic_details as sa','sa.sd_student_id = s.student_id');
		$this->db->join('academic_year as a','a.id = sa.sd_academic_year');
		$this->db->join('classes as c','c.c_id = sa.sd_class_id');
		$this->db->join('sections as sec','sec.section_id = sa.sd_section_id');
		$this->db->join('users as u','u.id = s.parent_id' , 'left');
        $this->db->where("student_id", $id);
        /* $this->db->where("a.name", 'currrent_year'); */
        $query = $this->db->get();
		
		 $data = $query->result();
        return $data;
    }
	  public function get_parentsByStudentId($id)
    {
        $this->db->select('*,case when (profile_pic is null or profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",profile_pic) end as "image_path"');
        $this->db->from("users u");
        $this->db->where("u.id", $id);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	function check_if_schoolemail_exists($email)
    {
        $this->db->select('*');
        $this->db->from("schools");        
        $this->db->where("email = '$email'");
		$this->db->where("is_del", '0');
        $query = $this->db->get();

        $num = $query->num_rows();
        $data = $query->result_array();
        return $num;
    }
	function check_if_schoolurl_exists($url_slug)
    {
        $this->db->select('*');
        $this->db->from("schools");        
        $this->db->where("url_slug = '$url_slug'");
		$this->db->where("is_del", '0');
        $query = $this->db->get();

        $num = $query->num_rows();
        $data = $query->result_array();
        return $num;
    }
	function check_if_school_editemail_exists($email,$id)
    {
        $this->db->select('*');
        $this->db->from("schools");        
        $this->db->where("email = '$email'");
        $this->db->where("id != '$id'");
		$this->db->where("is_del", '0');
        $query = $this->db->get();

        $num = $query->num_rows();
        $data = $query->result_array();
        return $num;
    }
	function check_if_school_editurl_exists($url_slug,$id)
    {
        $this->db->select('*');
        $this->db->from("schools");        
        $this->db->where("url_slug = '$url_slug'");
        $this->db->where("id != '$id'");
		$this->db->where("is_del", '0');
        $query = $this->db->get();

        $num = $query->num_rows();
        $data = $query->result_array();
        return $num;
    }
	function schoolInfo($id){
		$sql = "select * from schools  where id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
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
	function classInfo($id){
		$sql = "select * from classes  where c_id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	
	function sectionInfo($id){
		$sql = "select * from sections  where section_id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	
	
	
	
	function getclassIdByName($class_name,$school_id){
		$sql = "select * from classes  where class_name = '$class_name' and school_id = '$school_id'";
		$q = $this->db->query($sql);
		$data=$q->row_array();
		return $data;
	}
	function getSectionIdByName($section_name,$class_id){
		$sql = "select * from sections  where section_name = '$section_name' and class_id='$class_id'";
		$q = $this->db->query($sql);
		$data=$q->row_array();
		return $data;
	}
	
	
	function classInfoByorderId($orderid,$school_id){
		$sql = "select * from classes  where class_order='$orderid' and school_id='$school_id'";
		$q = $this->db->query($sql);
		$data=$q->row_array();
		return $data;
			
	}
	
	function insertSection($data){
		$q = $this->db->insert('sections', $data);
		return $q;
	}
	
	
	function getlessonName($id){
		$sql = "select lesson_id,lesson_name from lessons  where lesson_id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	
	function studentInfo($id){
		$sql = "select * from students  where student_id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	
	
	function check_if_editclass_exists($params)
    {	
        $this->db->select('*');
        $this->db->from("classes");        
        $this->db->where("class_name", $params['class_name'] );
		$this->db->where("school_id", $params['school_id'] );
		$this->db->where("status", $params['status'] );
		$this->db->where("is_del", '0');
		$this->db->where("c_id != '$id'");
		
        $query = $this->db->get();
		
        $num = $query->num_rows();
        $data = $query->result_array();
		return $num;
    }
	
	public function get_allclasses($id)
    {
        $this->db->select('*');
        $this->db->from("classes");
		$this->db->where("is_del", '0');
		$this->db->where("school_id", $id );
        $query = $this->db->get();
        $num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->result_array();
        }
        return array('num' => $num, 'data' => $data);
    }
	
	public function get_allactiveclasses($id)
    {
        $this->db->select('*');
        $this->db->from("classes");
		$this->db->where("is_del", '0');
		$this->db->where("status", '1');
		$this->db->where("school_id", $id );
        $query = $this->db->get();
        $num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->result_array();
        }
        return array('num' => $num, 'data' => $data);
    }
	
	
	public function get_teacherclasses($id)
    {
        $this->db->select('*');
        $this->db->from("classes as c");
		$this->db->join('teacher_sections_assigned as ts', 'ts.class_id = c.c_id');
		$this->db->where("c.is_del", '0');
		$this->db->where("c.status", '1');
		if($_SESSION["login_session"]["role_id"] == 10){
			$this->db->where("ts.teacher_id", $this->uid );
		}
		$this->db->where("c.school_id", $id );
		$this->db->group_by('c.c_id');
        $query = $this->db->get();
        $num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->result_array();
        }
        return array('num' => $num, 'data' => $data);
    }
	public function get_exam_types($id)
    {
        $this->db->select('*');
        $this->db->from("exam_types");
		$this->db->where("is_del", '0');
		$this->db->where("status", '1');
		$this->db->where("school_id", $id );
        $query = $this->db->get();
        $num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->result_array();
        }
        return array('num' => $num, 'data' => $data);
    }
	
	
	public function get_teacherclasseswiselessons($id)
    {
        $this->db->select('l.lesson_id,l.lesson_name');
        $this->db->from("lessons as l");
		$this->db->join('lessons_assigned as ls', 'ls.lesson_id = l.lesson_id');
		$this->db->join('teacher_sections_assigned as ts', 'ts.class_id = ls.class_id');
		$this->db->where("l.is_del", '0');
		$this->db->where("l.status", '1');
		$this->db->where("ls.is_del", '0');
		$this->db->where("ls.status", '1');
		$this->db->where("ls.school_id", $id );
		if($this->role_id  != 4){
			$this->db->where("ts.teacher_id ", $this->uid );
		}
		
		$this->db->group_by('l.lesson_id');
        $query = $this->db->get();
		
		
        $num = $num = $query->num_rows();
        $data = "";
        if ($num > 0) {
            $data = $query->result_array();
        }
        return array('num' => $num, 'data' => $data);
    }
	
	
	
	
	
	function getAllUnAssigned($sid){
		$this->db->select('s.*,c.class_name,sc.section_name,sch.name as school_name');
		$this->db->join('student_academic_details as sa', 'sa.sd_student_id = s.student_id ');
		$this->db->join('schools as sch', 'sch.id = s.school_id');
		$this->db->join('classes as c', 'c.c_id = sa.sd_class_id');
		$this->db->join('sections as sc', 'sc.section_id = sa.sd_section_id');
		$this->db->where('s.status', 1);
		$this->db->where('s.parent_id', 0);
		$this->db->where('s.school_id', $sid);
		$q = $this->db->get("students as s");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	function getTeachersBySchoolId($id){
		$this->db->select('id,concat(first_name,last_name) as teachername');
		$this->db->where('status', '1');
		$this->db->where('is_del', '0');
		$this->db->where('role_id', '10');
		$this->db->where('school_id', $id);
		$q = $this->db->get("users");
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	function getexam_typesBySchoolId($id){
		$this->db->select('*');
		$this->db->where('status', '1');
		$this->db->where('is_del', '0');
		$this->db->where('school_id', $id);
		$q = $this->db->get("exam_types");
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	
	
	
	function getTeacherassignedClasses($id){
		$this->db->select('c.*');
		$this->db->where('ts.status', '1');
		$this->db->where('ts.is_del', '0');
		$this->db->where('teacher_id ', $id);
		$this->db->group_by('ts.class_id ');
		$this->db->join('classes as c', 'c.c_id = ts.class_id');
		$q = $this->db->get("teacher_sections_assigned as ts");
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	function getassignedMentors($id){
		$this->db->select('u.*');
		$this->db->join('school_mentors  as sm', 'sm.mentor_id  = u.id ');
		$this->db->where('u.status', 1);
		$this->db->where('sm.status', 1);
		$this->db->where('sm.is_del', 0);
		$this->db->where('u.is_del', 0);
		$this->db->where('sm.school_id', $id);
		$q = $this->db->get("users as u");
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	function get_Mentor_assigned_schools(){
		$this->db->select('*,s.id as school_id');
		$this->db->join('school_mentors as sm', 's.id=sm.school_id');
		$this->db->join('users as u', 'u.id = sm.mentor_id');
		$this->db->where('sm.status', 1);
		$this->db->where('sm.is_del', 0);
		$this->db->where('sm.mentor_id', $this->uid);
		$q = $this->db->get("schools as s");
		$data = $q->result();
        return $data;
	}
	 public function get_activities($params = array())
    {
        $this->db->select('*');
        $this->db->from("school_activities");
		$this->db->where("is_del", '0');
		$this->db->where("school_id", $params['school_id']);
        
		
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('activity_date',$params['sortby']);
			}
			
			if(isset($params['status']) && $params['status'] != "undefined" ){
				$this->db->where('status',$params['status']);
			}else{
				$this->db->where('status','1');
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
	
	
	 public function getGrades($params = array())
    {
        $this->db->select('*');
        $this->db->from("grades");
		$this->db->where("is_del", '0');
		$this->db->where("school_id", $params['school_id']);
        
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('grade_name',$params['sortby']);
			}
			
			if(isset($params['status']) && $params['status'] != "undefined" ){
				$this->db->where('status',$params['status']);
			}else{
				$this->db->where('status','1');
			}
			
			if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" grade_name LIKE '%".$params['search_text']."%'   "); 
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
    } public function getExam_types($params = array())
    {
        $this->db->select('*');
        $this->db->from("exam_types");
		$this->db->where("is_del", '0');
		$this->db->where("school_id", $params['school_id']);
        
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('exam_name',$params['sortby']);
			}
			
			if(isset($params['status']) && $params['status'] != "undefined" ){
				$this->db->where('status',$params['status']);
			}else{
				$this->db->where('status','1');
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
	
	
	function getTeacherId($id){		
		$this->db->select('*');
        $this->db->from("teacher_sections_assigned as ts");
		$this->db->join('users as u', 'u.id = ts.teacher_id');
        $this->db->where("u.id", $id);
        $this->db->where("ts.is_del", '0');
        $query = $this->db->get();
        $data = $query->result();
        return $data;			
	}	
	
	function create_bulk_grades($data){
		$q = $this->db->insert_batch('grade_reports',$data);
		return $q;
	}
	function create_bulk_mac_address($data){
		$q = $this->db->insert_batch('offline_school_mac_addresses',$data);
		return $q;
	}
	
	
	
	function check_if_grade_report_exists($params)
    {	
        $this->db->select('*');
        $this->db->from("grade_reports");        
        $this->db->where("student_id", $params['student_id'] );
		$this->db->where("class_id", $params['class_id'] );
		$this->db->where("section_id", $params['section_id'] );
		/* $this->db->where("lesson_id", $params['lesson_id'] ); */
		$this->db->where("exam_type", $params['exam_type'] );
		$this->db->where("academic_id", $params['academic_id'] );
		$this->db->where("status", '1' );
		$this->db->where("is_del", '0');
		
        $query = $this->db->get();
		
        $num = $query->num_rows();
        $data = $query->result_array();
		return $num;
    }
	function getgradeInfo($id){
		$sql = "select * from grade_reports  where id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function view_gradereportpdf($id){
		
		$this->db->select('l.lesson_id,l.lesson_name,l.aim_and_objective, s.first_name, s.last_name, c.class_name,sec.section_name, g.*,grades.grade_name,et.exam_name,a.values as current_year, sch.name as school_name');
        $this->db->from("grade_reports as g");        
        $this->db->join("grades", "grades.id = g.grade_id" );
        $this->db->join("lessons as l", "g.lesson_id = l.lesson_id" );
		$this->db->join("students as s", "g.student_id = s.student_id" );
		$this->db->join("student_academic_details as sa", "sa.sd_student_id = s.student_id" );
		$this->db->join("schools as sch", "sch.id = sa.sd_school_id" );
		$this->db->join("classes as c", "c.c_id = sa.sd_class_id" );
		$this->db->join("sections as sec", "sec.section_id = sa.sd_section_id" );
		$this->db->join("academic_year as a", "a.id = g.academic_id" );
		$this->db->join("exam_types as et", "et.id = g.exam_type" );
		$this->db->where("g.id", $id );
		$this->db->group_by("g.id");
		
        $query = $this->db->get();
		
        $num = $query->num_rows();
        $data = $query->result_array();
		return $data;
	}
	function examtyeInfo($id){
		$sql = "select * from exam_types  where id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	function gradeInfo($id){
		$sql = "select * from grades  where id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	function activityInfo($id){
		$sql = "select * from school_activities  where a_id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	function gethelpInfo($id){
		$sql = "select gh.*, u.first_name,u.last_name,u.email,ur.name from get_help gh join users u on u.id = gh.user_id join user_roles as ur on ur.id = u.role_id  where gh.id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	
	 public function get_help()
    {
        $this->db->select('gh.*, u.first_name,u.last_name,u.email,ur.name');
        $this->db->from("get_help as gh");
        $this->db->join('users as u','u.id = gh.user_id');
        $this->db->join('user_roles as ur','ur.id = u.role_id');
        $this->db->where("gh.status", 1);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	function check_if_rollover_exists($params)
    {	
        $this->db->select('*');
        $this->db->from("student_academic_details");        
        $this->db->where("sd_student_id", $params['sd_student_id'] );
		$this->db->where("sd_academic_year", $params['sd_academic_year'] );
		$this->db->where("sd_school_id", $params['sd_school_id'] );
		$this->db->where("sd_class_id", $params['sd_class_id'] );
		$this->db->where("sd_section_id", $params['sd_section_id'] );
		
		$this->db->where("is_del", '0');
		
        $query = $this->db->get();
		
        $num = $query->num_rows();
        $data = $query->result_array();
		return $num;
    }
	
	function academic_Info($id){
		$sql = "select * from academic_year  where id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	function getcurrent_accademic(){
		$sql = "select * from academic_year  where name='current_year'";
		$q = $this->db->query($sql);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
		
	
	public function get_faqs($params = array())
    {
        $this->db->select('* ');
        $this->db->from("faq");
		$this->db->where("is_del", '0');
        
		
		if(!empty($params['search_text']) && $params['search_text'] != "undefined"  && $params['search_text'] != ""){
				$this->db->where(" (role LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" faq_title LIKE '%".$params['search_text']."%'   ");
				$this->db->or_where(" faq_desc LIKE '%".$params['search_text']."%'  ) ");
			} 
			
			if(!empty($params['sortby']) && $params['sortby'] != "undefined" ){
				$this->db->order_by('faq_id',$params['sortby']);
			}
			
			if(isset($params['status']) && $params['status'] != "undefined" ){
				$this->db->where('faq_status',$params['status']);
			}else{
				$this->db->where('faq_status','1');
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
	 public function get_faq($id)
    {
        $this->db->select('* ');
        $this->db->from("faq");
        $this->db->where("faq_id", $id);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }
	
	function del_faq($data,$id){
		$this->db->where('faq_id',$id);
		$q = $this->db->update('faq',$data);
		return $q;
	}
	
	function faqInfo($id){
		$sql = "select * from faq  where faq_id=?";
		$q = $this->db->query($sql,$id);
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);		
	}
	
}
