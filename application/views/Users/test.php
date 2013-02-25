
<?php
include(APPPATH.'/views/templates/header.php');
$this->session->keep_flashdata('desc');
?>
<div id = "select_photo_nav">
<div id="button_container"> 
<input type = "submit" name = "photo_submit" id="photo_submit" class = "navigation1" 
value = "Submit Selected">
<input type = "submit" name = "photo_submit" id="photo_cancel" class = "navigation1" 
value = "Cancel and Return">

<div class = "loader">
	<img src = <?php echo base_url('assets/Images/ajax-loader.gif');?>>
	<br>
	</div>
</div>
</div>


<?php

foreach ($images as $key=>$value) 
{
	echo '<img class="inactive" src='.$value.' height=150px>';
}

?>

<script type="text/javascript">

$(document).ready(function() {
    
		$(".inactive").click(function() {
			$(this).toggleClass('active');
			});
			
		$('.loader').hide();
		
		$("#photo_submit").click(function() {
			
			$('.loader').show();
			var values = JSON.stringify($(".active").map(function()  
			{return $(this).attr('src');}).get());
		
			
			 $.ajax({        
					type: 'POST',
					url: '/test/design/index.php/users/upload/upload_photo_link',
					data: {images:values},
					success: function(data){
						location.href='/test/design/index.php/users/site/';
						}
					 });
					 }); 
		
		$("#photo_cancel").click(function() {
			location.href='/test/design/index.php/users/upload';
			});
		
		});
	
</script>
<?php
$this->load->view('templates/footer');
?>
