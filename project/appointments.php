<?php  session_start(); $_SESSION['pid'] = "appo"; ?>
<?php define("title","Appointments"); ?>
<?php define("description","Please register and make an appointment"); ?>
<?php define("keywords","a plus auto and truck repair, automotive repair corona, auto repair corona, car repair corona, automotive repair"); ?>

<?php define("pageid","Appointments"); ?>

<?php include('includes/_header.php'); ?> 

<?php include('includes/_appoinments_form.php'); ?>

<?php include('includes/_footer.php'); ?>
