<?php
Class Site extends CI_Controller {

function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->model('Contests/contest_model');
	$this->load->model('Users/picture_model');
	$user_auth=$this->session->userdata('is_logged_in');
		if(!$user_auth) {
		redirect (base_url());
		}
	}



function index()
{
	
	$userid =$this->session->userdata('userid');
	$data['images'] = $this->picture_model->get_user_photos($userid);
	$this->load->view('Contests/project_form',$data);
	
	
}


function floor_plan_show()

{
	$this->load->view('Contests/floor_draw');
}

function contest_submit()
{
	if (!empty($_POST))
	{	//setup basic form data
		$data['userid']=$this->session->userdata('userid');
		$data['name']=$this->input->post('name');
		$data['room_type']=$this->input->post('room_type');
		$reno = $this->input->post('reno_check');
		if($reno)
		{$data['renovation']='yes';}
		else {$data['renovation']='no';}
		$data['likes']=$this->input->post('likes');
		$data['not_likes']=$this->input->post('not_like');
		$data['colors']=$this->input->post('color');
		$data['style']=$this->input->post('style');
			
		
		$id['contestid']=$this->contest_model->upload_form($data);
		
		
		
		//if room_photo uploaded
		if($_FILES["room_photo"]["name"][0]!="")
		{
				$numfiles = count($_FILES["room_photo"]['name']);
								
			for($i=0; $i<$numfiles; $i++) {
				if ($_FILES["room_photo"]["name"][$i]!=""){
				$data['file']=$_FILES["room_photo"];
				$allowedExts = array("jpg", "jpeg", "gif", "png");
				$extension = end(explode(".", $_FILES["room_photo"]["name"][$i]));
				if ((($_FILES["room_photo"]["type"][$i] == "image/gif")
				|| ($_FILES["room_photo"]["type"][$i] == "image/jpeg")
				|| ($_FILES["room_photo"]["type"][$i] == "image/png")
				|| ($_FILES["room_photo"]["type"][$i] == "image/pjpeg"))
				&& ($_FILES["room_photo"]["size"][$i] < 3000000)
				&& in_array($extension, $allowedExts))
				{
					$data['error']=0;
					if ($_FILES["room_photo"]["error"][$i] > 0)
							{
								$data['error']='error loading file';
								// $this->load->view('Contests/project_form.php',$data);
							}
				
				else
							{
								$file_location = $_FILES["room_photo"]["tmp_name"][$i];
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
													
													$id['pictureid']=$this->picture_model->store_photo($data);
													
													$this->contest_model->set_map_current($id);
													
													
													}
												else {
													$data['error']='Unable to Upload';
													// $this->load->view('Contests/project_form',$data);
													}		
									}	
					}	
			
			}
			else
				{
				$data['error']=$_FILES["room_photo"];
				// redirect(base_url('index.php/Contests/site'));			
				}
}//end name check
}	//end for		
		}//endif isset for uploading room photos
		
		//room pics selected from uploaded
		if (!empty($_POST['pictures']))
			{
				foreach($_POST['pictures'] as $picture){
					$filename = $picture;
					$data['pictureid'] = $this->picture_model->get_pictureid($filename);
					$id['pictureid']=$data['pictureid'][0]['id'];
					$this->contest_model->set_map_current($id);
					
					}
				}
				
			//room pics from uploaded
			if (!empty($_POST['inspr_pics']))
			{
				foreach($_POST['inspr_pics'] as $pic){
					$filename = $pic;
					$data['pictureid'] = $this->picture_model->get_pictureid($filename);
					$id['pictureid']=$data['pictureid'][0]['id'];
					$this->contest_model->set_map_inspiration($id);
					
					}
				}
				
	//if room_photo uploaded
		if($_FILES["inspr_photo"]["name"][0]!="")
		{
				$numfiles = count($_FILES["inspr_photo"]['name']);
								
			for($i=0; $i<$numfiles; $i++) {
				if ($_FILES["inspr_photo"]["name"][$i]!=""){
				$data['file']=$_FILES["inspr_photo"];
				$allowedExts = array("jpg", "jpeg", "gif", "png");
				$extension = end(explode(".", $_FILES["inspr_photo"]["name"][$i]));
				if ((($_FILES["inspr_photo"]["type"][$i] == "image/gif")
				|| ($_FILES["inspr_photo"]["type"][$i] == "image/jpeg")
				|| ($_FILES["inspr_photo"]["type"][$i] == "image/png")
				|| ($_FILES["inspr_photo"]["type"][$i] == "image/pjpeg"))
				&& ($_FILES["inspr_photo"]["size"][$i] < 3000000)
				&& in_array($extension, $allowedExts))
				{
					$data['error']=0;
					if ($_FILES["inspr_photo"]["error"][$i] > 0)
							{
								$data['error']='error loading file';
								// $this->load->view('Contests/project_form.php',$data);
							}
				
				else
							{
								$file_location = $_FILES["inspr_photo"]["tmp_name"][$i];
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
													
													$id['pictureid']=$this->picture_model->store_photo($data);
													
													$this->contest_model->set_map_inspiration($id);
													
													
													}
												else {
													$data['error']='Unable to Upload';
													// $this->load->view('Contests/project_form',$data);
													}		
									}	
					}	
			
			}
			else
				{
				$data['error']=$_FILES["inspr_photo"];
				// redirect(base_url('index.php/Contests/site'));			
				}
}//end name check
}	//end for		
		}//endif isset for uploading room photos				
				
				
				
				
				
				
		$this->load->view('Contests/test',$data);
		
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
		
		
	
}
