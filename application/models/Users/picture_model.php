<?php

	Class Picture_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	function store_photo($data){
		$file_name = $data['file_name'];
		$orig_src=$data['orig_src'];
		$desc=$data['desc'];
		$record=array(
		'filename'=>$file_name,
		'Orig_src'=>$orig_src,
		'userid'=>$this->session->userdata('userid'),
		'Description'=>$desc
		);
		
		$this->db->insert('pictures',$record);
		
		$id = $this->db->insert_id();
		return $id;
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
		$data = array();
		
		$sql='SELECT p.* from pictures p 
		where userid = ? and id not in 
		(SELECT picture_id from picture_map pm
		join contests c on pm.contest_id = c.id
		where c.userid = ? and pm.type = "current")';
		
		$query=$this->db->query($sql, array($userid, $userid));
		
		// $this->db->where('userid', $userid);
		// $this->db->limit(20);
		// $this->db->order_by("timestamp", "desc"); 
		// $query=$this->db->get('pictures');
	
		if ($query->num_rows()>0)
			{
				$data=$query->result_array();
			
		return $data;
	}
	else {$data= 0; return $data;}
}


function delete_user_photos($filename)
{
	$this->db->where('filename',$filename);
	$this->db->delete('pictures');
		}
	
function get_pictureid($filename)
{
	$this->db->select('id');
	$this->db->where('filename',$filename);
	$query = $this->db->get('pictures');
	
	return $query->result_array();
}
	
function delete_map($id){
	$this->db->where('picture_id',$id);
	$this->db->delete('picture_map');
			
	}
	}