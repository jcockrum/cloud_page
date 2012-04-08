<h2 class="h2top"> <?php echo title; ?></h2>
<div class="reg">
        <form action="./includes/_join_control.php" method="post">
                        <label>First Name: </label>
                        <input type="text" name="fname" id="fname" />
                        <br />
                        <label>Last Name: </label>
                        <input type="text" name="lname" id="lname" />
                        <br />
                        <label>Phone number: </label>
                        <input type="text" name="phnum" id="phnum" />
                        <br />
                        <label>E-Mail: </label>
                        <input type="text" name="email" id="email" />
                        <br />
                        <label>Password: </label>
                        <input type="password" name="password" id="password" />
                        <br />
                        <input id="user_submit" name="commit" type="submit" value="Sign up" />
                        <div class="spacer"></div>
        </form>
</div>
