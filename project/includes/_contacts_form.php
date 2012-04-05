<h2 class="h2top"><?php echo title; ?></h2>
<p> Send us a general comment!!</p>
<form action="./includes/_contacts_control.php" method="post">
<p>Name: <input size="15" name="name" type="text" />
Phone: <input size="15" name="phone" type="text" />
Email: <input size="15" name="EmailFrom" type="text" /></p>
<p><br />Message:<br />
<textarea name="message" rows="6" cols="84"></textarea>
<label class="name2">Leave Blank:</label><input type="text" class="name2" id="name2" name="name2" />
<label class="name2">Don't Change:</label><input type="text" value="http://" class="name2" id="url2" name="url2" /></p>
<p><input type="submit" value="&raquo; Submit" class="button" /></p>
</form>
