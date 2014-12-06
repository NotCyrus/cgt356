<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css.css">
<title>Project 1 - Manage Billing Info</title>
</head>

<body>
<div id="container">
	<div class="loggedIn">
	<?php
	include("includes/loggedIn.php");
?>
    </div>
    
  <?php
  	include("includes/menu.php");
  ?>
    <div class="bodytext">
    	<ul>
        	<li><a href="insert.php">Insert New Biling Info</a></li>
            <li><a href="select.php">View Billing Info</a></li>
            <li><a href="delete.php">Delete billing info</a></li>
        </ul>
    </div>

</div>

<script type="text/javascript">
	document.getElementById("userID").focus();
</script>

</body>
</html>