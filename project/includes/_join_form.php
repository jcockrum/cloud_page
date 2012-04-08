<h2 class="h2top"> <?php echo title; ?></h2>

<form action="./includes/_join_control.php" method="post">	
  <div class="field">
    <label for="fname">First Name:</label><br />
    <input id="fname" name="fname" size="30" type="text" />
  </div>
  <div class="field">
    <label for="lname">Last Name:</label><br />
    <input id="lname" name="lname" size="30" type="text" />
  </div>
  <div class="field">
    <label for="phnum">Phone number:</label><br />
    <input id="phnum" name="phnum" size="30" type="text" />
  </div>
  <div class="field">
    <label for="email">E-mail:</label><br />
    <input id="email" name="email" size="30" type="text" />
  </div>
  <div class="field">
    <label for="password">Password:</label><br />
    <input id="password" name="password" size="30" type="password" />
  </div>     
  <div class="actions">
    <input id="user_submit" name="commit" type="submit" value="Sign up" />
  </div>
</form>

<?php
        /*
        <div class="field">
        <label for="role">role</label><br />
        <input id="role" name="role" size="30" type="text" />
        </div>
	Stree Address<input type="text" name="add_1" id="add_1"> <br />
	<input type="text" name="add_2" id="add_2"> <br />
	City <input type="text" name="city" id="city"> <br />
	State <input type="text" name="state" id="state"> <br />
	ZIP <input type="text" name="zcode" id="zcode"> <br />
	<input type="submit" value="Submit" /><br />

          <div class="field">
            <label for="user_name">Name</label><br />
            <input id="user_name" name="user[name]" size="30" type="text" />
          </div>
        */
?>
