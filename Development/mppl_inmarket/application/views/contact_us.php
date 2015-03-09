<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | InMarket	</title>
    <link href="<?php echo base_url();?>market/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>market/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>market/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>market/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>market/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url();?>market/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>market/css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo asset_url();?>icon/ikon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>market/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>market/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>market/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>market/images/ico/apple-touch-icon-57-precomposed.png">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
		function initialize() {
		  var mapProp = {
		    center:new google.maps.LatLng(-7.28011733852327, 112.797640291974),
		    zoom:15,
		    mapTypeId:google.maps.MapTypeId.ROADMAP
		  };
		  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		  var marker=new google.maps.Marker({
			  position:new google.maps.LatLng(-7.28011733852327, 112.797640291974),
			  animation:google.maps.Animation.BOUNCE
			  });

			marker.setMap(map);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</head>
<!--/head-->

<body>
	<!--header-->
	<header id="header">
		<!--header_top-->
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a ><i class="fa fa-phone"></i> +62 85 66 96 421</a></li>
								<li><a href="mailto:inmarket@gmail.com"><i class="fa fa-envelope"></i> inmarket@gmail.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->
		
		<!--header-middle-->
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url();?>in_market"><img src="<?php echo base_url();?>market/images/home/coba1.png" alt="" /></a>
						</div>
					

						
						<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url();?>in_market" class="active">Home</a></li>
								<li ><a href="<?php echo base_url();?>in_market/contact_us">Contacs<i ></i></a></li> 
								</ul>
				</div>
					<!-- <div class="col-sm-8">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<!--/header-middle-->
	
	</header>
	<!--/header-->
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">   
	    		<br> 		
	    		<div class="col-sm-8"> <!-- 12 -->
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
						<div id="googleMap" style="width:750px;height:410px;"></div> <!-- width:1135px;height:420px; -->
					</div>
				</div>			 		
			<!-- </div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div> -->
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>CV. InMarket</p>
							<p>Jalan Teknik Kimia, Gedung Teknik Informatika, Kampus Keputih - Sukolilo, ITS</p>
							<p>Surabaya Indonesia</p>
							<p>Mobile: +62 85 66 96 421</p>
							<p>Email: <a href="mailto:inmarket@gmail.com">inmarket@gmail.com</a></p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<!-- <li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li> -->
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
    <!--/#contact-page-->

    <!--Footer-->
	<footer id="footer">
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 InMarket. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.inmarket.lp2.if.its.ac.id">InMarket</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="<?php echo base_url();?>market/js/jquery.js"></script>
	<script src="<?php echo base_url();?>market/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="<?php echo base_url();?>market/js/gmaps.js"></script>
	<script src="<?php echo base_url();?>market/js/contact.js"></script>
	<script src="<?php echo base_url();?>market/js/price-range.js"></script>
    <script src="<?php echo base_url();?>market/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url();?>market/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>market/js/main.js"></script>
</body>
</html>