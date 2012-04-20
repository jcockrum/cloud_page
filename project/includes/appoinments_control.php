<?php
	// =-=-=-=-=-=-=-=-=-=-=-get Identitities primary key from sessions email
	SELECT $_SESSION['email'] FROM identities where  $_SESSION['email']  
	
	// var's Defintion:
	$host		="127.0.0.1"; 	// Host name
	$db_usr		="root"; 	// Mysql username
	$db_pwd		="1q2w3e4r"; 	// Mysql password
	$db_name	="project"; 	// Database name
	$tbl_name	="Identities"; 	// Table name
	
	// Connect to server/db:
	mysql_connect("$host", "$db_usr", "$db_pwd")or die("cannot connect to " . $host);
        echo "connected <br />";
	mysql_select_db("$db_name")or die("cannot connect to database " . $db_name);
	echo "DB'ed <br />";
	
	// =-=-=-=-=-=-=-=-=-=-=--= write to appoinments table 
	mysql_query("INSERT INTO Appoinments(car, job, date) 
                     VALUES ('$_POST[car]','$_POST[job]','$_POST[date]');")
                or die("<br />failed <br />");
	
	?>