<?php
        // this script needs to be updated to be like auth_control
        session_start();
        /*    This is the target table:
        *    +----------+----------------------------+------+-----+------------------+----------------+
        *    | Field    | Type                       | Null | Key | Default          | Extra          |
        *    +----------+----------------------------+------+-----+------------------+----------------+
        *    | IID      | int(255) unsigned zerofill | NO   | PRI | NULL             | auto_increment |
        *    | Role     | varchar(1)                 | NO   |     | C                |                |
        *    | FName    | varchar(20)                | NO   |     | NULL             |                |
        *    | LName    | varchar(30)                | NO   |     | NULL             |                |
        *    | PhNumber | varchar(12)                | YES  |     | 555-555-5555     |                |
        *    | Email    | varchar(60)                | NO   |     | Name@address.com |                |
        *    | PassWd   | varchar(16)                | NO   |     | NULL             |                |
        *    +----------+----------------------------+------+-----+------------------+----------------+
        */

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
	//Insert into DB
        mysql_query("INSERT INTO Identities(Role, FName, LName, PhNumber, Email,PassWd) 
                     VALUES ('C', '$_POST[fname]','$_POST[lname]','$_POST[phnum]','$_POST[email]','$_POST[password]');")
                or die("<br />failed <br />");
        
        $_SESSION['username']= $_POST[fname] . " " . $_POST[lname];
        $_SESSION['email']= $_POST[email] ;
	header("location: ../_php_success.php");
?>
