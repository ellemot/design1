<?php 

include(APPPATH.'/views/templates/header.php');
?>
<div class="users_home">
<div id = "users_nav">
<div id = "button_nav">
<div id = "add_button_left"> <a href=<?php echo base_url('index.php/Users/upload');?>>
<img src= <?php echo base_url('assets/Images/photoicon.fw.png');?>><br>Add Photo </a></div>
<div id = "add_button_right"> <img src= <?php echo base_url('assets/Images/fileicon.fw.png');?>><br>
Add Project
</div>
</div>
</div>
<?php echo $this->session->userdata('userid');?> 
<div class = "errors">

<?php if(isset($error))
{echo $error;}
?>
</div>

<div id = "home_photo_container">
<?php
if(isset($images)){
foreach ($images as $value) 
{
	echo '<div class="user_photos">';
	echo '<a href="" title ="add to design board"><img class = "photo_hidden" src='.base_url('assets/Images/addicon.fw.png').'></a>';
	echo '<img class = "photo_hidden2" src='.base_url('assets/Images/delicon.fw.png').'>';
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$value->filename.'" height=300 class= "home_inactive">';
	echo '</div>';
}}

else {echo 'Get started now!';}
?>

</div>
</div>

<div class="push"></div>

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
		var values = JSON.stringify($(this).parent().find('.home_inactive').attr('src'));
		if(confirm('Delete?')){
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