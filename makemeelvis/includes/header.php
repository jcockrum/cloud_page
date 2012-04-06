<!DOCTYPE html>
<head>
	<title><?php echo title; ?> | Slave of the Invisible</title>
	<meta name="description" content="<?php echo description; ?>" />
	<meta name="keywords" content="<?php echo keywords; ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="canonical" href="http://<?php echo $_SERVER["HTTP_HOST"] ?><?php echo parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH); ?>" />
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="js/external.js"></script>
	<link rel="shortcut icon" href="./images/icon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body id="<?php echo pageid; ?>">

<div id="header"> 
	<h1 class="site-title"><a href="./">Slave of the Invisible</a></h1>
		<div class="nav"><br />
                <ul>
                        <li><a href="./">Home</a> |
                                <ul>
                                        <li><a href="http://184.169.130.102/">Main Home</a></li>
                                </ul>
                         </li>
                        <li><a href="./addemail.php">Add User</a></li> |
                        <li><a href="./removeemail.php">Delete User</a></li> |
                        <li><a href="./sendemail.php">Send Mail</a></li> |
                </ul>
		</div>
	</div>
<div id="content">
