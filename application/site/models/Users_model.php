<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model{
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
	
	public function get_all_modules()
    {
        $this->db->select('*');
        $this->db->from("modules");
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
	
	public function get_all_users($params = array())
    {
	
        $this->db->select('*, case when (profile_pic is null or profile_pic = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",profile_pic) end as "image_path" ');
        $this->db->from("users");
		$this->db->where("role_id", '2');
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
	
	
	function userInfo($id){
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