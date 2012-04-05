
<?php
	// link this to disconnect a session
	session_start();
	session_destroy();
	header("location: ../index.php");
?>
