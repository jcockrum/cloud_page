<<<<<<< HEAD
<?php
	// =-=-=-=-=-=-=-=-=-=-=-get Identitities primary key from sessions email
	SELECT $_SESSION['email'] FROM identities where  $_SESSION['email']  
	
	// var's Defintion:
=======
<?php	
session_start();
	ob_start();
        /*
       +-----------------+---------------------------+------+-----+---------+----------------+
       | Field           | Type                      | Null | Key | Default | Extra          |
       +-----------------+---------------------------+------+-----+---------+----------------+
       | InvoiceID       | int(15) unsigned zerofill | NO   | PRI | NULL    | auto_increment |
       | Created_by      | int(6) unsigned zerofill  | NO   | UNI | NULL    |                |
       | Cal_Date        | int(15) unsigned zerofill | NO   | UNI | NULL    |                |
       | Job_description | text                      | NO   |     | NULL    |                |
       | Car_make        | varchar(30)               | NO   |     | NULL    |                |
       | Car_model       | varchar(30)               | NO   |     | NULL    |                |
       | Car_powertrain  | varchar(20)               | NO   |     | NULL    |                |
       | Car_year        | varchar(4)                | NO   |     | NULL    |                |
       | Car_miles       | varchar(7)                | NO   |     | NULL    |                |
       +-----------------+---------------------------+------+-----+---------+----------------+
        */

        // var's Defintion:
>>>>>>> 4d7c09b0a1b0c974928a483df3d5d324ba0b13e9
	$host		="127.0.0.1"; 	// Host name
	$db_usr		="root"; 	// Mysql username
	$db_pwd		="1q2w3e4r"; 	// Mysql password
	$db_name	="project"; 	// Database name
<<<<<<< HEAD
	$tbl_name	="Identities"; 	// Table name
	
=======
	$tbl_name	="Appointments"; 	// Table name
        $usr            = $_SESSION['email'];	


	echo "<h1><strong>Page Under Construction</strong></h1> ";
>>>>>>> 4d7c09b0a1b0c974928a483df3d5d324ba0b13e9
	// Connect to server/db:
	mysql_connect("$host", "$db_usr", "$db_pwd")or die("cannot connect to " . $host);
        echo "connected <br />";
	mysql_select_db("$db_name")or die("cannot connect to database " . $db_name);
	echo "DB'ed <br />";
	
<<<<<<< HEAD
	// =-=-=-=-=-=-=-=-=-=-=--= write to appoinments table 
	mysql_query("INSERT INTO Appoinments(car, job, date) 
                     VALUES ('$_POST[car]','$_POST[job]','$_POST[date]');")
                or die("<br />failed <br />");
	
	?>
=======
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
	
>>>>>>> 4d7c09b0a1b0c974928a483df3d5d324ba0b13e9
