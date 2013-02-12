<?php

class Site extends CI_Controller 
{

public function __construct() {

	parent::__construct();
	$this->load->library ('session');
	}

function index()
	{
		$data['main_content'] = 'home';
		$this->load->view('template',$data);
		
		}

function login()
	{
	
		$config=array();
		$config['appId']='284754988319059';
		$config['secret']='6f8944dbf85499e83a036886857f3e5d';
		
		$this->load->library('Facebook', $config);
		
		$userid = $this->facebook->getUser();
		
		if($userid) {
			$session_user['userprofile']= $this->facebook->api('/me');
			
			$this->load->model('user_model');	 //call model
			$this->user_model->check_fb_user($session_user['userprofile']);//checks to see if in db, else adds
			
			$this->session->set_userdata($session_user);
			redirect(base_url());
		
		}
		else  {
			$data['main_content']='home';
			$this->load->view('template', $data);
			
		}
	}
	
	
function logout()
{
	$this->session->sess_destroy();
		redirect(base_url());
	
}
}
