<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reports_model extends CI_Model{
	
	function query($query) {
	  $q = $this->db->query($query);
	  $num=  $q->num_rows();
	  $data= array();
	  if($num>0){
		  $data = $q->result();
	  }
	  return array('num'=>$num,'data'=>$data);
	}
	
	
}
?>