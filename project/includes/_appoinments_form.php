<h2 class="h2top"><?php echo title; ?></h2>
<p> Please provide us with the following information and we will take care of your vehicle </p>
<form action="./includes/appoinments_control.php" method="post">
 
 <div class="field">
        <label for="Cal_date">Service Date:</label><br />
        <?php include("./includes/drop_down.php"); ?>
  </div>
  
  <div class="field">
    <label for="job">Service Request:</label><br />
    <input id="job" name="job" size="30" type="text" />
  </div>
  
  <div class="field">
    <label for="make">Make:</label><br />
    <input id="make" name="make" size="30" type="text" />
  </div>
  
   <div class="field">
    <label for="model">Model:</label><br />
    <input id="model" name="model" size="30" type="text" />
  </div>
  
   <div class="field">
    <label for="pt">Engine Size:</label><br />
    <input id="pt" name="pt" size="30" type="text" />
  </div>
  
   <div class="field">
    <label for="year">Year:</label><br />
    <input id="year" name="year" size="30" type="text" />
  </div>
  
   <div class="field">
    <label for="miles">Year:</label><br />
    <input id="miles" name="miles" size="30" type="text" />
  </div>
  
  <div class="actions">
    <input id="user_submit" name="commit" type="submit" value="Set Appointment" />
  </div>
</form>


	<!-- I used the _join_form.php page as a reference for the div class and submit button  -->
