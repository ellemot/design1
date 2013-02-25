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

$this->load->view('Users/upload_form');

}
		
	//uploads photo from a file
	function upload_photo()
	{
		$this->load->helper('string');
		
		if (isset($_POST['submit'])) 
		{
			$desc=$this->input->post('desc');
			if ($desc!="Description"&&$desc!="")
			{$data['desc']=$desc;}
			else { $data['desc']=NULL;}
			
			
			$data['file']=$_FILES["file"];
			
			$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "PNG", "JPEG", "GIF");
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
								$this->load->view('Users/upload_form.php',$data);
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
													$data['file_name']=$file_name;
													$data['orig_src']=10;
											
													$this->picture_model->store_photo($data);
													$data['error']='Successfully Uploaded Photo';
													redirect(base_url('index.php/Users/site'));
													}
												else {
													$data['error']='Unable to Upload';
													$this->load->view('Users/upload_form.php',$data);
													}		
									}	
					}	
			
			}
			else
				{
				$data['error']='Invalid File Type';
				$this->load->view('Users/upload_form.php',$data);				
				}

			
		}
				
		else {
			redirect(base_url());
			}

	}
	
function set_file_name()
	{
		$file_name= random_string('numeric',12);
		$exists=$this->picture_model->check_name($file_name);
		if ($exists){$file_name= 0;}
		else {$file_name = $file_name;}
		return $file_name;
	}
		
function photo_link() {

$desc=$this->input->post('desc');
			if ($desc!="Description"&&$desc!="")
			{$desc=$desc;}
			else { $desc=NULL;}
			
			$this->session->set_flashdata('desc',$desc);
			
	require_once(APPPATH.'/url_to_absolute_2.php');
	require_once(APPPATH.'simple_html_dom.php');
	$this->image_path= realpath(APPPATH.'/images');
	
if (isset($_POST['submit1']))
	{
	
	$value = $_POST['weblink'];
	if($value !='http://'&&$value!="")
	{
			$images = array();
			$link = trim($this->input->post('weblink'));
				
		 if(preg_match("/https?/", $link) == 0)
		 { $link = 'http://'.$link;}
		
		$link_ext = end(explode('.', $link));
		if ($link_ext =='jpg'||$link_ext=='png'||$link_ext == 'pjpeg'||$link_ext =='jpeg'||$link_ext=='bmp') {
		$this->image_path= realpath(APPPATH.'/images');
		$file_name = $this->set_file_name();
	//continue getting file names until get new one
	if ($file_name==0)
		{
		$file_name=$this->set_file_name();
		}
	//place to store image temporarily
	
	$file_name = $file_name.'.'.$link_ext;
			
	$file_location = $this->image_path.'/'.$file_name;
	copy($link, $file_location);
			
	//initiate bucket
	$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);
	$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
			
	//if s3 responds with something return 1 to the site page view
	if($s3result) {
		$data['file_name']=$file_name;
		$data['orig_src']=$link;
		$data['desc']=$desc;
		$this->picture_model->store_photo($data);	
		unlink($file_location);
		}
	else {
			return 0;
		}	
	
	redirect(base_url('index.php/Users/site'));
	}		
		
	else {
			
		try{
			$html = file_get_html(urldecode(trim($link)));
		}
		catch (exception $e){ 
			$data['error']='Error:'.$e;
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
			copy($src,$file_location);//copy over file source
			
			$size=getimagesize($file_location);
			if($size[0]>200) {
				$images[]=$src;
				}//only images over certain width
			unlink($file_location);
			}//end foreach
		$data['images']=$images;
		$this->load->view('Users/test',$data);
		} }
	else
	{ 	
		$data['error']='No url entered, please enter';
		$this->load->view('Users/upload_form',$data);
	}
	}	
	else { 
	$data['error']='Please Hit Submit';
	redirect(base_url('index.php/Users/upload_form'),$data);
	}
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
	
	if(strlen($extension)>4){
				$extension = 'jpg';
				}
				
	$file_name = $file_name.'.'.$extension;
			
	$file_location = $this->image_path.'/'.$file_name;
	copy($image, $file_location);
			
	//initiate bucket
	$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);
	$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
			
	//if s3 responds with something return 1 to the site page view
	if($s3result) {
		$data['desc']=$this->session->flashdata('desc');
		$data['file_name']=$file_name;
		$data['orig_src']=$image;
		$this->picture_model->store_photo($data);	
		unlink($file_location);
		}
	else {
			return 0;
		}	
}//end foreach

	}

function delete_photo(){
	$images = array(json_decode($_POST['images']));
	
	
	foreach ($images as $image)
	{ 
	 $filename = substr(strrchr($image, '/'), 1);
	 $this->picture_model->delete_user_photos($filename);
	}
	
	}
		
		}