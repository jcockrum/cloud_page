<!DOCTYPE html>

<head>
	<?php   session_start();
                // set view counter
		$_SESSION['views'] = (isset($_SESSION['views'])) ? $_SESSION['views']+ 1 : 1;

                // debug info
		//echo "begin debug=-=-=-=-=-=-=-=-=<br />";
		//print_r($_SESSION);
		//echo "<br />end debug=-=-=-=-=-=-=-=-=-=<br />";			
	?>

	<title><?php echo title; ?> | A Plus Auto and Truck Repair</title>
	<meta name="description" content="<?php echo description; ?>" />
	<meta name="keywords" content="<?php echo keywords; ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="canonical" href="http://<?php echo $_SERVER["HTTP_HOST"] ?><?php echo parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH); ?>" />
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="/js/external.js"></script>
        <?php
                if ($_SESSION['pid'] == 'date')
                {
                echo '<link rel="stylesheet" type="text/css" media="all" href="js/cal/jsDatePick_ltr.min.css" />';
                echo '<script type="text/javascript" src="js/cal/jsDatePick.min.1.3.js"></script>';
                echo '<script type="text/javascript"> ';
                echo 'window.onload = function(){new JsDatePick({useMode:2,target:"cal_date",dateFormat:"%d-%M-%Y"});};';
                echo '</script>';
                }
        ?>

</head>

<body id="<?php echo pageid; ?>">
<div id="header"> 
	<img src="./images/header_siteheader.jpg" alt="A Plus Auto and Truck Repair" /> 
	<?php (isset($_SESSION['username'])) ? include('_authout.php') : include('_auth.php'); ?> 
	<br class="clear" />
</div>

<div id="content">
