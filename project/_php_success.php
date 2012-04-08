<?php define("title","Successful"); ?>
<?php define("description","Description of page goes here."); ?>
<?php define("keywords","a plus auto and truck repair, automotive repair corona, auto repair corona, car repair corona, automotive repair"); ?>
<?php define("pageid","success"); ?>
<?php include('./includes/_header.php'); ?> 
<h2 class="h2top"><?php echo title; ?></h2>
<?php echo "<p>Thank you " . $_SESSION['username'] . ", You are now Loged in.";?>
<?php include('./includes/_footer.php'); ?>
