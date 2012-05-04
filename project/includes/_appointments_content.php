<h2 class="h2top"><?php echo title; ?></h2>

<?php
    session_start();
    $DEBUG="";// Debug flag ( 1 for true, "" for false)

    if($DEBUG) 
    {    
        echo "<br /> Dates - Current Session-----------<br />"; //debuging
	    print_r($_SESSION);
	    echo "<br />----------------------------------------------<br />";
    }

	// var's Defintion:
	$_SESSION['err_msg']    ="";                    // Clear error messgae
	$usr                    =$_SESSION['iid'];      // Set User ID 
	$host		        	="127.0.0.1"; 	        // Host name
	$db_usr		        	="root"; 	        	// Mysql username
	$db_pwd		        	="1q2w3e4r"; 	        // Mysql password
	$db_name	        	="project"; 	        // Database name
	$tbl_name	        	="Appointments"; 		// Table name	

        if (isset($_SESSION['username'])) 
        {           
                // Connect to the database
                $dbc = mysqli_connect($host, $db_usr, $db_pwd, $db_name) or die("connection failure with " . $host . " -> " . $dbname);
                if($DEBUG) 
                {
                    echo "<p>Connected to:" . $host . " -> " . $db_name . " </p><br />";
                    echo "<p>If switch from session: " . $_SESSION['role'] . " </p><br />";
                    echo "<p>checking user: " . $usr . " </p><br />";
                }
	            if ($_SESSION['role']=='A') { $query = "SELECT * FROM $tbl_name";}
                else {$query = "SELECT * FROM $tbl_name WHERE Created_by = $usr";}
                $data = mysqli_query($dbc, $query) or die("<p>Query failure:" . $query . " </p><br />");
                if($DEBUG) {echo "<p>Sending query: " . $query . " </p><br />";}
                //get number of rows returned
                $num_datas = $data->num_rows;
                if( $num_datas > 0)//will not make a table without records
                { 
                        echo "<table border='1'>";//start table -- creating our table heading
                        echo "<caption><h1>{$tbl_name}</h1></caption>";                        
                        echo "<tr>";
                            if($_SESSION['role'] == "A") {echo "<th>InvoiceID</th>";}
                            if($_SESSION['role'] == "A") {echo "<th>Created_by</th>";}
                            echo "<th>Cal_Date</th>";
                            echo "<th>Job_description</th>";
                            echo "<th>Car_make</th>";
                            echo "<th>Car_model</th>";
                            echo "<th>Car_powertrain</th>";
                            echo "<th>Car_year</th>";
                            echo "<th>Car_miles</th>";
                        echo "</tr>";                                              
                        while( $row = $data->fetch_assoc() ) //loop to show each records
                        {       //extract row -- this will make a $row['firstname'] to just a variable $firstname only
                                extract($row);
                                    echo "<tr>";//creating new table row per record
                                        if($_SESSION['role'] == "A") {echo "<td>{$InvoiceID}</td>";}
                                        if($_SESSION['role'] == "A") {echo "<td>{$Created_by}</td>";}
                                        echo "<td>{$Cal_Date}</td>";
                                        echo "<td>{$Job_description}</td>";
                                        echo "<td>{$Car_make}</td>";
                                        echo "<td>{$Car_model}</td>";
                                        echo "<td>{$Car_powertrain}</td>";
                                        echo "<td>{$Car_year}</td>";
                                        echo "<td>{$Car_miles}</td>";
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
                        echo "No Appointments set.";
                }
                // Cleanup
                $data->free();
                $dbc->close();      
        } else { 
            $_SESSION['err_msg'] = 'Sorry, you must be loged in to complete this action.';  
            if (!$DEBUG) {header("location: ../_php_fail.php");}
        }
?>
