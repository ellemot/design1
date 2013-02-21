<?php 

include(APPPATH.'/views/templates/header.php');
?>

<div class = "contest_form_container" id = "form_1">
<p>Tell us about your room:</p>

<form name="Contest" enctype = "multipart/form-data" method="post" action=<?php echo base_url('index.php/Contests/site/contest_submit');?>>
<div class = "errors">

<?php if(isset($error))
{print_r($error);}
?>
</div>
<div class = "form_container" id = "form_1">
<div class = "first_row">
<div class = "left_form_1">
<label for="name" id = "title_input">Name your Contest:</label><br>
<input type="text" name="name" value="Contest Name" id="title_input" maxlength="30" onfocus='value=""' 
/>
</div>
<div class = "right_form_1">
<label for="room_type" id = "room_type">Type of Room:</label><br>
<select name="room_type" id="room_type">
	<option value="living_room">Living Room</option>
	<option value="bedroom" selected="selected">Bedroom</option>
	<option value="dining_room">Dining Room</option>
	<option value="study">Study</option>
	<option value="basement">Basement</option>
</select>
</div>
</div>
<div id = "second_row">
<hr class = "style"/>
<div class = "left_form">
<label for="reno_check">Is This a Renovation Project?</label>
<input type="checkbox" name="reno_check" id="reno_check" value="Yes" checked="checked" />
</div>
<div class = "right_form">
<a href = <?php echo base_url('index.php/Contests/site/floor_plan_show');?> id ="floordraw_anchor">Draw a Floor Plan</a>
or <a href = "#floorupload" id = "floorupload_anchor">Upload a Floor Plan</a>
</div>
</div>

<div id = "pictures_row">

<hr class = "style"/>
<div id = "background_photo_form">
Add some pictures of your room - the more the better. <br><br>
<div class = "left_form_photo">
<?php echo '<div>';
	echo form_input('room_photo_hide',"", 'id="file1hide"' );?>
	<a class = "navigation1" onclick = '$("#file1").click();'>Browse</a>
	<?php
	echo form_upload("room_photo[]",'Browse for a file','id = "file1"', 'class="file_hidden"');
	echo '</div>';
?>

<?php echo '<div>';
	echo form_input('room_photo_hide',"", 'id="file2hide"' );?>
	<a class = "navigation1" onclick = '$("#file2").click();'>Browse</a>
	<?php
	echo form_upload("room_photo[]",'Browse for a file','id = "file2"', 'class="file_hidden"');
	echo '</div>';
?>

<?php echo '<div>';
	echo form_input('room_photo_hide',"", 'id="file3hide"' );?>
	<a class = "navigation1" onclick = '$("#file3").click();'>Browse</a>
	<?php
	echo form_upload("room_photo[]",'Browse for a file','id = "file3"', 'class="file_hidden"');
	echo '</div>';
?>
</div>
<div class = "right_form_photo">
<a class = "photo_popup1" href="#"> Add Already Uploaded</a>
</div>
</div>
</div>
	</div>

<a href = # class = "navigation1" id = "next1" >Next: Your Style</a>
</div>


<div class = "contest_form_container" id = "form_2">
<p>Tell us about your style:</p>

<div class = "form_container">
<div class = "first_row">
<div class = "left_form_1">
<label for="not_like" id = "not_like">What DON'T you like about your room:</label><br>
<textarea rows="5" cols="60" name="not_like" id="not_like"></textarea>
</div>
<div class = "right_form_1">
<label for="likes" id = "likes">What you DO like about your room:</label><br>
<textarea rows="5" cols="60" name="likes" id="likes"></textarea>
</div>
</div>
<hr class = "style"/>
<div id = "second_row">

<div class = "left_form">
<label for="color">What colors do you like for the room:</label>
<textarea rows="2" cols="50" name="color" id="color"></textarea>
</div>
<div class = "right_form">
<label for="style">Describe the design style you most prefer:</label>
<textarea rows="2" cols="50" name="style" id="style"></textarea>
</div>
</div>

<div id = "select_row">
<hr class = "style"/>
<p>Pick the picture that most appeals to you</p>
	<div class="design_photos">
	<?php echo form_checkbox('designs[]', 'Traditional', set_checkbox('design', 'Traditional'), 'class = "cbox"');?>
	<img src=<?php echo base_url('assets/Images/Traditional.jpg');?> height=200 class="design_pics">
	</div>
	
	<div class="design_photos">
	<?php echo form_checkbox('designs[]', 'Modern', set_checkbox('design', 'Modern'), 'class = "cbox"');?>
	<img src=<?php echo base_url('assets/Images/Modern.jpg');?> height=200 class="design_pics">
	</div>
	
	<div class="design_photos">
	<?php echo form_checkbox('designs[]', 'Eclectic', set_checkbox('design', 'Eclectic'), 'class = "cbox"');?>
	<img src=<?php echo base_url('assets/Images/Eclectic.jpg');?> height=200 class="design_pics">
	</div>
</div>

<div id = "pictures_row">

<hr class = "style"/>
<div id = "background_photo_form">
Add room inspiration photos: <br><br>
<div class = "left_form_photo">
<?php echo '<div>';
	echo form_input('room_photo_hide',"", 'id="file11hide"' );?>
	<a class = "navigation1" onclick = '$("#file11").click();'>Browse</a>
	<?php
	echo form_upload("inspr_photo[]",'Browse for a file','id = "file11"', 'class="file_hidden"');
	echo '</div>';
?>

<?php echo '<div>';
	echo form_input('room_photo_hide',"", 'id="file21hide"' );?>
	<a class = "navigation1" onclick = '$("#file21").click();'>Browse</a>
	<?php
	echo form_upload("inspr_photo[]",'Browse for a file','id = "file21"', 'class="file_hidden"');
	echo '</div>';
?>

<?php echo '<div>';
	echo form_input('room_photo_hide',"", 'id="file31hide"' );?>
	<a class = "navigation1" onclick = '$("#file31").click();'>Browse</a>
	<?php
	echo form_upload("inspr_photo[]",'Browse for a file','id = "file31"', 'class="file_hidden"');
	echo '</div>';
?>
</div>
<div class = "right_form_photo">
<a class = "photo_popup2" href="#"> Add Already Uploaded</a>
</div>
</div>
</div>
	</div>
<a href = # class = "navigation1" id = "prev2" >Back: Your Room</a>
<input type="submit" value="Submit Form" class = "navigation1" id = "submit" />

</div>

<div id = "contest_user_photos">
<div id = "already_uploaded">
<br>
<a class = "navigation1" id = "close_user_pics1">Submit</a>
<br> <br>

<?php
if(isset($images)){

 foreach ($images as $value) 
{
$filename= $value['filename'];
$src=$value['Orig_src'];
	
	echo '<div class="user_photos">';
	echo form_checkbox('pictures[]', $filename, set_checkbox('pictures', $filename), 'class = "cbox"');
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height=300 class="contest_user_pics1">';
	echo '</div>';
}

}

else { echo 'You don\'t have photos uploaded'; }?>
</div>
</div>



<div id = "contest_inspr_photos">
<div id = "already_uploaded">
<br>
<a class = "navigation1" id = "close_user_pics2">Submit</a>
<br> <br>

<?php
if(isset($images)){

 foreach ($images as $value) 
{
$filename= $value['filename'];
$src=$value['Orig_src'];
	
	echo '<div class="user_photos">';
	echo form_checkbox('inspr_pics[]', $filename, set_checkbox('inspr_pics', $filename), 'class = "cbox"');
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height=300 class="contest_user_pics2">';
	echo '</div>';
}

}

else { echo 'You don\'t have photos uploaded'; }?>
</div>
</div>
</form>				
<script type = "text/javascript">

	
	$(document).ready(function(){
		$("#form_2").hide();
		$("#contest_user_photos").hide();
		$("#contest_inspr_photos").hide();
		$('.cbox').hide();
		});
	
	$(".contest_user_pics1").click(function(){
		$(this).toggleClass('active');
		var checkbox = $(this).parent().find('.cbox');
		checkbox.attr('checked', !checkbox.attr('checked'));
		});
		
	$(".contest_user_pics2").click(function(){
		$(this).toggleClass('active');
		var checkbox = $(this).parent().find('.cbox');
		checkbox.attr('checked', !checkbox.attr('checked'));
		});
		
	$(".design_pics").click(function(){
		$(this).toggleClass('active');
		var checkbox = $(this).parent().find('.cbox');
		checkbox.attr('checked', !checkbox.attr('checked'));
		});
		
			
	$("#next1").click(function(){
		$("#form_2").show();
		$("#form_1").hide();
		$("#contest_user_photos").hide();
		$("#contest_inspr_photos").hide();
	});
		
	$("#prev2").click(function(){
		$("#form_2").hide();
		$("#form_1").show();
	 $("#contest_user_photos").hide();
	 $("#contest_inspr_photos").hide();
	});	
	
	$(".photo_popup1").click(function(){
		$("#form_2").hide();
		$("#form_1").hide();
		$("#contest_user_photos").show();
		$("#contest_inspr_photos").hide();
	});	
	
	$(".photo_popup2").click(function(){
		$("#form_2").hide();
		$("#form_1").hide();
		$("#contest_user_photos").hide();
		$("#contest_inspr_photos").show();
	});	
	
	$("#close_user_pics1").click(function(){
		$("#form_2").hide();
		$("#form_1").show();
		$("#contest_user_photos").hide();
		$("#contest_inspr_photos").hide();
	});	
	
	$("#close_user_pics2").click(function(){
		$("#form_1").hide();
		$("#form_2").show();
		$("#contest_user_photos").hide();
		$("#contest_inspr_photos").hide();
	});	
	
	
	$("#file1").change(function(){
	$('#file1hide').val($(this).val());
	});
	
	$("#file2").change(function(){
	$('#file2hide').val($(this).val());
	});
	
	
	$("#file3").change(function(){
	$('#file3hide').val($(this).val());
	});
	
	
		$("#file11").change(function(){
	$('#file11hide').val($(this).val());
	});
	
	$("#file21").change(function(){
	$('#file21hide').val($(this).val());
	});
	
	
	$("#file31").change(function(){
	$('#file31hide').val($(this).val());
	});
	
	$("#floordraw_anchor").fancybox({
		'width'         : '75%',
		'height'        : '40%',
		'autoScale'     : false,
		'transitionIn'  : 'none',
		'transitionOut' : 'none',
		'type'          : 'iframe'
	});
		
	
</script>	


<?php
$this->load->view('templates/footer');
?>