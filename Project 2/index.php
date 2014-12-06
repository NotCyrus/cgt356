<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css.css">
<title>Project 2 - Index</title>
</head>
<header style="background-color:#000; color:#FFF; text-align:left; font-size:36pt; font-family:Georgia, 'Times New Roman', Times, serif">
<img src="purduelogo.jpg" alt="Purdue signature" title="" height="39" width="120" border="0" id="purdue-signature">
	<span style="float:right; font-size:18px">
		<a href="login.php">Log In</a>
   	</span> <br />
<span style="font-size:24px; font-family:Arial, Helvetica, sans-serif">
Image Gallery
</span>
</header>

<body>
<div id="container">
	<div class="loggedIn">
    </div>
   
  <?php
  	include("includes/menu.php");
  ?>
    <div class="bodytext">
    	<p>"This is a test page."</p>
    </div>

</div>

<script type="text/javascript">
	document.getElementById("userID").focus();
</script>

</body>
</html>