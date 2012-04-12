<h2 class="h2top"><?php echo title; ?></h2>
<p> Please provide us with the following information and we will take care of your vehicle </p>
<form action="./includes/_waitingfor_content.php" method="post">
 
 <div class="field">
    <label for="car">Car:</label><br />
    <input id="car" name="car" size="30" type="text" />
  </div>
  <div class="field">
    <label for="service">Service Request:</label><br />
    <input id="service name="service" size="30" type="text" />
  </div>
  <div class="field">
    <label for="date">Date:</label><br />
    <input id="date" name="date" size="30" type="text" />
  </div>
  
  <div class="actions">
    <input id="user_submit" name="commit" type="submit" value="Sign up" />
  </div>
</form>

// I used the _join_form.php page as a reference for the div class and submit button 