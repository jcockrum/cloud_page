<h2 class="h2top"><?php echo title; ?></h2>

<?php
    session_start();
    $DEBUG="";  // Debug flag ( 1 for true, "" for false)
    if($DEBUG) 
    {    
        echo "<br /> Dates - Current Session-----------<br />"; 
        print_r($_SESSION);
        echo "<br />----------------------------------------------<br />";
    }
    
    // or trigger_error("DB write fail",E_USER_WARNING); --> 'or die();' replacement   
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
    $tbl_name	            ="Dates";       // Table name	

    if (isset($_SESSION['username'])) 
    {           
            // Connect to the database
            $dbc = mysqli_connect($host, $db_usr, $db_pwd, $db_name) or trigger_error("DB Connect fail",E_USER_WARNING);
            if($DEBUG) { echo "<p>Connected to:" . $host . " -> " . $db_name . " </p><br />";  }
            $query = "SELECT * FROM $tbl_name";
            $data = mysqli_query($dbc, $query) or trigger_error("DB read fail",E_USER_WARNING);
            if($DEBUG) { echo "<p>Sending query: " . $query . " </p><br />";  }
            //get number of rows returned
            $num_datas = $data->num_rows;
            if( $num_datas > 0)//will not make a table without records
            { 
                    echo "<table border='1'>";//start table -- creating our table heading
                    echo "<caption><h1>{$tbl_name}</h1></caption>";                        
                    echo "<tr>";
                            //echo "<th>DID</th>";
                            echo "<th>Date</th>";
                            echo "<th>Time</th>";
                            echo "<th>Locked</th>";
                            echo "<th>Created by</th>";
                    echo "</tr>";                                              
                    while( $row = $data->fetch_assoc() ) //loop to show each records
                    {       //extract row -- this will make a $row['firstname'] to just a variable $firstname only
                            extract($row);
                            echo "<tr>";//creating new table row per record
                                    //echo "<td>{$DID}</td>";
                                    echo "<td>{$Cal_Date}</td>";
                                    echo "<td>{$At_time}</td>";
                                    echo "<td>{$Is_locked}</td>";
                                    echo "<td>{$Created_by}</td>";
    // inline Edit / Delete -- might play with this later
                            /*      echo "<td>";//just preparing the edit link to edit the record
                                    echo "<a href='edit.php?id={$id}'>Edit</a>";
                                    echo " / ";//just preparing the delete link to delete the record
                                    echo "<a href='#' onclick='delete_user( {$id} );'>Delete</a>";
                                    echo "</td>"; 
                           */
                            echo "</tr>";
                    }
                    echo "</table>";//end table
            } else {
                echo "No records found.";
            }
            // Cleanup
            $data->free();
            $dbc->close();      
    } else { 
        $_SESSION['err_msg'] = 'Sorry, you must be loged in to complete this action.';  
        if (!$DEBUG) {header("location: ../_php_fail.php");}
    }
    
?>
