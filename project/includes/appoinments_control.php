<?php
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

        session_start();
        
        // debuging block        
        echo "Current Session-----------<br />";
        print_r($_SESSION);
        echo "<br />--------------------------<br />";        
        print_r($_POST); 
        echo "<br />--------------------------<br />";

// var's Defintion:
        $_SESSION['err_msg']    ="";                    // Clear error messgae
        $iid                    =$_SESSION['iid'];      // read user key  
        $cal_date       		=$_POST['Cal_date'];    //Calender date from post    	    
        $host		            ="127.0.0.1"; 	        // Host name
        $db_usr		            ="root"; 	            // Mysql username
        $db_pwd		            ="1q2w3e4r"; 	        // Mysql password
        $db_name	            ="project"; 	        // Database name
        $tbl_name	            ="Appointments"; 	    // Table name	

// Function Definitions:
        function clean($dbc,$in)
        {
                $step = stripslashes(trim($in));     
                $clean = mysqli_real_escape_string($dbc, $step);
                return $clean;
        }
        
        //or trigger_error("DB write fail",E_USER_WARNING); // 'or die' replacement  
        //error handler function
        function customError($errno, $errstr)
        {
                $_SESSION['err_msg'] = "<b>Error:</b> [$errno] $errstr<br />"; 
                header("location: ../_php_fail.php");
                die();
        }

        //set error handler
        set_error_handler("customError",E_USER_WARNING)
        
//Main Code
        if (isset($_SESSION['username'])) 
        {           
            // Connect to the database
            $dbc = mysqli_connect($host, $db_usr, $db_pwd, $db_name) or trigger_error("DB Connect fail",E_USER_WARNING);
            //or die("connection failure with " . $host . " -> " . $dbname);
             echo "<p>Connected to:" . $host . " -> " . $db_name . " </p><br />"; //debuging
            // Grab and clean form data
				
            $clean_job = clean($dbc, $_POST['job']); 
	        $clean_make = clean($dbc, $_POST['make']); 
	        $clean_model = clean($dbc, $_POST['model']); 
	        $clean_pt = clean($dbc, $_POST['pt']); 
	        $clean_year = clean($dbc, $_POST['year']); 
	        $clean_miles = clean($dbc, $_POST['miles']); 

            echo "<p>Cleaned vars: [" . $iid . ", " . $cal_date . ", " . $clean_job . ", " . $clean_make . ", " . 
                    $clean_model . ", " . $clean_pt . ", " . $clean_year . ", " . $clean_miles . "]</p><br />"; //debuging
        
            if (!empty($clean_job) && !empty($clean_make)&& !empty($clean_model)&& !empty($clean_pt)&& !empty($clean_year)&& !empty($clean_miles)) 
            {       // Insert into the DB
                $query = "INSERT INTO 
                    $tbl_name( `Created_by`, `Cal_Date`, `Job_description`, `Car_make`, `Car_model`, `Car_powertrain`, `Car_year`, `Car_miles`) 
                    VALUES ('$iid', '$cal_date', '$clean_job', '$clean_make', '$clean_model', '$clean_pt', '$clean_year', '$clean_miles')";
                //$data = mysqli_query($dbc, $query) or trigger_error("DB write fail",E_USER_WARNING);
                //or die("<p>Query failure: " . $query . " </p><br />");
                echo "<p>Sending query: " . $query . " </p><br />"; //debuging
                header("location: ../appointments.php");  // comment this line to activate debugging        
            } else { 
                $_SESSION['err_msg'] = 'All fields must be filled in.';  
                header("location: ../_php_fail.php");  // comment this line to activate debugging
            }
            */ 
        } else { 
            $_SESSION['err_msg'] = 'Sorry, you must be loged in to complete this action.';  
            header("location: ../_php_fail.php"); // comment this line to activate debugging
        }
?>
