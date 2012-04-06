<?php define("title","MakeMeElvis"); ?>
<?php define("description","Make Me Elvis"); ?>
<?php define("keywords",""); ?>

<?php define("pageid","Added User"); ?>

<?php include('includes/header.php'); ?> 

<?php
	// var's Defintion:
	$host		="127.0.0.1"; 	// Host name
	$db_usr		="root"; 	// Mysql username
	$db_pwd		="1q2w3e4r"; 	// Mysql password
	$db_name	="mm_elvis"; 	// Database name
	$tbl_name	="email_list"; 	// Table name
	
	// Connect to server/db:
	mysql_connect("$host", "$db_usr", "$db_pwd")or die("cannot connect to " . $host);
	//echo "connected <br />";
	mysql_select_db("$db_name")or die("cannot connect to database " . $db_name);

        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];

        echo "INSERT INTO $tbl_name (first_name, last_name, email)  VALUES ('$first_name', '$last_name', '$email')";

        $query = "INSERT INTO $tbl_name (first_name, last_name, email)  VALUES ('$first_name', '$last_name', '$email')";
        mysqli_query($query) or die('Error querying database.');
        
        echo 'Customer added.';
        mysqli_close($dbc);
?>

<?php include('includes/footer.php'); ?>
