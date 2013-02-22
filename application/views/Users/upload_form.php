<?php 

include(APPPATH.'/views/templates/header.php');
?>



<div class = "photo_form_container">

<input type = "submit" name = "photo_submit" id="upload_cancel" class = "navigation1" 
value = "Return Home">
<br><br><br><br>
<p>Upload photo from a file or from a website:</p>
<div class = "error">
<?php 
	if (isset($error))
		{echo $error;}
	else {echo '';}		
?>
</div>
<div class = "upload_form_container">
<?php

	$this->load->helper('form');
	echo '<div class = "photo_form">';
	echo form_open_multipart('users/upload/upload_photo');
	echo '<div>';
	echo '<input class = "input_photo" value = "Browse for file" id = "photo_cover" type = "text" name = "cover">';?>
		<a class = "navigation1" id = "browse" onclick = '$("#file1").click();'>Browse</a>
	<?php
	echo form_upload("file",'Browse for a file','id = "file1"', 'class="file_hidden"');
	echo '</div>';
	echo '<br>';?>
	<input type="text" name="desc" value="Description" class="input_photo" 
	onfocus="value=''" onblur="value=value" /><br><br>
	<?php
	echo form_submit("submit", "Submit", 'class="navigation1"');
	echo form_close();
	echo '</div>';
	

	echo '<div class = "photo_form">';
	echo form_open('users/upload/photo_link');?>
	<input type="text" name="weblink" value="http://" id="photo_link"  class="input_photo" 
	onfocus="value=''" onblur="value=value" /><br><br>
	<input type="text" name="desc" value="Description" class="input_photo" 
	onfocus="value=''" onblur="value=value" /><br>
	<br>
	<?php
	echo form_submit("submit1", 'Submit', 'class="navigation1"');
	echo form_close();
	echo '</div>';
	
?>
</div></div>
<script>
$(document).ready(function() {
    
		$("#upload_cancel").click(function() {
			location.href='/test/design/index.php/users/site';
			});
				
		});
		
		
$("#file1").change(function(){
	$('#photo_cover').val($(this).val());
	});
</script>

<?php
$this->load->view('templates/footer');
?>