<?php	

        // var's Defintion:
	$host		="127.0.0.1"; 	// Host name
	$db_usr		="root"; 	// Mysql username
	$db_pwd		="1q2w3e4r"; 	// Mysql password
	$db_name	="project"; 	// Database name
	$tbl_name	="Appoinments"; 	// Table name
	
	// Connect to server/db:
	mysql_connect("$host", "$db_usr", "$db_pwd")or die("cannot connect to " . $host);
        echo "connected <br />";
	mysql_select_db("$db_name")or die("cannot connect to database " . $db_name);
	echo "DB'ed <br />";
	
        $mysql_query=("SELECT FName, LName, Email FROM Identities WHERE Email=$_SESSION['email'] ");

        echo Var_dump($mysql_query); 
?> 	
	
