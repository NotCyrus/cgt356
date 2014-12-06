<?php
//use session object
session_start();

//check for empty session
if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";

//open DB connection
include("includes/openDbConn.php");
	
// This file validates as html5
echo("<?xml version=\"1.0\" encoding=\UTF-8\"?>");
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="en">
<head>
<meta charset="utf-8">
<title>Lab 05 - Update</title>
<style type="text/css">
	form{width:400px; margin:0px auto;}
	ul{list-style:none; margin-top:5px;}
	ul li{display:block; float:left; width:100%; height:1%;}
	ul li label{float:left; padding:7px;}
	ul li span{color:#0000ff; font-weight:bold;}
	ul li input{float:right; margin-right:10px; border:1px solid #000; padding:3px; width:240px;}
	input#submit {width:248px;}
	li linput:focus{border:1px solid #999;}
	fieldset{padding:10px; border:1px solid #000; width:400px; overflow:auto; margin:10px;}
	legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold;}
</style>
</head>
<body>
<h1 style="text-align:center">Lab 5 - Update</h1>
<?php
	include("includes/menu.php");
?>
<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
<?php
	//prepare SQL statement
	$sql = "SELECT ShipperID, CompanyName, Phone FROM ShippersLab5 WHERE ShipperID=2";
	
	$result = mysql_query($sql);
	if(empty($result))
	{
		$num_results = 0;
	}
	else
	{
		$num_results = mysql_num_rows($result);
		$row = mysql_fetch_array($result);
	}
	if($num_results==0)
		$_SESSION["errorMessage"] = "You must first insert a Shipper with ID 2";
?>
<form id="form0" method="post" action="doUpdate.php">
	<fieldset>
    	<legend>Update Shipper table</legend>
        <ul>
        	<li><label title="ShipperID" for="shipperIDdis">Shipper ID</label>
            <input name="shipperIDdis" id="shipperIDdis" type="text" size="20" maxlength="20" value="<?php if($num_results!=0){echo trim($row["ShipperID"]);} ?>" disabled="disabled" /></li>
            <input name="ShipperID" id="shipperID" type="hidden" value="<?php if($num_results!=0){echo trim($row["ShipperID"]);} ?>"/>
            <li><label title="CompanyName" for="companyName">Company Name</label><input name="companyName" id="companyName" type="text" size="20" maxlength="20" value="<?php if($num_results!=0){echo trim($row["CompanyName"]);} ?>" /></li>
            <li><label title="Phone" for="phone">Phone #</label><input name="phone" id="phone" type="text" size="20" maxlength="20" value="<?php if($num_results!=0){echo trim($row["Phone"]);} ?>" /></li>
            <li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
            <li><input type="submit" value="Update Info" name="submit" id="submit" /></li>
        </ul>
    </fieldset>
</form>

<?php
//clear the error message
$_SESSION["errorMessage"] = "";
?>

<script type="text/javascript">
	document.getElementById("shipperID").focus();
</script>
</body>
</html>
