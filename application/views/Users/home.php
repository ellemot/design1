<?php 

include(APPPATH.'/views/templates/header.php');
?>

<div class = "photo_container">
<p>Upload a picture from your computer or copy and paste a link</p>


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
	echo form_open('users/upload/photo_link');
	echo form_input('weblink','http://','class="input_photo"','id="photo_link"');
	echo form_submit("submit1", 'submit', 'class="submit"');
	echo form_close();
	echo '</div>';
	
?>
</div>
<div class="push"></div>
<script>
$(document).ready(function() {
    
		var value = $("#photo_link").val();
		$("#photo_link").focus(function(){
				if($("#photo_link").val()==value) 
				$("#photo_link").val("");
					})
				.blur(function(){
				if($("#photo_link").val()=="")
					$("#photo_link").val(value);
					});
				
		});
</script>

<?php
$this->load->view('templates/footer');
?>