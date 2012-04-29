<?php
	session_start();
        echo "<br /> Dates - Current Session-----------<br />"; //debuging
        print_r($_SESSION);
        echo "<br />----------------------------------------------<br />";        

        // var's Defintion:
        $_SESSION['err_msg']    ="";                    // Clear error messgae
        $iid                    =$_SESSION['iid'];      // read user key  
	$host		        ="127.0.0.1"; 	        // Host name
	$db_usr		        ="root"; 	        // Mysql username
	$db_pwd		        ="1q2w3e4r"; 	        // Mysql password
	$db_name	        ="project"; 	        // Database name
	$tbl_name	        ="Dates"; 	        // Table name	


        function clean($dbc,$in)
        {
                $step = stripslashes(trim($in));     
                $clean = mysqli_real_escape_string($dbc, $step);
                return $clean;
        }

        if (isset($_SESSION['username'])) 
        {           
                // Connect to the database
                $dbc = mysqli_connect($host, $db_usr, $db_pwd, $db_name) or die("connection failure with " . $host . " -> " . $dbname);
                echo "<p>Connected to:" . $host . " -> " . $db_name . " </p><br />"; //debuging
                // Grab and clean form data
                $clean_date = clean($dbc, $_POST['cal_date']);                
                $clean_hours = clean($dbc, $_POST['at_time']);
                echo "<p>Cleaned vars: [" . $clean_date . ", " . $clean_hours . "]</p><br />"; //debuging

                if (!empty($clean_date) && !empty($clean_hours)) 
                {       // Insert into the DB
                        $query = "INSERT INTO Dates VALUES (NULL,'$clean_date','$clean_hours', 0, $iid);";
                        $data = mysqli_query($dbc, $query) or die("<p>Query failure: " . $query . " </p><br />");
                        echo "<p>Sending query: " . $query . " </p><br />"; //debuging
                        header("location: ../dates.php");  // comment this line to activate debugging        
                } else { $_SESSION['err_msg'] = 'Unable to complete that action.';  
                       header("location: ../_php_fail.php");  // comment this line to activate debugging
                       } 
      } else { 
        $_SESSION['err_msg'] = 'Sorry, you must be loged in to complete this action.';  
        header("location: ../_php_fail.php"); // comment this line to activate debugging
      }


?>