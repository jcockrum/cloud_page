<?php	
session_start();
	ob_start();
        /*
        +------------+----------------------------+------+-----+---------+----------------+
        | Field      | Type                       | Null | Key | Default | Extra          |
        +------------+----------------------------+------+-----+---------+----------------+
        | InvoiceID  | int(255) unsigned zerofill | NO   | PRI | NULL    | auto_increment |
        | Created_by | int(255) unsigned zerofill | NO   | MUL | NULL    |                |
        | Car        | int(255) unsigned zerofill | NO   | MUL | NULL    |                |
        | Job        | int(255) unsigned zerofill | NO   | MUL | NULL    |                |
        | Date       | int(255) unsigned zerofill | NO   | MUL | NULL    |                |
        +------------+----------------------------+------+-----+---------+----------------+
        */

        // var's Defintion:
	$host		="127.0.0.1"; 	// Host name
	$db_usr		="root"; 	// Mysql username
	$db_pwd		="1q2w3e4r"; 	// Mysql password
	$db_name	="project"; 	// Database name
	$tbl_name	="Appointments"; 	// Table name
        $usr            = $_SESSION['email'];	

	// Connect to server/db:
	mysql_connect("$host", "$db_usr", "$db_pwd")or die("cannot connect to " . $host);
        echo "connected <br />";
	mysql_select_db("$db_name")or die("cannot connect to database " . $db_name);
	echo "DB'ed <br />";
	
        $sql=("SELECT IID FROM Identities WHERE Email='" . $usr . "'");
        echo Var_dump($sql); //For testing: comment out for production
        
        $result=mysql_query($sql);
        echo "<br/>";
 
	$return_array = mysql_fetch_array($result);
        echo Var_dump($return_array); //For testing: comment out for production
        echo "<br/>";
      
        //Insert into DB
        $mysql_query=("INSERT INTO $tbl_name(Created_by, Car, Job, Date) 
                     VALUES ('$return_array','$_POST[car]','$_POST[service]','$_POST[date]');");
               // or die("<br />failed <br />");

       echo Var_dump($mysql_query); //For testing: comment out for production
?> 	
	
