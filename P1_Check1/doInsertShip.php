<?php
//Use session object
session_start();

//get data from form
$AddressID 		=$_POST["addressID"];
$Login 			=$_POST["login"];
$Name 		= addslashes($_POST["name"]);
$Address1	= addslashes($_POST["address1"]);
$Address2	= addslashes($_POST["address2"]);
$City 		= addslashes($_POST["city"]);
$State		= addslashes($_POST["state"]);
$Zip		= addslashes($_POST["zip"]);


if(($Name=="") || ($Address1=="") || ($Address2=="") || ($City=="") || ($State=="" || ($Zip=="")))
{	//check for empty form values
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insertShip.php");
	exit;
}

else
{
		//everything is fine so far
		$_SESSION["errorMessage"] = "";
}

//open db connection
include("includes/openDbConn.php");

//Prepare sql statement
$sql = "SELECT AddressID FROM shippingaddress WHERE AddressID=".$AddressID;
echo($sql);
$result = mysql_query($sql);

//check for results
if(empty($result))
	$num_results = 0;
else
	$num_results = mysql_num_rows($result);

//check to see if billingID from form is already in DB
if($num_results != 0)
{
	$_SESSION["errorMessage"] = "The AddressID you entered already exists!";
	header("Location: insertShip.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

//prepare next sql statement
$sql = "INSERT INTO shippingaddress VALUES(".$AddressID.", '".$Login."', '".$Name."', '".$Address1."', '".$Address2."', '".$City."', '".$State."', '".$Zip."')";
echo($sql);
echo("what");
//execute sql query and store results
$result = mysql_query($sql);

//close DB connection
include("includes/closeDbConn.php");

header("Location: selectShip.php");
exit;
?>