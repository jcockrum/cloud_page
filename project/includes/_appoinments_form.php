<h2 class="h2top"><?php echo title; ?></h2>
<p> Please provide us with the following information and we will take care of your vehicle </p>
<form action="./includes/appoinments_control.php" method="post">
 
 <div class="field">
    <label for="cal_date">Date:</label><br />
    <input id="cal_date" name="cal_date" size="30" type="text" />
  </div>
  <div class="field">
<<<<<<< HEAD
    <label for="job_description">Service Request:</label><br />
    <input id="job_description" name="job_description" size="30" type="text" />
=======
    <label for="service">Service Request:</label><br />
    <input id="service" name="service" size="30" type="text" />
>>>>>>> 4d7c09b0a1b0c974928a483df3d5d324ba0b13e9
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
    <input id="user_submit" name="commit" type="submit" value="Sign up" />
  </div>
</form>

// I used the _join_form.php page as a reference for the div class and submit button 
