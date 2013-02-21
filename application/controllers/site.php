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
			$userprofile = $this->facebook->api('/me');
			
			
			$this->load->model('user_model');	 //call model
			$result=$this->user_model->check_fb_user($userprofile);//checks to see if in db, else adds
			
			if ($result) {
				$userid=$this->user_model->get_userid($userprofile);
				
					foreach ($userid as $user)
						{ 
							$id = $user->id;
							$session_user['userid']=$id;
							$session_user['is_logged_in']=1;
							$session_user['fb_id']=$userprofile['id'];
							$session_user['first_name'] = $userprofile['first_name'];
							}
			
			
			
				$this->session->set_userdata($session_user);
			}
			else {};
			redirect(base_url('index.php/Users/site'));
		
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
