<?php
	session_start();
	ob_start();	
	// var's Defintion:
	$host		="127.0.0.1"; 	// Host name
	$db_usr		="root"; 	// Mysql username
	$db_pwd		="1q2w3e4r"; 	// Mysql password
	$db_name	="project"; 	// Database name
	$tbl_name	="Identities"; 	// Table name
	// Connect to server/db:
	mysql_connect("$host", "$db_usr", "$db_pwd")or die("cannot connect to " . $host);
	mysql_select_db("$db_name")or die("cannot select DB");
	// get the already entered $username and $password
	$username=$_POST['email'];
	$password=$_POST['password'];
	// MySQL injection protection:
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	// test the username against the DB
	$sql="SELECT * FROM $tbl_name WHERE Email='$username' and PassWd='$password'";
	$result=mysql_query($sql);

	/*
	STUFF ADDED BY MATT
	*/
	// mysql_query just sets the query, it doesn't fetch any rows back
	// we must use mysql_fetch_array to return stuff

	$return_array = mysql_fetch_array($result);
	// Count the row(s): if 1 row should be valid
	$count=mysql_num_rows($result);
        print_r(get_defined_vars($result));
        // print_r($result);
        echo "<br />";


	if($count==1) 
 	{ // set session username then redirect
		$_SESSION['username']= $_POST[fname] . " " . $_POST[lname];
                $_SESSION['email']= $_POST[email] ;
                echo var_dump($result);
		//header("location: ../appointments.php");
	} else {header("location: ../_php_fail.php");}
	ob_end_flush();
?>
