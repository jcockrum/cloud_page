<?php define("title","Failed"); ?>
<?php define("pageid","fail"); ?>
<?php include('./includes/_header.php'); ?> 
<h2 class="h2top"><?php echo title; ?></h2>
<?php 
        if(isset($_SESSION['err_msg'])) {  echo $_SESSION['err_msg'];  } 
        else {echo "For some reason, your action has failed. Please try again.";} 
?> 
<?php include('./includes/_footer.php'); ?>
