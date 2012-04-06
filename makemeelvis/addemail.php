<?php define("title","MakeMeElvis"); ?>
<?php define("description","Make Me Elvis"); ?>
<?php define("keywords",""); ?>

<?php define("pageid","Add User"); ?>

<?php include('includes/header.php'); ?> 
   <h2 class="h2top">Make Me Elvis</h2>
  <img src="./img/blankface.jpg" width="161" height="350" alt="" style="float:right" />
 
  <p>Enter your first name, last name, and email to be added to the <strong>Make Me Elvis</strong> mailing list.</p>
  <form method="post" action="./includes/_addemail.php">
    <label for="firstname">First name:</label>
    <input type="text" id="firstname" name="firstname" /><br />
    <label for="lastname">Last name:</label>
    <input type="text" id="lastname" name="lastname" /><br />
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" /><br /><br />
    <input type="image" src="./img/elvislogo.gif" name="image" width="229" height="32"><br>
  </form>

<?php include('includes/footer.php'); ?>
