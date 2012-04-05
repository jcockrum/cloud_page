<?php
	if ($_POST['name2'] == '' && $_POST['url2'] == 'http://') 
	{
		$EmailFrom = Trim(stripslashes($_POST['EmailFrom']));
		$EmailTo = "webmaster@this_site.com";
		$Subject = "AplusAutoTruck.com - Customer Comment";
		$name = Trim(stripslashes($_POST['name']));
		$phone = Trim(stripslashes($_POST['phone']));
		$message = Trim(stripslashes($_POST['message']));

		$validationOK=true;
		if (!$validationOK) 
		{
			print "<meta http-equiv=\"refresh\" content=\"0;URL=../_php_fail.php \">";
			exit;
		}

		$Body = "";
		$Body .= "Name: ";
		$Body .= $name;
		$Body .= "\n";
		$Body .= "Phone Number: ";
		$Body .= $phone;
		$Body .= "\n";
		$Body .= "Email Address: ";
		$Body .= $EmailFrom;
		$Body .= "\n";
		$Body .= "Message: ";
		$Body .= $message;
		$Body .= "\n";
		 
		$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

		if ($success)
		{	print "<meta http-equiv=\"refresh\" content=\"0;URL=../_php_success.php\">";  }
		else{	print "<meta http-equiv=\"refresh\" content=\"0;URL=../_php_fail.php\">"; }
	}
?>
