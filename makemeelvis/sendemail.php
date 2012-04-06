<?php define("title","MakeMeElvis"); ?>
<?php define("description","Make Me Elvis"); ?>
<?php define("keywords",""); ?>

<?php define("pageid","Remove Email"); ?>

<?php include('includes/header.php'); ?> 

   <h2 class="h2top">Make Me Elvis</h2>
  <img src="./img/blankface.jpg" width="161" height="350" alt="" style="float:right" />


  <p><strong>Private:</strong> For Elmer's use ONLY<br />
  Write and send an email to mailing list members.</p>
  <form method="post" action="./includes/_sendemail.php">
    <label for="subject">Subject of email:</label><br />
    <input id="subject" name="subject" type="text" size="30" /><br />
    <label for="elvismail">Body of email:</label><br />
    <textarea id="elvismail" name="elvismail" rows="8" cols="40"></textarea><br /><br />
    <input type="submit" name="Submit" value="Submit" />
  </form>

<?php include('includes/footer.php'); ?>
