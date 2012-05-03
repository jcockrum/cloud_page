<?php
	session_start();

        /*// debuging block        
        echo "Stage 0 <br /> Current Session-----------<br />";
        print_r($_SESSION);
        echo "<br />--------------------------<br />";        
        print_r($_POST); */

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
                //echo "<b>Error:</b> [$errno] $errstr<br />";
                $_SESSION['err_msg'] = "<b>Error:</b> [$errno] $errstr<br />"; 
                header("location: ../_php_fail.php");
                die();
        }
        
        //set error handler
        set_error_handler("customError",E_USER_WARNING);
       

        // var's Defintion:
        $_SESSION['err_msg']    ="";                    // Clear error messgae
        $iid                    =$_SESSION['iid'];      // read user key  
	$host		        ="127.0.0.1"; 	        // Host name
	$db_usr		        ="root"; 	        // Mysql username
	$db_pwd		        ="1q2w3e4r"; 	        // Mysql password
	$db_name	        ="project"; 	        // Database name
	$tbl_name	        ="Dates"; 	        // Table name	

        if (isset($_SESSION['username'])) 
        {           
                // Connect to the database
                $dbc = mysqli_connect($host, $db_usr, $db_pwd, $db_name) or trigger_error("DB Connection fail",E_USER_WARNING);
                //or die("connection failure with " . $host . " -> " . $dbname);
                //echo "<p>Connected to:" . $host . " -> " . $db_name . " </p><br />"; //debuging
                // Grab and clean form data
                $clean_date = clean($dbc, $_POST['cal_date']);                
                $clean_hours = clean($dbc, $_POST['at_time']);
                echo "<p>Cleaned vars: [" . $clean_date . ", " . $clean_hours . "]</p><br />"; //debuging

                if (!empty($clean_date) && !empty($clean_hours)) 
                {       // Insert into the DB
                        $query = "INSERT INTO Dates VALUES (NULL,'$clean_date','$clean_hours', 0, $iid);";
                        $data = mysqli_query($dbc, $query) or trigger_error("DB write fail",E_USER_WARNING);
                        //or die("<p>Query failure: " . $query . " </p><br />");
                        //echo "<p>Sending query: " . $query . " </p><br />"; //debuging
                        header("location: ../dates.php");  // comment this line to activate debugging        
                } else { $_SESSION['err_msg'] = 'Unable to complete that action.';  
                       header("location: ../_php_fail.php");  // comment this line to activate debugging
                       } 
      } else { 
        $_SESSION['err_msg'] = 'Sorry, you must be loged in to complete this action.';  
        header("location: ../_php_fail.php"); // comment this line to activate debugging
      }
?>
