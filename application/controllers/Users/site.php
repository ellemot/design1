<?php

Class Site extends CI_Controller {

	function __construct() {
	
	parent::__construct();
	$this->load->library('session');
	$this->load->model('Users/picture_model');
	$this->load->model ('Contests/contest_model');
	$user_auth=$this->session->userdata('is_logged_in');
		if(!$user_auth) {
		redirect (base_url());
		}
	}
	
	function index() {
	
	$userid =$this->session->userdata('userid');
	$query['contests']=$this->contest_model->get_user_contests($userid);
	$data['contest_pics']=array();
	foreach ($query['contests'] as $contest)
	{
		$contest_id = $contest['id'];
		$contest_name = $contest['contest_name'];
		$data['contest_pics'][$contest_id]['contest_id']= $contest_id;
		$data['contest_pics'][$contest_id]['contest_name']= $contest_name;
		
		$data['contest_pics'][$contest_id]['files']=$this->contest_model->get_contest_photos($contest_id);
	}
		
	
	$data['images'] = $this->picture_model->get_user_photos($userid);
	
	$this->load->view('Users/home',$data);
		
	}
}

