<?php define("title","MakeMeElvis"); ?>
<?php define("description","Make Me Elvis"); ?>
<?php define("keywords",""); ?>

<?php define("pageid","Remove Email"); ?>

<?php include('includes/header.php'); ?> 

   <h2 class="h2top">Make Me Elvis</h2>
  <img src="./img/blankface.jpg" width="161" height="350" alt="" style="float:right" />
  
  <p>Enter an email address to remove.</p>
  <form method="post" action="./includes/_removeemail.php">
    <label for="email">Email address:</label><br />
    <input id="email" name="email" type="text" size="30" /><br /><br />
    <input type="submit" name="Remove" value="Remove" />
  </form>

<?php include('includes/footer.php'); ?>
