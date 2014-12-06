<?php
	if(!empty($_SESSION['userName']))
	{
		echo("Hello ".$_SESSION['firstName']."</br>If you are not ".$_SESSION['firstName'].' please <a id=logoutLink" href="logout.php">Log Out</a>');
	}
	else
	echo('Hello, <a id="loginLink" href="login.php">Log In</a>.');
?>