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
<title>Update Billing Information</title>
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
	$sql = "SELECT BillingID, BillName, BillAddress1, BillAddress2, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate FROM billinginfo WHERE BillingID=".$_GET['BillingID'];
	$_SESSION['BillID'] = $_GET['BillingID'];
	$result = mysql_query($sql);
	$num_results = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
  ?>
  
<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>

<form id="insertform" method="post" action="../doUpdate.php" style="position:relative; left:2px; top:100px;">
	<fieldset>
    	<legend>Update Billing Information </legend>
        <ul id="insertList">
        	<li><label title="BillingID" for="billingID">Billing ID</label><input name="billingID" id="billingID" type="text" size="20" maxlength="3" value="<?php echo($_GET['BillingID']); ?>" readonly /></li>
        	<li><label title="Login" for="login">User Name</label><input name="login" id="login" type="text" size="20" maxlength="3" value="<?php echo($_SESSION['userName']); ?>" readonly /></li>
            <li><label title="BillName" for="billName">Bill Name</label><input name="billName" id="billName" type="text" size="20" maxlength="20" value="<?php echo trim($row["BillName"]);?>" /></li>
            <li><label title="BillAddress1" for="billAddress1">Billing Address Line 1</label><input name="billAddress1" id="billAddress1" type="text" size="20" maxlength="20" value="<?php echo trim($row["BillAddress1"]);?>" /></li>
            <li><label title="BillAddress2" for="billAddress2">Billing Address Line 2</label><input name="billAddress2" id="billAddress2" type="text" size="20" maxlength="20" value="<?php echo trim($row["BillAddress2"]);?>" /></li>
            <li><label title="BillCity" for="billCity">City</label><input name="billCity" id="billCity" type="text" size="20" maxlength="20" value="<?php echo trim($row["BillCity"]);?>" /></li>
            <li><label title="BillState" for="billState">State</label><input name="billState" id="billState" type="text" size="20" maxlength="20" value="<?php echo trim($row["BillState"]);?>" /></li>
            <li><label title="BillZip" for="billZip">Zip</label><input name="billZip" id="billZip" type="text" size="20" maxlength="20" value="<?php echo trim($row["BillZip"]);?>" /></li>
            <li><label title="CardType" for="cardType">Card Type</label><input name="cardType" id="cardType" type="text" size="20" maxlength="20" value="<?php echo trim($row["CardType"]);?>" /></li>
            <li><label title="CardNumber" for="cardNumber">Card Number</label><input name="cardNumber" id="cardNumber" type="text" size="20" maxlength="20" value="<?php echo trim($row["CardNumber"]);?>" /></li>
            <li><label title="ExpDate" for="expDate">Expiriation Date</label><input name="expDate" id="expDate" type="text" size="20" maxlength="20" value="<?php echo trim($row["ExpDate"]);?>" /></li>
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
