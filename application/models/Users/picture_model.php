<?php

	Class Picture_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	function store_photo($new_file_name){
		$data=array(
		'filename'=>$new_file_name,
		'userid'=>$this->session->userdata('userid')
		);
		
		$result=$this->db->insert('pictures',$data);
		return $result;
		
	}
	
	function check_name($new_file_name) {
		
		$this->db->where('filename',$new_file_name);
		$query = $this->db->get('pictures');
		
		if ($query->num_rows()>0)
		{
			return 1;
		}
		
	}
	
	function get_user_photos($userid) {
		$this->db->where('userid', $userid);
		$this->db->select('filename');
		$this->db->order_by("timestamp", "desc"); 
		$result=$this->db->get('pictures');
	
		if ($result->num_rows()>0)
			{
			foreach ($result->result() as $row) 
			{ 	
				$data[]=$row;
			}
				
			return $data;
	}
	else {$data= 0; return $data;}
}


function delete_user_photos($file_name)
{
	$this->db->delete('filename',$file_name);
	$this->db->delete('pictures');
	

	}
		
	}