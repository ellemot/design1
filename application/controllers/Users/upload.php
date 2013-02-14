<?php

Class Upload extends CI_Controller {

	function __construct() {
	
		parent::__construct();
		$this->load->library('s3');
		$this->load->model('users/picture_model');
		
		$user_auth=$this->session->userdata('is_logged_in');
		if(!$user_auth) {
		redirect (base_url());
		}
		}

		
function index() {

$this->load->view('Users/home');

}
		
	//uploads photo from a file
	function upload_photo()
	{
		$this->load->helper('string');
		
		$user_auth=$this->session->userdata('is_logged_in');
		
		if ($user_auth) {	
			
		if (isset($_POST['submit'])) 
		{
			$data['file']=$_FILES["file"];
			
			$allowedExts = array("jpg", "jpeg", "gif", "png");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/png")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))
			&& ($_FILES["file"]["size"] < 3000000)
			&& in_array($extension, $allowedExts))
				{
					$data['error']=0;
					if ($_FILES["file"]["error"] > 0)
							{
								$data['error']='error loading file';
							}
					else
							{
								$file_location = $_FILES["file"]["tmp_name"];
								$file_name = $this->set_file_name();
								
									if ($file_name==0)
										{
											$file_name=$this->set_file_name();
										}
									
									else 
									{	
										$file_name = $file_name.'.'.$extension;
										
										$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);
										$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
											if($s3result) {
												$this->picture_model->store_photo($file_name);
											}
										
											else {
												$data['error']='Unable to Upload';
												}		
									}
					}
			
			}
			else
				{
				$data['error']='Invalid File Type';
								
				}

			
		}
		else { $data['file']=0; }
		
		$this->load->view('users/site',$data);
}		
		else {
			redirect(base_url());
}
}
		
	
		
	function set_file_name()
	{
	
		$file_name= random_string('numeric',12);
		
		$exists=$this->picture_model->check_name($file_name);
		
		if ($exists)
		{
			$file_name= 0;
		}
		
		else {
			$file_name = $file_name;
		}
		
		return $file_name;
	}
	
	
	
function photo_link() {

	require_once(APPPATH.'/url_to_absolute_2.php');
	$this->image_path= realpath(APPPATH.'/images');
	
	if (isset($_POST['submit1']))
	{
	
		$images = array();
		$link = trim($this->input->post('weblink'));
		
		require_once(APPPATH.'simple_html_dom.php');
		try{
			$html = file_get_html(urldecode(trim($link)));
		}
		catch (exception $e){ 
			$data['error']='Unable to Load Page';
			redirect(base_url('index.php/users/site'));
		}
		
		foreach($html->find('img') as $element)
		{
			$image=$element->src;
			$src= url_to_absolute($link,$image);
			
			$extension = end(explode(".", $image));
			
			if(strlen($extension)>4){
			$extension = 'jpg';
			}
			
			$file_name=$this->set_file_name();
			if ($file_name==0)
				{
				$file_name=$this->set_file_name();
				}
			
			$file_name = $file_name.'.'.$extension;
			$file_location = $this->image_path.'/'.$file_name;
			copy($src,$file_location);
			
			$size=getimagesize($file_location);
			if($size[0]>200) {
				$images[]=$src;
				}
			
			}
		
		
		
		$data['images']=$images;
	}
		$this->load->view('users/test',$data);
		
	}
	
	
	function upload_photo_link()
	{
	
		$this->image_path= realpath(APPPATH.'/images');
		
		$images =json_decode($_POST['images']);
					
		foreach ($images as $image){
			$file_name = $this->set_file_name();
						
			//continue getting file names until get new one
			if ($file_name==0)
				{
				$file_name=$this->set_file_name();
				}
			//place to store image temporarily
			$extension = end(explode(".", $image));
			
			$file_name = $file_name.'.'.$extension;
			
			$file_location = $this->image_path.'/'.$file_name;
			
			copy($image, $file_location);
			
			//initiate bucket
			$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);
			$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
			
			//if s3 responds with something return 1 to the home page view
			if($s3result) {
							
							$this->picture_model->store_photo($file_name);
							
							}
										
			else {
				return 0;
				}	
			 }

	}
		
		
	}	
		