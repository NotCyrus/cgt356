<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css.css">
<title>Login Page </title>
</head>

<body>
<div id="container">
	<div class="loggedIn">
	Hello, <a id="loginLink" href="login.php">Log In</a>.
    </div>
    
  <?php
  	include("includes/menu.php");
  ?>

	<form id="loginspace" action="loginThru.php" method="post">
        <ul id="loginList">
            <li><p><input type="text" name="userID" id="userID" size="30" maxlength="30" placeholder="User ID" /></p></li>
			<li><p><input type="password" placeholder="Password" name="pass"  id="pass" size="30" maxlength="30"/></p></li>
            <li><p><input id="loginButton" type="submit" value="Login" /></p></li>  
            <li><p><?php 
						session_start();
						if(!empty($_SESSION['loginError']))
							{
								echo $_SESSION['loginError'];
								$_SESSION['loginError']='';
							}
					?></p></li>
        </ul>
   	</form>
    <a id="regLink" href="register.php">Register for account</a>
</div>
    

<script type="text/javascript">
	document.getElementById("userID").focus();
</script>

</body>
</html>