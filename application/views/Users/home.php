<?php 

include(APPPATH.'/views/templates/header.php');
?>
<div id = "users_nav">
<div id = "button_nav">
<a href=<?php echo base_url('index.php/Users/upload');?>><div id = "add_button_left"> 
<img src= <?php echo base_url('assets/Images/photoicon.fw.png');?>><br>Add Inspiration</div></a>
<a href=<?php echo base_url('index.php/Contests/site');?>><div id = "add_button_right"> 
<img src= <?php echo base_url('assets/Images/fileicon.fw.png');?>><br>
Add Design Contest
</div></a>
</div>
</div>
<?php echo $this->session->userdata('userid');?> 
<div class = "errors">

<?php if(isset($error))
{echo $error;}
?>
</div>
<?php if ($contest_pics):?>
<div id = "home_contest_container">
<h1 id = "contest_head"><?php echo $this->session->userdata('first_name');?>, Your Current Contests:</h1>
<?PHP
foreach($contest_pics as $contest) {
if (!empty($contest['files'])){
$name= $contest['contest_name'];
$picture= $contest['files'][0]['filename'];

echo '<div class = "user_photos">';
echo '<img src="https://s3.amazonaws.com/easableimages/'.$picture.'" height=300 width = 300 class="home_user_contest">';
echo '<div id="title_contest_div"><h1 id = "title_contest">'.$name.'</h1></div>';
echo '</div>';

}
else {echo 'no picture';}}
?>
</div>
<?php endif?>

<div id = "home_photo_container">
<br>
<h1 id = "contest_head"><?php echo $this->session->userdata('first_name');?>, Your Inspiration Pictures: </h1><br><br>
<?php
if($images!=0):


 foreach ($images as $value) 
{
$filename= $value['filename'];
$src=$value['Orig_src'];
	
	echo '<div class="user_photos">';
	echo '<a href="" title ="add to design board"><img class = "photo_hidden" src='.base_url('assets/Images/addicon.fw.png').'></a>';
	echo '<a href=# title ="delete"><img class = "photo_hidden2" src='.base_url('assets/Images/delicon.fw.png').'></a>';
	echo '<a href='.$src.'>';
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height=300 class="home_user_pics">';
	echo '</a>';
	echo '</div>';
}



else : ?>
<div class = "photo_form_container">

<input type = "submit" name = "photo_submit" id="upload_cancel" class = "submit" 
value = "Cancel and Return">
<br><br><br><br>
<p>Let's Get Started: Upload a Photo</p><br><br>

<?php

	$this->load->helper('form');
	echo '<div class = "photo_form">';
	echo form_open_multipart('users/upload/upload_photo');
	echo '<div class = "input_photo"> Browse for a file';
	echo form_upload("file",'Browse for a file','class="file_hidden"');
	echo '</div>';
	echo form_submit("submit", "submit", 'class="submit"');
	echo form_close();
	echo '</div>';
	

	echo '<div class = "photo_form">';
	echo form_open('users/upload/photo_link');?>
	<input type="text" name="weblink" value="http://" id="photo_link"  class="input_photo" 
	onfocus="value=''" onblur="value=value" />
	<?php
	echo form_submit("submit1", 'submit', 'class="submit"');
	echo form_close();
	echo '</div>';
	
?>
<br><br>
</div>


<?php endif
?>
	
<div id = "push"></div>

<script>

$(document).ready(function(){
	$("a").hover(function(){
		$(this).addclass("button_hover");
		});
		
	$(".photo_hidden").hide();
	$(".photo_hidden2").hide();
	
	$(".user_photos").hover(function(){
		$(this).find(".photo_hidden").show();
		$(this).find(".photo_hidden2").show();
		});
	
	$(".user_photos").mouseleave(function(){
		$(this).find(".photo_hidden").hide();
		$(this).find(".photo_hidden2").hide();
		});
	
	$('.photo_hidden2').bind('click', function() {
		var values = JSON.stringify($(this).parent().parent().find(".home_user_pics").attr('src'));
		// alert(values);
		if(confirm('Delete this photo from your collection?')){
			$.ajax({        
					type: 'POST',
					url: '/test/design/index.php/users/upload/delete_photo',
					data: {images:values},
					success: function(data){
						location.reload();
						}
					 });
					
		}	
		
		
		});
});
	
		</script>
		
		<?php 

include(APPPATH.'/views/templates/footer.php');
?>