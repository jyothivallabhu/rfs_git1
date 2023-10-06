<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model{
	private $tbl_name = 'users';
	
	
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