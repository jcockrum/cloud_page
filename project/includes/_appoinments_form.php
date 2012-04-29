<h2 class="h2top"><?php echo title; ?></h2>
<p> Please provide us with the following information and we will take care of your vehicle </p>
<form action="./includes/_waitingfor_content.php" method="post">
 
 <div class="field">
        <label for="Cal_date">Service Date:</label><br />
        <?php include_once("location: ./drop_down.php"); ?>
  </div>
  
  <div class="field">
    <label for="job_description">Service Request:</label><br />
    <input id="job_description" name="job_description" size="30" type="text" />
  </div>
  
  <div class="field">
    <label for="car_make">Make:</label><br />
    <input id="car_make" name="car_make" size="30" type="text" />
  </div>
  
   <div class="field">
    <label for="car_model">Model:</label><br />
    <input id="car_model" name="car_model" size="30" type="text" />
  </div>
  
   <div class="field">
    <label for="car_powertrain">Engine Size:</label><br />
    <input id="car_powertrain" name="car_powertrain" size="30" type="text" />
  </div>
  
   <div class="field">
    <label for="car_year">Year:</label><br />
    <input id="car_year" name="car_year" size="30" type="text" />
  </div>
  
  <div class="actions">
    <input id="user_submit" name="commit" type="submit" value="Set Appointment" />
  </div>
</form>


	<!-- I used the _join_form.php page as a reference for the div class and submit button  -->
