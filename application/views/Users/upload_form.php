<?php 

include(APPPATH.'/views/templates/header.php');
?>


<input type = "submit" name = "photo_submit" id="upload_cancel" class = "submit" 
value = "Cancel and Return">

<div class = "photo_container">
<p>Upload photo from a file or from a website:</p>
<div class = "error">
<?php 
	if (isset($error))
		{echo $error;}
	else {echo '';}		
?>
</div>

<?php

	$this->load->helper('form');
	echo '<div class = "photo_form">';
	echo form_open_multipart('users/upload/upload_photo');
	echo '<div class = "input_photo"> Browse for a file';
	echo form_upload("file",'Browse for a file','class="hidden"');
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
</div>
<script>
$(document).ready(function() {
    
		$("#upload_cancel").click(function() {
			location.href='/test/design/index.php/users/site';
			});
				
		});
</script>

<?php
$this->load->view('templates/footer');
?>