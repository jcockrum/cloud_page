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
  //$dbc = mysqli_connect('http://184.169.130.102/_addemail.php', 'root', '1q2w3e4r', 'elvis_store') or die('Error connecting to MySQL server.');

  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $email = $_POST['email'];

  $query = "INSERT INTO email_list (first_name, last_name, email)  VALUES ('$first_name', '$last_name', '$email')";
  mysqli_query($dbc, $query)
    or die('Error querying database.');

  echo 'Customer added.';

  mysqli_close($dbc);
?>

<?php include('includes/footer.php'); ?>
