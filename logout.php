<?php

	session_start();
	unset($_SESSION["username"]);
	session_destroy();

?>
 <H2> You are now Logged Out </H2> 
 <p>Would you like to log in again? <a href="Login.php">Log in</a>  </p>
