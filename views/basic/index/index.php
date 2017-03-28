<?php 

defined('VIEW_FILES') || die('Direct access not allowed'); 

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo SITENAME;  ?> - HOME</title>

	<meta name="description" content="<?php echo DESCRIPTION; ?>" />
	<meta name="keywords" content="<?php echo KEYWORDS; ?>" />
	<meta name="author" content="<?php echo SITENAME;  ?>" />
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="apple-touch-fullscreen" content="yes">

	<!-- BEGIN CORE CSS -->
	<link rel="stylesheet" href="<?php echo URL; ?>assets/one-page-parallax/css/layout.css">
	<link rel="stylesheet" href="<?php echo URL; ?>assets/globals/css/elements.css">
		<!-- BEGIN CORE CSS -->
	<link rel="stylesheet" href="<?php echo URL; ?>assets/admin1/css/admin1.css">
	<link rel="stylesheet" href="<?php echo URL; ?>assets/globals/css/elements.css">
	<!-- END CORE CSS -->

	<!-- BEGIN PLUGINS CSS -->
	<link rel="stylesheet" href="<?php echo URL; ?>assets/globals/plugins/rickshaw/rickshaw.min.css">
	<link rel="stylesheet" href="<?php echo URL; ?>assets/globals/plugins/bxslider/jquery.bxslider.css">

	<!-- END CORE CSS -->

	<!-- BEGIN PLUGINS CSS -->
	<link rel="stylesheet" href="<?php echo URL; ?>assets/globals/css/plugins.css">
	<!-- END CORE CSS -->

	<!-- BEGIN SHORTCUT AND TOUCH ICONS -->
	<link rel="shortcut icon" href="<?php echo URL; ?>assets/globals/img/icons/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo URL; ?>assets/globals/img/icons/apple-touch-icon.png">
	<!-- END SHORTCUT AND TOUCH ICONS -->

	<script src="<?php echo URL; ?>assets/globals/plugins/modernizr/modernizr.min.js"></script>
</head>
<body>

	<div class="nav-bar-container">

		<!-- BEGIN ICONS -->
		<div class="nav-menu">
			<div class="hamburger">
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
			</div><!--.hamburger-->
		</div><!--.nav-menu-->

		<div class="nav-search">
			<span class="search"></span>
		</div><!--.nav-search-->


		<div class="nav-bar-border"></div><!--.nav-bar-border-->

		<!-- BEGIN OVERLAY HELPERS -->
		<div class="overlay">
			<div class="starting-point">
				<span></span>
			</div><!--.starting-point-->
			<div class="logo">PAEDOHUNTER</div><!--.logo-->
		</div><!--.overlay-->

		<div class="overlay-secondary"></div><!--.overlay-secondary-->
		<!-- END OF OVERLAY HELPERS -->

	</div><!--.nav-bar-container-->

	<div class="content">

		<div class="page-header full-content">
			<div class="row">
				<div class="col-sm-6">
					<h1>HOME <small>visitor</small></h1>
				</div><!--.col-->
			</div><!--.row-->
		</div><!--.page-header-->

	<div class="slide bg-image" data-nav="remove" style="background-image: url('<?php echo URL; ?>assets/one-page-parallax/img/583257.jpg');">

		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h1 class="text-red text-light-shadow">WE ARE <span data-typer-targets="PAEDOHUNTERS, LEGION, ANON-SA">ADVANCED</span><br>WE ARE AVENGERS.</h1>
					<p class="caption text-red">PAEDOHUNTER! is a crowd-sourcing platform dedicated at identifying and publicly shaming paedophiles</p>
				</div><!--.col-->
			</div><!--.row-->


		</div><!--.container-->

	</div><!--.slide-hero-->





	<div class="slide " data-nav="slide4">
		<div class="container">
			<h3 class="text-black text-center">Overview</h3>
			<p class="caption text-center">All data is collected in real-time</p>

		<div class="display-animation">
			<div class="row image-row margin-bottom-40">
				<div class="col-md-4">
					<div class="card tile card-friend material-animate">
						<a href="user-profile.html"><img src="<?php echo URL; ?>assets/globals/img/faces/1.jpg" class="user-photo" alt=""></a>
						<div class="friend-content">
							<p class="title">{paedo-name}</p>
							<p><a href="user-profile.html">{keyword}</a></p>
							<a class="btn btn-flat btn-primary btn-xs">View Paedo Profile</a>
						</div><!--.friend-content-->
					</div><!--.card-->

					<div class="card tile card-friend material-animate">
						<a href="user-profile.html"><img src="<?php echo URL; ?>assets/globals/img/faces/2.jpg" class="user-photo" alt=""></a>
						<div class="friend-content">
							<p class="title">{paedo-name}</p>
							<p><a href="user-profile.html">{keyword}</a></p>
							<a class="btn btn-flat btn-primary btn-xs">View Paedo Profile</a>
						</div><!--.friend-content-->
					</div><!--.card-->

					<div class="card tile card-friend material-animate">
						<a href="user-profile.html"><img src="<?php echo URL; ?>assets/globals/img/faces/3.jpg" class="user-photo" alt=""></a>
						<div class="friend-content">
							<p class="title">{paedo-name}</p>
							<p><a href="user-profile.html">{keyword}</a></p>
							<a class="btn btn-flat btn-primary btn-xs">View Paedo Profile</a>
						</div><!--.friend-content-->
					</div><!--.card-->

					<div class="card tile card-friend material-animate">
						<a href="user-profile.html"><img src="<?php echo URL; ?>assets/globals/img/faces/5.jpg" class="user-photo" alt=""></a>
						<div class="friend-content">
							<p class="title">{paedo-name}</p>
							<p><a href="user-profile.html">{keyword}</a></p>
							<a class="btn btn-flat btn-primary btn-xs">View Paedo Profile</a>
						</div><!--.friend-content-->
					</div><!--.card-->
				</div><!--.col-->

			</div><!--.row-->
		</div><!--.display-animation-->

		</div><!--.container-->

	</div><!--.slide-->

	
		<div class="layer-container">

		<!-- BEGIN MENU LAYER -->
		<div class="menu-layer">
			<ul>
				<li data-open-after="true">
					<a href="<?php echo URL; ?>home">Home</a>
				</li>
				<li>
					<a href="javascript:;">Account Management</a>
					<ul class="child-menu">
						<li><a href="<?php echo URL; ?>user/view/register#register">Register</a></li>
						<li><a href="<?php echo URL; ?>user/view/login">Login</a></li>
						<li><a href="<?php echo URL; ?>user/view/register#reminder">Reset Password</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">Hunter Tools</a>
					<ul class="child-menu">
						<li><a href="ui-elements-general.html">Paedo Search</a></li>
						<li><a href="ui-elements-buttons.html">Cellphone checker</a></li>
						<li><a href="ui-elements-lists.html">API</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">Hunter Submissions</a>
					<ul class="child-menu">
						<li><a href="panels.html">Paedo Submission</a></li>
						<li><a href="panels-styling.html">Cellphone blacklist</a></li>
						<li><a href="panels-ajax.html">Victim Register</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">Support</a>
					<ul class="child-menu">
						<li><a href="forms-general.html">Donate</a></li>
						<li><a href="forms-layouts.html">FAQ</a></li>
						<li><a href="forms-tools.html">About</a></li>
					</ul>
				</li>
			</ul>
		</div><!--.menu-layer-->
		<!-- END OF MENU LAYER -->

		<!-- BEGIN SEARCH LAYER -->
		<div class="search-layer">
			<div class="search">
				<form action="pages-search-results.html">
					<div class="form-group">
						<input type="text" id="input-search" class="form-control" placeholder="type something">
						<button type="submit" class="btn btn-default disabled"><i class="ion-search"></i></button>
					</div>
				</form>
			</div><!--.search-->
		</div><!--.search-layer-->
		<!-- END OF SEARCH LAYER -->


	</div><!--.layer-container-->

	<div class="footer bg-black margin-top-40">
			<ul class="social-list">
				<li><a href="javascript:;" class="facebook"><i class="ion-social-facebook"></i></a></li>
				<li><a href="javascript:;" class="twitter"><i class="ion-social-twitter"></i></a></li>
			</ul>

			<div class="copyright v-text">SLAAPCHIPS &copy; 2017</div>
	</div><!--.footer-->

	<!-- Global Vendors for Pleasure Theme -->
	<script src="<?php echo URL; ?>assets/globals/js/global-vendors.js"></script>

	<!-- ScrollMonitor plugin for navigation tracker -->
	<script src="<?php echo URL; ?>assets/globals/plugins/scrollMonitor/scrollMonitor.js"></script>

	<!-- Skrollr plugin for parallax elements -->
	<script src="<?php echo URL; ?>assets/globals/plugins/skrollr/skrollr.min.js"></script>

	<!-- Typer plugin for retyping text in the hero section -->
	<script src="<?php echo URL; ?>assets/globals/plugins/typer/jquery.typer.min.js"></script>

	<!-- Pleasure.js for all necessary functions -->
	<script src="<?php echo URL; ?>assets/globals/js/pleasure.js"></script>

	<!-- One page parallax functions and events -->
	<script src="<?php echo URL; ?>assets/one-page-parallax/js/one-page-parallax.js"></script>

	<script src="<?php echo URL; ?>assets/admin1/js/layout.js"></script>

	<!-- BEGIN PLUGINS AREA -->
	<script src="http://maps.google.com/maps/api/js?sensor=true&amp;libraries=places"></script>
	<script src="<?php echo URL; ?>assets/globals/plugins/gmaps/gmaps.js"></script>
	<script src="<?php echo URL; ?>assets/globals/plugins/bxslider/jquery.bxslider.min.js"></script>
	<script src="<?php echo URL; ?>assets/globals/plugins/audiojs/audiojs/audio.min.js"></script>
	<script src="<?php echo URL; ?>assets/globals/plugins/d3/d3.min.js"></script>
	<script src="<?php echo URL; ?>assets/globals/plugins/rickshaw/rickshaw.min.js"></script>
	<script src="<?php echo URL; ?>assets/globals/plugins/jquery-knob/excanvas.js"></script>
	<script src="<?php echo URL; ?>assets/globals/plugins/jquery-knob/dist/jquery.knob.min.js"></script>
	<script src="<?php echo URL; ?>assets/globals/plugins/gauge/gauge.min.js"></script>
	<!-- END PLUGINS AREA -->

	<!-- PLEASURE -->
	<script src="<?php echo URL; ?>assets/globals/js/pleasure.js"></script>
	<!-- ADMIN 1 -->
	<script src="<?php echo URL; ?>assets/admin1/js/layout.js"></script>

	<script src="<?php echo URL; ?>assets/globals/scripts/sliders.js"></script>
	<script src="<?php echo URL; ?>assets/globals/scripts/maps-google.js"></script>
	<script src="<?php echo URL; ?>assets/globals/scripts/widget-audio.js"></script>
	<script src="<?php echo URL; ?>assets/globals/scripts/charts-knob.js"></script>
	<script src="<?php echo URL; ?>assets/globals/scripts/index.js"></script>
	<!-- BEGIN INITIALIZATION-->
	<script>
	$(document).ready(function () {
		Pleasure.init();
		Layout.init();

		Index.init();
		WidgetAudio.single();
		ChartsKnob.init();

	});
	</script>


	<!-- BEGIN Google Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', Pleasure.settings.ga.urchin, Pleasure.settings.ga.url);
		ga('send', 'pageview');
	</script>
	<!-- END Google Analytics -->

</body>
</html>