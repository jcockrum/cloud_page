<div class="nav">
	<br />
	<ul>
		<li><a href="./">Main</a> |</li>
		<?php 
                       if ($_SESSION['role'] == "A") {echo '<li><a href="./dates.php">Manage Dates</a> |</li>';} 
                       else {echo'<li><a href="./location.php">Location</a> |</li>';}
                ?>			
		<li><a href="./appointments.php">Make An Appointment</a> | </li>
		<li><a href="./includes/drop_down.php">Drop down test page</a> </li>
	</ul>
</div>

<div class=floatright>
	<form action="./includes/authout_control.php" method="post">
          <div class="actions">
            <input id="LogOut" name="commit" type="submit" value="Log Out" />
          </div>
	</form>
</div>
