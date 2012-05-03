<?php  session_start(); $_SESSION['pid'] = "set"; ?>
<?php define("title","Appointments Manager"); ?>
<?php define("description","Come see us at 1359 W 6th St. Corona, CA 92882"); ?>
<?php define("keywords","a plus auto and truck repair, automotive repair corona, auto repair corona, car repair corona, automotive repair"); ?> 

<?php define("pageid","set_appointments"); ?>
<?php include('includes/_header.php'); ?> 

<?php include('includes/_appoinments_form.php'); ?>

<?php include('includes/_footer.php'); ?>
