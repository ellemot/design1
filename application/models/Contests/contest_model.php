<?php

Class Contest_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
function upload_form($data){

	$insert = array(
	'userid'=>$data['userid'],
	'contest_name'=>$data['name'],
	'room_type'=>$data['room_type'],
	'likes'=>$data['likes'],
	'renovation'=>$data['renovation'],
	'not_likes'=>$data['not_likes'],
	'colors'=>$data['colors'],
	'style'=>$data['style'],
	'modern'=>$data['modern'],
	'traditional'=>$data['traditional'],
	'eclectic'=>$data['eclectic']
	);
	$this->db->insert('contests', $insert);

	$id=$this->db->insert_id();
	return $id;
}
	
function set_map_current($id) {
$insert = array(
'picture_id'=>$id['pictureid'],
'contest_id'=> $id['contestid'],
'type' => 'current');

$this->db->insert('picture_map',$insert);

	}
	
	
function set_map_inspiration($id) {
$insert = array(
'picture_id'=>$id['pictureid'],
'contest_id'=> $id['contestid'],
'type' => 'inspiration');

$this->db->insert('picture_map',$insert);

	}
	
	
	function get_user_contests($userid) {
		$data = array();
		$this->db->where('userid', $userid);
		$this->db->limit(20);
		$this->db->order_by("timestamp", "desc"); 
		$query=$this->db->get('contests');
	
		if ($query->num_rows()>0)
			{
				$data=$query->result_array();
			
		return $data;
	}
	else {$data= 0; return $data;}
}


	
function get_contest($contest_id) {
		$this->db->where('id', $contest_id);
		$query=$this->db->get('contests');
	
		if ($query->num_rows()>0)
			{
				$data=$query->result_array();
			
		return $data;
	}
	else {$data= 0; return $data;}
}


function get_contest_photos($contest_id) {
	$sql = "SELECT filename FROM Pictures p JOIN Picture_map pm ON p.id = pm.picture_id WHERE pm.contest_id = ? and pm.type='inspiration'";
	$query = $this->db->query($sql,$contest_id); 
	return $query->result_array();
	}
	
function get_contest_photos_current($contest_id) {
	$sql = "SELECT filename FROM Pictures p JOIN Picture_map pm ON p.id = pm.picture_id WHERE pm.contest_id = ? and pm.type='current'";
	$query = $this->db->query($sql,$contest_id); 
	return $query->result_array();
	}
	}