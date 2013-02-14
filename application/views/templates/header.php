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
<script src="http://connect.facebook.net/en_US/all.js"></script>

<div id="fb-root"></div>
<script>
  
 window.fbAsyncInit = function() {
    FB.init({
        appId   : '284754988319059',
        oauth   : true,
        status  : true, // check login status
        cookie  : true, // enable cookies to allow the server to access the session
        xfbml   : true // parse XFBML
    });

  };

function fb_login(){
    FB.login(function(response) {

        if (response.authResponse) {
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID

            FB.api('/me', function(response) {
            user_email = response.email; //get user email
             
			location.replace('index.php/site/login');
		
			
			});

        } else {
            //user hit cancel button
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'publish_stream,email'
    });
}



(function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
}());


</script>

<div class = "full_wrapper">
					<div class = "header">
					<div class = "banner_container">
					
						<?php 
							$ses_user=$this->session->userdata('userprofile');
							if(isset($ses_user['username'])):?>
								<a class = "fancybox_logout" href= <?php echo base_url('index.php/site/logout');?> onclick="FB.logout()">Logout</a>
							 <?php else: ?>
								<a class = "fancybox"  href="#login"> Login </a>
							 <?php endif?>
							
									
						
						<div class = "logo_container">
						<a class = "logo" href="main">EASABLE</a>
						</div>
					</div>
					
					</div>
			<div class = "nav_bar">
			<ul class = "nav">
				<li><a href="">Browse Designs</a></li>
				<li><a href=<?php echo base_url('index.php/Users/site');?>>Get Your Designs</a></li>
				<li><a href="">Post Designs</a></li>
			</ul>
			</div>
			<div class = "banner_2">Blog Us Here</div>
			
			<div id="login" style="display:none";>
				<div class = "fancybox_div">
					<p id="login_title"> Sign In to Easable </p>
					<p id="login_text"> Trust us,it's way more fun</p>
					<a href = # onclick="fb_login();"><img src=<?php echo base_url("assets/Images/FBbutton.fw.png");?>></a>
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

<div id = "main_content">