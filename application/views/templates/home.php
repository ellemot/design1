
<script>
$(document).ready(function() {
				$('#slideshow').cycle({
				fx: 'fade',
				pager: '#smallnav', 
				pause:   1, 
				speed: 1800,
				timeout:  3500 
			});			
		});
</script>

	<div id = "slideshow">
			<img src = <?php echo base_url("assets/Images/BR_1.jpg")?> class=bgM>
			<img src = <?php echo base_url("assets/Images/LR_1.jpg")?> class=bgM>
			<img src = <?php echo base_url("assets/Images/LR_2.jpg")?> class=bgM>
	</div>
	<div class = "explanation">
<span>Help me with</span>
<select class = "type">
<option value = "bedroom">My Bedroom</option>
<option value = "living_room">My Living Room </option>
<option value = "house">My Whole House</option>
</select>
</div>
	
	<div class="hero_text">
		<h1 id="hero_text_1">Beautiful Design. </h1><h1 id = "hero_text_2"> Easy.</h1>
		
		<p>Check out some design ideas:</P>
		<?php echo form_open('');
		echo form_input("search", "Search");
		?>
		

	</div>
	<?php print_r($this->session->userdata);?>
<div class = "push_down">.</div>
<div class = "desc_container">
<h2 class ="desc_header">
<div id= "left"> 
	<img src= <?php echo base_url('assets/Images/photoicon.fw.png');?>>
	<h3 class = "desc_subtitle">Imagine Your Room</h3>
	<p>Browse existing designs and save pictures to your design book to get started. </p>
	<p>Take pictures of the room you'd like designed and upload them to start the design process.  Enter in your budget for furnishings and decor.</p>
	</div>

<div id = "middle">
	<img src= <?php echo base_url('assets/Images/talkicon.fw.png');?>>
	<h3 class = "desc_subtitle">Provide Feedback for Designers</h3>
	<p>Designers provide their design ideas, with pictures and options, and edit proposals based on feedback and budget restrictions.</p>
</div>

<div id = "right">
<img src= <?php echo base_url('assets/Images/houseicon.fw.png');?>>
	<h3 class = "desc_subtitle">Love Your Design</h3>
	<p>You get a custom design, including paint colors, furniture, textile and decor suggestions, for one flat fee. </p>
	</div>
</div>





</div>
</div>
</div>

	
			