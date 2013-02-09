<?php

class email extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index()
	{
	$this->load->view('newsletter');
	
	}
	
	function send_mail()	{
		//can be set in email.php in config folder
		$this->load->library('form_validation');
		
		//field name, error message, validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
		
		if ($this->form_validation->run()==FALSE)
		{ 	
			$this->load->view('newsletter');
		}
		
		else
		{
			$name = $this->input->post('name');
			$email = $this->input->post('Email');
			
			//can put this in config file called email, and then not pass variable
			$config = [
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.googlemail.com',
			'smtp_port'=> 465,
			'smtp_user'=>'lee@easable.com',
			'smtp_pass'=>'Motayed2'];
	
		echo $email;
	
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
		
			$this->email->from('lee@easable.com','Lee Mayer');
			$this ->email->to($email);
			$this->email->subject('Testing Email App from Easable');
			$this->email->message('Hi'.$name.' Reply to tell me it\'s working!');
		
		if($this->email->send()) {
			echo 'thank you';
			}
			else {echo show_error($this->email->print_debugger());}
		
	}
	
	}
	
	}