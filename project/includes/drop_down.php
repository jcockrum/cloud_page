<?php
        // var's Defintion:
        $_SESSION['err_msg']    ="";                    // Clear error messgae
		$host		        	="127.0.0.1"; 	        // Host name
		$db_usr		        	="root"; 	        	// Mysql username
		$db_pwd		        	="1q2w3e4r"; 	        // Mysql password
		$db_name	        	="project"; 	        // Database name
		$tbl_name	       		="Dates"; 	       	    // Table name	

        if (isset($_SESSION['username'])) 
        {           
                // Connect to the database
                $dbc = mysqli_connect($host, $db_usr, $db_pwd, $db_name) or die("connection failure with " . $host . " -> " . $dbname);
                echo "<p>Connected to:" . $host . " -> " . $db_name . " </p><br />"; //debuging
                $query = "SELECT * FROM $tbl_name";
                $data = mysqli_query($dbc, $query) or die("<p>Query failure:" . $query . " </p><br />");
                echo "<p>Sending query: " . $query . " </p><br />"; //debuging
                //get number of rows returned
                $num_datas = $data->num_rows;
                if( $num_datas > 0)//will not make a table without records
                { 
                   
				while( $row = $data->fetch_assoc() ) //loop to show each records
                        {       //extract row -- this will make a $row['firstname'] to just a variable $firstname only
                                extract($row);
                               
                                $tmp = {$Cal_Date} ; // . " " . {$At_time};
                                echo " $tmp <br /> " ;  //debuging  
        
                                
                        }

				   
                } else {
                        echo "No records found.";
                }
                // Cleanup
                $data->free();
                $dbc->close();      
        } else { 
                $_SESSION['err_msg'] = 'Sorry, you must be loged in to complete this action.';  
                header("location: ../_php_fail.php"); // comment this line to activate debugging
        }


	function dropdown( $name, array $options, $selected=null )
	{
		/*** begin the select ***/
		$dropdown = '<select name="'.$name.'" id="'.$name.'">'."\n";

		$selected = $selected;
		/*** loop over the options ***/
		foreach( $options as $key=>$option )
		{
			/*** assign a selected value ***/
			$select = $selected==$key ? ' selected' : null;

			/*** add each option to the dropdown ***/
			$dropdown .= '<option value="'.$key.'"'.$select.'>'.$option.'</option>'."\n";
		}

		/*** close the select ***/
		$dropdown .= '</select>'."\n";

		/*** and return the completed dropdown ***/
		return $dropdown;
	}

?> 
<form>

<?php
$name = 'my_dropdown';
// $options = array( 'dingo', 'wombat', 'kangaroo' );
$selected = 1;

echo dropdown( $name, $options, $selected );

?>
</form> 


?> 

  

