<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Easable | Design for Everyone</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand|Imprima' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href=<?php echo base_url("assets/Scripts/jquery.fancybox.css")?> type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/main.css");?> />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.cycle.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fancybox.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fancybox.pack.js")?>></script>
		

	</head>

<body>



<div class = "full_wrapper">
	<div class = "main_outer_container">
			<div class = "content_container">
				<div class = "header">
					<div class = "banner_container">
						<a class = "fancybox"  href="#login"> Login </a>
						<div class = "logo_container">
						<a class = "logo" href="main">EASABLE</a>
						</div>
					</div>
				</div>
			<div class = "nav_bar">
			<ul class = "nav">
				<li><a href="">Browse Designs</a></li>
				<li><a href="">Get Designs</a></li>
				<li><a href="">Post Designs</a></li>
			</ul>
			<div class = "banner_2">Blog Us Here</div>
			</div>
		
			<div id="login" style="display:none";>
				<div class = "fancybox_div">
					<p id="login_title"> Sign In to Easable </p>
					<p id="login_text"> Trust us,it's way more fun</p>
					<img src=<?php echo base_url("assets/Images/FBbutton.fw.png");?>>
				</div>
			</div>
				
				
<script type = "text/javascript">
	$(".fancybox").fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    afterLoad   : function() {
               this.content = this.content.html();
			  }
	});
	
	
</script>		


		
</body>
</html>
