<?php
//use session object
include("includes/openDbConn.php");
session_start();
if(!$_SESSION['loggedIn'])
{
	$_SESSION["loginError"] = "Please Login First";
	header("Location: ../login.php");
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
<title>Update Shipping Information</title>
<link rel="stylesheet" type="text/css" href="../css.css">
<style type="text/css">
	form{width:400px; margin:0px auto;}
	fieldset{padding:10px; border:1px solid #000; width:400px; overflow:auto; margin:10px;}
	legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold;}
</style>
</head>
<body>

<h1 style="text-align:center">Update</h1>
  <?php
  	include("includes/menu.php");
	$sql = "SELECT AddressID, Name, Address1, Address2, City, State, Zip FROM shippingaddress WHERE AddressID=".$_GET['AddressID'];
	$_SESSION['AddID'] = $_GET['AddressID'];
	$result = mysql_query($sql);
	$num_results = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
  ?>
  
<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>

<form id="insertform" method="post" action="../doUpdateShip.php" style="position:relative; left:2px; top:100px;">
	<fieldset>
    	<legend>Update Shipping Information </legend>
        <ul id="insertList">
        	<li><label title="AddressID" for="addressID">Address ID</label><input name="addressID" id="addressID" type="text" size="20" maxlength="3" value="<?php echo($_GET['AddressID']); ?>" readonly /></li>
        	<li><label title="Login" for="login">User Name</label><input name="login" id="login" type="text" size="20" maxlength="3" value="<?php echo($_SESSION['userName']); ?>" readonly /></li>
            <li><label title="Name" for="name">Bill Name</label><input name="name" id="name" type="text" size="20" maxlength="20" value="<?php echo trim($row["Name"]);?>" /></li>
            <li><label title="Address1" for="address1">Shipping Address Line 1</label><input name="address1" id="address1" type="text" size="20" maxlength="20" value="<?php echo trim($row["Address1"]);?>" /></li>
            <li><label title="Address2" for="address2">Shipping Address Line 2</label><input name="address2" id="address2" type="text" size="20" maxlength="20" value="<?php echo trim($row["Address2"]);?>" /></li>
            <li><label title="City" for="city">City</label><input name="city" id="city" type="text" size="20" maxlength="20" value="<?php echo trim($row["City"]);?>" /></li>
            <li><label title="State" for="billState">State</label><input name="billState" id="billState" type="text" size="20" maxlength="20" value="<?php echo trim($row["State"]);?>" /></li>
            <li><label title="Zip" for="zip">Zip</label><input name="zip" id="zip" type="text" size="20" maxlength="20" value="<?php echo trim($row["Zip"]);?>" /></li>
            <li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
            <li><input type="submit" value="Update Info" name="submit" id="submit" /></li>
        </ul>
    </fieldset>
</form>

<?php
//clear the error message
$_SESSION["errorMessage"] = "";
include("includes/closeDbConn.php");
?>

<script type="text/javascript">
	document.getElementById("shipperID").focus();
</script>
</body>
</html>
