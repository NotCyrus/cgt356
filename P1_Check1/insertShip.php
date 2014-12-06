<?php
//use session object
session_start();
if(!$_SESSION['loggedIn'])
{
	$_SESSION["loginError"] = "Please Login First";
	header("Location: login.php");
}
//check for empty session
if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";
	
// This file validates as html5
echo("<?xml version=\"1.0\" encoding=\UTF-8\"?>");
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="en">
<head>
<meta charset="utf-8">
<title>Insert New Shipping Information</title>
<link rel="stylesheet" type="text/css" href="css.css">
<style type="text/css">
	form{width:400px; margin:0px auto;}
	fieldset{padding:10px; border:1px solid #000; width:400px; overflow:auto; margin:10px;}
	legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold;}
</style>
</head>
<body>

<h1 style="text-align:center">Insert</h1>
  <?php
  	include("includes/menu.php");
  ?>
<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>

<form id="insertform" method="post" action="doInsertShip.php" style="position:relative; left:2px; top:100px;">
	<fieldset>
    	<legend>Insert New Shipping Information </legend>
        <ul id="insertList">
        	<li><label title="AddressID" for="addressID">Address ID</label><input name="addressID" id="addressID" type="text" size="20" maxlength="3" /></li>
        	<li><label title="Login" for="login">User Name</label><input name="login" id="login" type="text" size="20" maxlength="3" value="<?php echo($_SESSION['userName']); ?>" readonly /></li>
            <li><label title="Name" for="name">Name</label><input name="name" id="name" type="text" size="20" maxlength="20" /></li>
            <li><label title="Address1" for="Address1">Address Line 1</label><input name="address1" id="address1" type="text" size="20" maxlength="20" /></li>
            <li><label title="Address2" for="Address2">Address Line 2</label><input name="address2" id="address2" type="text" size="20" maxlength="20" /></li>
            <li><label title="City" for="City">City</label><input name="city" id="city" type="text" size="20" maxlength="20" /></li>
            <li><label title="State" for="State">State</label><input name="state" id="state" type="text" size="20" maxlength="20" /></li>
            <li><label title="Zip" for="Zip">Zip</label><input name="zip" id="zip" type="text" size="20" maxlength="20" /></li>
            <li><input type="submit" value="Insert Info" name="submit" id="submit" /></li>
        </ul>
    </fieldset>
</form>

<?php
//clear the error message
$_SESSION["errorMessage"] = "";
?>

<script type="text/javascript">
	document.getElementById("addressID").focus();
</script>
</body>
</html>
