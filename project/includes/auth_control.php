<?php
    session_start();
    ob_start();
    $DEBUG=""; // Debug flag ( 1 for true, "" for false)
    if($DEBUG) 
    {    
        echo "<br /> Auth - Current Session-----------<br />";
        print_r($_SESSION);
        echo "<br />----------------------------------------------<br />";
        print_r($_POST); 
        echo "<br />--------------------------<br />";
    }  

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
    set_error_handler("customError",E_USER_WARNING);

    // var's Defintion:
    $_SESSION['err_msg']    ="";            // Clear error messgae
    $host		            ="127.0.0.1"; 	// Host name
    $db_usr		            ="root"; 	    // Mysql username
    $db_pwd		            ="1q2w3e4r"; 	// Mysql password
    $db_name	            ="project"; 	// Database name
    $tbl_name	            ="Identities"; 	// Table name	

    if (!isset($_SESSION['username'])) 
    {           
        // Connect to the database
        $dbc = mysqli_connect($host, $db_usr, $db_pwd, $db_name) or trigger_error("DB connection fail",E_USER_WARNING); 
        if($DEBUG) {echo "<p>Connected to:" . $host . " -> " . $db_name . " </p><br />"; }

        // Grab and clean form data
        $clean_user = clean($dbc, $_POST['email']);                
        $clean_pass = clean($dbc, $_POST['password']);

        if($DEBUG) {echo "<p>Cleaned User / Pass: [" . $clean_user . " / " . $clean_pass . "]</p><br />"; }
        if (!empty($clean_user) && !empty($clean_pass)) 
        {       
            // Look up the username and password in the database
            $query = "SELECT * FROM $tbl_name WHERE Email='$clean_user' AND PassWd='$clean_pass'";
            $data = mysqli_query($dbc, $query) or trigger_error("DB read fail",E_USER_WARNING);
            if($DEBUG) {echo "<p>Sending query: " . $query . " </p><br />"; }
            if (mysqli_num_rows($data) == 1) 
            {       // Suscess
                    $row = mysqli_fetch_array($data); //used to write userinfo into the session/cookie
                    $_SESSION['iid'] = $row['IID'];
                    $_SESSION['role']  =  $row['Role'];                             
                    $_SESSION['nicename'] = $row['FName'];
                    $_SESSION['username'] = $row['Email'];
                    setcookie('username', $row['Email'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                    if($DEBUG) 
                    {                                
                        echo "<br />new session---------------<br />";
                        print_r($_SESSION);
                        echo "<br />--------------------------<br />";
                    } else if($_SESSION['role'] == "A")
                        {header("location: ../appointments.php");}
                        else {header("location: ../set_appointment.php");}
           } else { 
            $_SESSION['err_msg'] = 'You must enter a valid username and password to log in.';  
            if(!$DEBUG) {header("location: ../_php_fail.php");}
           }
        } else { 
            $_SESSION['err_msg'] = 'Sorry, you must enter your username and password to log in.';  
            if(!$DEBUG) {header("location: ../_php_fail.php");}
        }
    }

    ob_end_flush();
?>
