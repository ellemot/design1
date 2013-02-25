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

<div class = "errors">

<?php if(isset($error))
{echo $error;}
?>
</div>
<?php if (isset($contest_pics)&&!empty($contest_pics)&&$contest_pics!=0):?>
<div id = "home_contest_container">
<h1 id = "contest_head"><?php echo $this->session->userdata('first_name');?>, Your Current Contests:</h1>
<?PHP
foreach($contest_pics as $contest) {
if (!empty($contest['files'])){
$name= $contest['contest_name'];
$picture= $contest['files'][0]['filename'];
$id = $contest['contest_id'];

echo '<div class = "user_photos" id = "contest_photos">';
echo '<a class = "contest_show" href ="'.base_url('index.php/Contests/site/show_contest/'.$id).'">';
echo '<img src="https://s3.amazonaws.com/easableimages/'.$picture.'" height=230  class="home_user_contest">';
echo '<div id="title_contest_div"><h1 id = "title_contest">'.$name.'</h1></div>';
echo '</a>';
echo '</div>';

}
else {

$id = $contest['contest_id'];
$name= $contest['contest_name'];
echo '<div class = "user_photos" id = "contest_photos">';
echo '<a class = "contest_show" href ="'.base_url('index.php/Contests/site/show_contest/'.$id).'">';
echo '<img src="'.base_url('assets/Images/linen_pop_up_fw.png').'" height=230  class="home_user_contest">';
echo '<div id="title_contest_div"><h1 id = "title_contest">'.$name.'</h1></div>';
echo '</a>';
echo '</div>';



}}
?>
</div>
<?php endif?>

<div id = "home_photo_container">
<br>

<?php
if(isset($images)&&$images!=0):?>
<h1 id = "contest_head"><?php echo $this->session->userdata('first_name');?>, Your Design Inspiration: </h1><br><br>
<?php
foreach ($images as $value) 
{
$filename= $value['filename'];
$src=$value['Orig_src'];

	echo '<div class="user_photos">';
	echo '<a href="" title ="add to design board"><img class = "photo_hidden" src='.base_url('assets/Images/addicon.fw.png').'></a>';
	echo '<a href=# title ="delete"><img class = "photo_hidden2" src='.base_url('assets/Images/delicon.fw.png').'></a>';
	if($src!=10){echo '<a class = "pic_anchor" href='.$src.'>';} else {echo '<a class = "pic_anchor" href="https://s3.amazonaws.com/easableimages/'.$filename.'">';}
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height=150 class="home_user_pics">';
	echo '</a>';
	echo '</div>';
}



else : ?>
<div class = "photo_form_container">
<p>Let's Get Started: Add Inspiration Photos for Your Project</p>
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
</div>
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
	
	
$(".pic_anchor").fancybox({
		'height'		: '80%',
		'width'			: '50%',
		'autoScale'     : false,
		'transitionIn'  : 'none',
		'transitionOut' : 'none',
		'type'          : 'iframe'
	});
	
	
$(".contest_show").fancybox({
		'height'		: '90%',
		'width'			: '90%',
		'autoScale'     : false,
		'transitionIn'  : 'none',
		'transitionOut' : 'none',
		'type'          : 'iframe'
	});
	
		</script>
		
		<?php 

include(APPPATH.'/views/templates/footer.php');
?>