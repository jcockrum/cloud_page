<?php
    session_start();
    $DEBUG=""; // Debug flag ( 1 for true, "" for false)
    if($DEBUG) 
    {    
        echo "<br /> Auth - Current Session-----------<br />";
        print_r($_SESSION);
        echo "<br />----------------------------------------------<br />";
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

    // Get a list of dates
    function datesArray() 
    {
        // var's Defintion:
        $_SESSION['err_msg']    ="";            // Clear error messgae
        $host		            ="127.0.0.1"; 	// Host name
        $db_usr		        	="root"; 	    // Mysql username
        $db_pwd		        	="1q2w3e4r"; 	// Mysql password
        $db_name	        	="project"; 	// Database name
        $tbl_name	       		="Dates"; 	    // Table name	
        if (isset($_SESSION['username'])) 
        {           
            // Connect to the database
            $dbc = mysqli_connect($host, $db_usr, $db_pwd, $db_name) or trigger_error("DB Connection fail",E_USER_WARNING);
            if($DEBUG) {echo "<p>Connected to:" . $host . " -> " . $db_name . " </p><br />";  }
            $query = "SELECT * FROM $tbl_name";
            $data = mysqli_query($dbc, $query) or trigger_error("DB Read fail",E_USER_WARNING);
            if($DEBUG) {echo "<p>Sending query: " . $query . " </p><br />";  }
            //get number of rows returned
            $num_datas = $data->num_rows; 
            if( $num_datas > 0)//will not make a table without records
            { 
                $options = array(  ); 
                $cntr = 0 ; 
                while( $row = $data->fetch_assoc() ) //loop to show each records
                    {   //extract row -- this will make a $row['firstname'] to just a variable $firstname only
                        extract($row);
                        $tmp =  " {$Cal_Date} {$At_time}";   
                        $options[$cntr++] = $tmp; 
                    }				   
            } else { echo "No records found.";  }
            // Cleanup
            $data->free();
            $dbc->close();      
        } else { 
        $_SESSION['err_msg'] = 'Sorry, you must be loged in to complete this action.';  
        if(!$DEBUG) {header("location: ../_php_fail.php");}
        }
        if($DEBUG){print_r($options);}
        return $options; 
    }

    // Make a dropdown list
    function dropListBox( $name, array $options, $selected=null )
    {
        $options = datesArray() ; //Fill the options array 
        if($DEBUG) 
        {		
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=<br />";
            print_r($options); 
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=<br />";
        }
        $dropdown = '<select name="'.$name.'" id="'.$name.'">'."\n"; // begin the select 
        $selected = $selected;
        foreach( $options as $key=>$option ) // loop over the options 
        {
            $select = $selected==$key ? ' selected' : null;  // assign a selected value
            $dropdown .= '<option value="'.$key.'"'.$select.'>'.$option.'</option>'."\n"; // add each option to the dropdown 
        }
        $dropdown .= '</select>'."\n"; // close the select
        return $dropdown;  // and return the completed dropdown
    } 

    //Create the dropdown HTML
    $name = 'Cal_date';
    $options = array( );
    $selected = 1;

    if($DEBUG){echo "<br /><form>";}
    echo dropListBox($name, $options, $selected);
    if($DEBUG){echo "</form>";}


?>
