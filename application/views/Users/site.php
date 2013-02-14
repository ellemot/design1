<?php 

include(APPPATH.'/views/templates/header.php');
?>
<div class="users_home">
<div id = "users_nav">
<div id = "button_nav">
<div id = "add_button_left"> <a href=<?php echo base_url('index.php/Users/upload');?>>
<img src= <?php echo base_url('assets/Images/photoicon.fw.png');?>><br>Add Photo </a> </div>
<div id = "add_button_right"> <img src= <?php echo base_url('assets/Images/fileicon.fw.png');?>><br>
Add Project
</div>
</div>
</div>
<?php echo $this->session->userdata('first_name');?> 
<div id = "home_photo_container">
<?php

foreach ($images as $value) 
{
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$value->filename.'" height=300 class= "home_inactive">';
}
?>
</div>
</div>

<div class="push"></div>

<script>

$(document).ready(function(){
	$("a").hover(function(){
		$(this).addclass("button_hover");
		});
		});

		</script>