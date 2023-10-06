<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
	
	private $tbl_name = 'users';
	
	function validate($email,$pwd){		
		$sql = "select
					u.* 
				from
					$this->tbl_name as u 
			    where
					u.`email`=? and u.`password`=?";
		$q = $this->db->query($sql,array($email,$pwd));
		
		$num=$q->num_rows();
		$data="";
		if($num>0){
			$data=$q->result_array();
			$data=$data[0];
		}
		return array('num'=>$num,'data'=>$data);	
	}
	
	public function verify($email){
		/* $sql = "SELECT u.*from users u
				WHERE u.email = '$email' and u.role_id ='8' "; */
				
				
		$sql = "SELECT u.*from users u join schools s on s.id = u.school_id WHERE u.email = '$email' and u.role_id ='8' and u.is_del=0 and u.status = '1' AND s.is_del = 0 AND s.status = 1"; 
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function getUser($id){
		$sql = "select * from $this->tbl_name where `id`=? ";
		$q = $this->db->query($sql,array($id));
		$num=$q->num_rows();
		$data="";
		if($num>0){
			$data=$q->result_array();
		}
		return array('num'=>$num,'data'=>$data);	
	}
	
	function getParentId($name){
		$sql = "select * from $this->tbl_name where `name`=? ";
		$q = $this->db->query($sql,array($name));
		$num=$q->num_rows();
		$data="";
		if($num>0){
			$data=$q->result_array();
		}
		return array('num'=>$num,'data'=>$data);	
	}
	
	function modify($data,$id){
		$this->db->where('id',$id);
		$q = $this->db->update($this->tbl_name,$data);
		return $q;
		
	}
	
	function isEmailExists($email,$name){		
		return  $this->db->where('email',$email)->where('name',$name)->where('status',1)->get($this->tbl_name)->result();			
	}	
	function isUserExists($name,$email){		
		$sql = "select * from $this->tbl_name where `name`=? and `email`=? ";
		$q = $this->db->query($sql,array($name,$email));
		$num=$q->num_rows();
		$data="";
		if($num>0){
			$data=$q->result_array();
		}
		return array('num'=>$num,'data'=>$data);			
	}	
	
	function insert_user($data){
		$q = $this->db->insert($this->tbl_name, $data);
		return $q;
	}
    
	function getAllSchools(){
		$this->db->select('*');
		$this->db->where('status', '1');
		$this->db->where('is_del', '0');
		$q = $this->db->get("schools");
		
		$num = $num = $q->num_rows();
		$data = "";
		if ($num > 0) {
			$data = $q->result();
		}
		return array('num' => $num, 'data' => $data);
	}
	
	
	function validateEmail($email){
		$sql ="select u.* from users as u where u.is_del = '0' and  u.status = '1' and u.role_id= 8 and  u.email = ?";
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
}
