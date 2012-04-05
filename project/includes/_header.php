<!DOCTYPE html>

<head>
	<?php   session_start();
		$usr = $_SESSION['username'];
		
		if(isset($_SESSION['views']))
		    $_SESSION['views'] = $_SESSION['views']+ 1;
		else
		    $_SESSION['views'] = 1;
		/*
		echo "begin debug=-=-=-=-=-=-=-=-=";
		echo "<br />"; 
		print_r($_SESSION);
		echo "<br />"; 
		echo " usr is '" . $usr . "'";
		echo "<br />"; 
		echo "session username  is '" . $_SESSION['username'] . "'";
		echo "<br />"; 
		echo "end debug=-=-=-=-=-=-=-=-=-=";
		echo "<br />"; 	
		*/	
	?>
	<title><?php echo title; ?> | A Plus Auto and Truck Repair</title>
	<meta name="description" content="<?php echo description; ?>" />
	<meta name="keywords" content="<?php echo keywords; ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="canonical" href="http://<?php echo $_SERVER["HTTP_HOST"] ?><?php echo parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH); ?>" />
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="/js/external.js"></script>
</head>

<body id="<?php echo pageid; ?>">
<div id="header"> 
	<img src="./images/header_siteheader.jpg" alt="A Plus Auto and Truck Repair" /> 
	<?php 
		if($usr) {include('_authout.php');} 
		else {include('_auth.php');} 
	?> 
	<br class="clear" />
</div>
<div id="content">
