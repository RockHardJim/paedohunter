<?php
//Secure Http headers for lesser headaches and more sleeping hours
	header('Content-type: text/html; charset=utf-8');
	header('X-Frame-Options: SAMEORIGIN');
	header('X-Content-Type-Options: nosniff');
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header('X-Powered-By: PAEDOHUNTER');
	header("X-XSS-Protection: 1");
	
	define('VIEW_FILES', true);
	include("core/init.php");
	//Anti Hacker Full Proof
	$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	//Nice way of making the xss kiddies to fuck off
	$xss = new spark_xss();
/*--------------------------------------------------------------------*/
/*I-Frame Protection*/
	echo '
	<script language="javascript">
	if(top.location!=self.location) top.location=self.location;
	</script>
	';
/*-----------------*/

$views = array(
'index',
'register',
'login',
'register',
'analytics',
'paedo-profile',
'verification',
'search',
'paedos',
'about',
'status',
'submissions',
'banned',
'404',
'403',
'500',
'security',
'maintenance',
'admin',
);

if(htmlspecialchars(strip_tags($xss->clean($_POST["view"], array('prevent_basic_xss', 'filter_sanitize')))) || htmlspecialchars(strip_tags($xss->clean($_GET["view"], array('prevent_basic_xss', 'filter_sanitize')))))
	{
	$page = htmlspecialchars(strip_tags($xss->clean($_GET["view"], array('prevent_basic_xss', 'filter_sanitize')))) ? $xss->clean($_GET["view"], array('prevent_basic_xss', 'filter_sanitize')) : htmlspecialchars(strip_tags($xss->clean($_POST["view"], array('prevent_basic_xss', 'filter_sanitize'))));
	//start filtering the user posted data
	if(in_array(trim($page), $views))
	{
	$file = "views/" . $theme_name . $page . "/" . $page . ".php";
	if((file_exists($file)))
	{
	include($file);
	}
			
			//Display home page if user is trying to fuck with the navigation
else
	{
	include("views/". $theme_name ."index/index.php");
	}
	}
else
	{
	include("views/". $theme_name ."index/index.php");
	}
	}
else
	{
	include("views/". $theme_name ."index/index.php");
	}