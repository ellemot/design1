<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand|Imprima' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href=<?php echo base_url("assets/Scripts/jquery.fancybox.css")?> type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/main.css");?> />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.cycle.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fancybox.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fancybox.pack.js")?>></script>
		


<?php
$id =  $contest_data[0]['id'];
$name = $contest_data[0]['contest_name'];
$room_type = $contest_data[0]['room_type'];
$reno_check = $contest_data[0]['renovation'];
$likes =  $contest_data[0]['likes'];
$not_likes =  $contest_data[0]['not_likes'];
$colors = $contest_data[0]['colors'];
$style = $contest_data[0]['style'];
$modern = $contest_data[0]['modern'];
$traditional = $contest_data[0]['traditional'];
$eclectic = $contest_data[0]['eclectic'];
?>
<br><br><br>
<div class = "contest_form_container" id = "form_1">
<p>Room Details:</p>

<form name="Contest" enctype = "multipart/form-data" method="post" action=''>
<div class = "errors">

<?php if(isset($error))
{print_r($error);}
?>
</div>
<div class = "form_container" id = "form_1">
<div class = "first_row">
<div class = "left_form_1">
<label for="name" id = "title_input">Contest Name:</label><br>
<input type="text" name="name" value="<?php echo $name; ?>" id="title_input_view" maxlength="30" onfocus='value=""' 
/>
</div>
<div class = "right_form_1">
<label for="room_type" id = "room_type">Type of Room:</label><br>
<select name="room_type" id="room_type_view">
	<option value="living_room" <?php if ($room_type == "living_room") {echo 'selected="selected"';}?>>Living Room</option>
	<option value="bedroom" <?php if ($room_type == "bedroom") {echo 'selected="selected"';}?>>Bedroom</option>
	<option value="dining_room"<?php if ($room_type == "dining_room") {echo 'selected="selected"';}?>>Dining Room</option>
	<option value="study" <?php if ($room_type == "study") {echo 'selected="selected"';}?>>Study</option>
	<option value="basement" <?php if ($room_type == "basement") {echo 'selected="selected"';}?>>>Basement</option>
</select>
</div>
</div>
<div id = "second_row">
<hr class = "style"/>
<div class = "left_form">
<label for="reno_check">Is This a Renovation Project?</label>
<input type="checkbox" name="reno_check" id="reno_check" value="Yes" <?php if($reno_check =="yes") {echo 'checked = "checked"';}?> />
</div>
<div class = "right_form">
<a href = <?php echo base_url('index.php/Contests/site/floor_plan_show');?> id ="floordraw_anchor">Draw a Floor Plan</a>
or <a href = "#floorupload" id = "floorupload_anchor">Upload a Floor Plan</a>
</div>
</div>

<div id = "pictures_row">

<hr class = "style"/>
<div id = "background_photo_form">
Pictures of Your Room: <br><br>
<?php foreach ($contest_files_curr as $file)
{ 
	$filename =  $file['filename'];
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height = 200px class = "home_user_pics">';
}
?>
</div>
</div>
	</div>

</div>


<div class = "contest_form_container" id = "form_2">
<p>Tell us about your style:</p>

<div class = "form_container">
<div class = "first_row">
<div class = "left_form_1">
<label for="not_like" id = "not_like">What don't you like about your room:</label><br>
<textarea rows="5" cols="60" name="not_like" id="not_like_view"><?php echo $likes;?></textarea>
</div>
<div class = "right_form_1">
<label for="likes" id = "likes">Describe the room and its use:</label><br>
<textarea rows="5" cols="60" name="likes" id="likes_view" ><?php echo $not_likes;?></textarea>
</div>
</div>
<div id = "second_row">
<hr class = "style"/>
<div class = "left_form">
<label for="color">What colors do you like for the room:</label>
<textarea rows="2" cols="50" name="color" id="color_view"><?php echo $colors;?></textarea>
</div>
<div class = "right_form">
<label for="style">Describe the design style you most prefer:</label>
<textarea rows="2" cols="50" name="style" id="style_view" ><?php echo $style;?></textarea>
</div>
</div>
<div id = "select_row">
<hr class = "style"/>
<p>The style you most like</p>

<?php 
if($modern!=NULL){echo '<img src="'.base_url('assets/Images/Modern.jpg').'" height=200 class="design_pics">';}
if($traditional!=NULL){echo '<img src="'.base_url('assets/Images/Traditional.jpg').'" height=200 class="design_pics">';}
if($eclectic!=NULL){echo '<img src="'.base_url('assets/Images/Eclectic.jpg').'" height=200 class="design_pics">';}
?>
</div>
<div id = "pictures_row">

<hr class = "style"/>
<div id = "background_photo_form">
Your Inspiration Photos: <br><br>

<?php foreach ($contest_files_insp as $file)
{ 
	$filename =  $file['filename'];
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height = 100px class = "home_user_pics">';
}
?>

</div>
</div>
</div>
	

</div>

<div id = "contest_user_photos">
<div id = "already_uploaded">
<br>
<a class = "navigation1" id = "close_user_pics1">Submit</a>
<br> <br>

<?php
// if(isset($images)){

 // foreach ($images as $value) 
// {
// $filename= $value['filename'];
// $src=$value['Orig_src'];
	
	// echo '<div class="user_photos">';
	// echo form_checkbox('pictures[]', $filename, set_checkbox('pictures', $filename), 'class = "cbox"');
	// echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height=300 class="contest_user_pics1">';
	// echo '</a>';
	// echo '</div>';
// }

// }

// else { echo 'You don\'t have photos uploaded'; }
?>
</div>
</div>



<div id = "contest_inspr_photos">
<div id = "already_uploaded">
<br>
<a class = "navigation1" id = "close_user_pics2">Submit</a>
<br> <br>

<?php
// if(isset($images)){

 // foreach ($images as $value) 
// {
// $filename= $value['filename'];
// $src=$value['Orig_src'];
	
	// echo '<div class="user_photos">';
	// echo form_checkbox('inspr_pics[]', $filename, set_checkbox('inspr_pics', $filename), 'class = "cbox"');
	// echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height=300 class="contest_user_pics2">';
	// echo '</a>';
	// echo '</div>';
// }

// }

// else { echo 'You don\'t have photos uploaded'; }
?>
</div>
</div>
</form>				
<script type = "text/javascript">

	
	$(document).ready(function(){
		$("#contest_user_photos").hide();
		$("#contest_inspr_photos").hide();
		});
	
	// $(".contest_user_pics1").click(function(){
		// $(this).toggleClass('active');
		// var checkbox = $(this).parent().find('.cbox');
		// checkbox.attr('checked', !checkbox.attr('checked'));
		// });
		
	// $(".contest_user_pics2").click(function(){
		// $(this).toggleClass('active');
		// var checkbox = $(this).parent().find('.cbox');
		// checkbox.attr('checked', !checkbox.attr('checked'));
		// });
		
			
	// $("#next1").click(function(){
		// $("#form_2").show();
		// $("#form_1").hide();
		// $("#contest_user_photos").hide();
		// $("#contest_inspr_photos").hide();
	// });
		
	// $("#prev2").click(function(){
		// $("#form_2").hide();
		// $("#form_1").show();
	 // $("#contest_user_photos").hide();
	 // $("#contest_inspr_photos").hide();
	// });	
	
	// $(".photo_popup1").click(function(){
		// $("#form_2").hide();
		// $("#form_1").hide();
		// $("#contest_user_photos").show();
		// $("#contest_inspr_photos").hide();
	// });	
	
	// $(".photo_popup2").click(function(){
		// $("#form_2").hide();
		// $("#form_1").hide();
		// $("#contest_user_photos").hide();
		// $("#contest_inspr_photos").show();
	// });	
	
	// $("#close_user_pics1").click(function(){
		// $("#form_2").hide();
		// $("#form_1").show();
		// $("#contest_user_photos").hide();
		// $("#contest_inspr_photos").hide();
	// });	
	
	// $("#close_user_pics2").click(function(){
		// $("#form_1").hide();
		// $("#form_2").show();
		// $("#contest_user_photos").hide();
		// $("#contest_inspr_photos").hide();
	// });	
	
	
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

