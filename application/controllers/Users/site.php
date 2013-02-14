<?php

Class Site extends CI_Controller {

	function __construct() {
	
	parent::__construct();
	$this->load->library('session');
	$this->load->model('Users/picture_model');
	$user_auth=$this->session->userdata('is_logged_in');
		if(!$user_auth) {
		redirect (base_url());
		}
	}
	
	function index() {
	
	$userid =$this->session->userdata('userid');
	$rows = $this->picture_model->get_user_photos($userid);
	if($rows==0)
	{
		$data['images']=0;
		 $this->load->view('Users/site',$data);
	}
	
	else{
			$data['images']=$rows;
			 $this->load->view('Users/site',$data);
	}
	
	}
}

