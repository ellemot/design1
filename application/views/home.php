
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
		<strong><h1 id="hero_text_1">Interior Design. </h1><h1 id = "hero_text_2"> Made Easy.</h1></strong>
		<p> <b>We help you design your home.</b> Browse designer portfolios and inspiration, pick designers, and get a custom design for your room - easily.</P>
		<p class = "small">Search design inspiration:</p>
		<?php echo form_open('');
		echo form_input("search", "Search");
		?>
		

	</div>
	
<div class = "push_down">.</div>
<div class = "desc_container">
<h2 class ="desc_header">
<div id= "left"> 
	<img src= <?php echo base_url('assets/Images/photoicon.fw.png');?>>
	<h3 class = "desc_subtitle">Imagine Your Room</h3>
	<p>
	Complete a short design brief that outlines 
	what you’re looking for in your new space. 
	Upload photos from your design books to show 
	your style to potential contestants. Choose which 
	design package best suits your needs.  
	</p>
	</div>

<div id = "middle">
	<img src= <?php echo base_url('assets/Images/talkicon.fw.png');?>>
	<h3 class = "desc_subtitle">Work With Your Favorite Designer</h3>
	<p>Designers submit concepts to compete for your project. 
	Compare bids and provide continual feedback through the 
	contest to help design a room that you’re sure to love. </p>
	</div>

<div id = "right">
<img src= <?php echo base_url('assets/Images/houseicon.fw.png');?>>
	<h3 class = "desc_subtitle">Love Your Room</h3>
	<p>
	Choose your favorite design concept and 
	award the prize! You will receive a custom design box, 
	including drawings, paint swatches, floor plans, and an 
	itemized list of what you'll need, all for a transparent, flat per room fee. 
 </p>
	</div>
</div>





</div>
</div>
</div>

	
			