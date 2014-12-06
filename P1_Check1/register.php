<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link rel="stylesheet" type="text/css" href="css.css">
</head>

<body>
  <?php
  	include("includes/menu.php");
  ?>
    
	<div id="container">
		<form id="registerspace" action="createAccount.php" method="post">
        	<ul id="registerList">
           	 	<li><p><input type="text" name="userID" id="userID" size="30" maxlength="30" placeholder="Desired UserID" /></p></li>
				<li><p><input type="password" placeholder="Password" name="pass"  id="pass" size="30" maxlength="30"/></p></li>
                <li><p><input type="password" placeholder="Repeat Password" name="passCheck"  id="passCheck" size="30" maxlength="30"/></p></li>
                <li><p><input type="text" name="firstName" id="firstName" size="30" maxlength="30" placeholder="First Name" /></p></li>
                <li><p><input type="text" name="lastName" id="lastName" size="30" maxlength="30" placeholder="Last Name" /></p></li>
                <li><p><input type="text" name="email" id="email" size="30" maxlength="30" placeholder="Email" /></p></li>
                <li><p>Newsletter<input type="checkbox" name="news" id="news" /></p></li>   
            	<li><p><input id="regButton" type="submit" value="Create Account" /></p></li>  
        	</ul>
   		</form>  
	</div>
    
	<script type="text/javascript">
		document.getElementById("userID").focus();
	</script>

</body>
</html>