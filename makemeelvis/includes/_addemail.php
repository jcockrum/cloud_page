<?php define("title","MakeMeElvis"); ?>
<?php define("description","Make Me Elvis"); ?>
<?php define("keywords",""); ?>

<?php define("pageid","Added User"); ?>

<?php include('includes/header.php'); ?> 

<?php
  $dbc = mysqli_connect('http://184.169.130.102/index.php', 'root', '1q2w3e4r', 'elvis_store') or die('Error connecting to MySQL server.');

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
