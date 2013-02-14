<?php


class User_model extends CI_Model { 
	function __construct() {
	 parent::__construct();

	 }
	
	
	function check_fb_user($userprofile) {
	
	$fb_id = $userprofile['id'];
	$fb_username=$userprofile['username'];
	$first_name=$userprofile['first_name'];
	$last_name=$userprofile['last_name'];
	$email=$userprofile['email'];
	
	
	$location_array=$userprofile['location'];
	$location=$location_array['name'];
		
	$this->db->where('fb_id', $fb_id);
	$query = $this->db->get('users');
		
	if ($query->num_rows>0) {
		return true; 
			}
			
		else 
		{
		 $user=[
			'fb_id'=>$fb_id,
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'email'=>$email,
			'location'=>$location,
			'fb_username'=>$fb_username
			];
		
			$this->db->insert('users', $user);
			return true;		
		
		}
		
		}
		
function get_userid($userprofile) 
{
	$fb_id = $userprofile['id'];
	
	$this->db->select('id');
	$this->db->where('fb_id', $fb_id);
	$query=$this->db->get('users');
	
	return $query->result();
}
	
		
		}