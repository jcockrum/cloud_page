<?php
	// var's Defintion:
	$host		="127.0.0.1"; 	// Host name
	$db_usr		="root"; 	// Mysql username
	$db_pwd		="1q2w3e4r"; 	// Mysql password
	$db_name	="Project"; 	// Database name
	$tbl_name	="Identities"; 	// Table name
	
	// Connect to server/db:
	mysql_connect("$host", "$db_usr", "$db_pwd")or die("cannot connect to " . $host);
	//echo "connected <br />";
	mysql_select_db("$db_name")or die("cannot connect to database " . $db_name);
	//echo "DB'ed <br />";
	//Insert into DB
	//echo "inserting :" . $_POST[role] . ',' . $_POST[fname] . ',' . $_POST[lname] . ',' . $_POST[phnum] . ',' . $_POST[email] . ',' . $_POST[add_1] . ',' . $_POST[add_2] . ',' . $_POST[city] . ',' . $_POST[state] . ',' . $_POST[zcode];

	mysql_query("INSERT INTO Identities(Role,FName,LName,PhNumber,Email,Add_1,Add_2,City,State,Zip_Code) VALUES ('$_POST[role]','$_POST[fname]','$_POST[lname]','$_POST[phnum]','$_POST[email]','$_POST[add_1]','$_POST[add_2]','$_POST[city]','$_POST[state]','$_POST[zcode]');")or die("<br />failed <br />");
	//echo "Passed <br />";
	header("location: ../_php_success.php");
?>
