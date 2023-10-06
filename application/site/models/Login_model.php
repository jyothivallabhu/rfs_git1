<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_Model
{
	public function verify($uname,  $school_id  )
	{
		$school = ($school_id !='') ? 'school_id ='.$school_id : 'school_id IS NULL';	
		$sql = "select u.*,r.dashboard_controller, case when (profile_pic is null or profile_pic = '') then '".base_url()."assets/images/user.png' else concat('".base_url()."',profile_pic) end as 'image_path' from users u inner join user_roles r on r.id = u.role_id  where u.status = '1' and u.is_del=0 and u.role_id !='8' and email = '$uname' and $school ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	
	function insert($data){
		$q = $this->db->insert('user_tracking', $data);
		return $q;
	}
	
	public function getSchoolInfoByName($name){
		$sql = "select *, case when (logo is null or logo = '') then 'assets/images/school.png' else logo end as 'logo' from schools  where url_slug='$name' and is_del = 0 and status = 1";
		$q = $this->db->query($sql);
		$num = $q->num_rows();
		$data='';

		if($num==1){
			$data=$q->result_array();
			$data = $data[0];	
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function getUser($id){
		$sql = "select * from users where `id`=? ";
		$q = $this->db->query($sql,array($id));
		$num=$q->num_rows();
		$data="";
		if($num>0){
			$data=$q->result_array();
		}
		return array('num'=>$num,'data'=>$data);	
	}
	function modify($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update('users',$data);
		return $q;
		
	}
	
	function validateEmail($email){
		$sql ="select u.* from users as u where u.email = ?";
		$q = $this->db->query($sql,array($email));
		$num=$q->num_rows();
		$data="";
		if($num>0){
			$data=$q->result_array();
		}
		return array('num'=>$num,'data'=>$data);	
	}	
	function validate_email($email){
		$this->db->where('md5(e.email)',$email);
		$q = $this->db->get("users as e");
		$num = $q->num_rows();
		$data='';
		if($num==1){
			$data = $q->result_array();
		}
		return array('num'=>$num,'data'=>$data);
	}
	
	function modify_usertracking($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update('users',$data);
		return $q;
		
	}
	
	/* function update_eml_actvtn($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update($this->tbl_name,$data);
	} */
	
}
