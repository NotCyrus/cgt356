<?php
//Use session object
session_start();

//open db connection
include("includes/openDbConn.php");

//get data from form
$AddressID 		= $_SESSION['AddID'];
$UserName		= addslashes($_POST["login"]);
$Name		= addslashes($_POST["name"]);
$Address1		= addslashes($_POST["address1"]);
$Address2		= addslashes($_POST["address2"]);
$City		= addslashes($_POST["city"]);
$State		= addslashes($_POST["state"]);
$Zip		= addslashes($_POST["zip"]);

if(empty($AddressID))
{
	header("Location: selectShip.php");
}
//Prepare sql statement
$sql = "UPDATE shippingaddress SET Login='".$UserName."', Name='".$Name."', Address1='".$Address1."', Address2='".$Address2."', City='".$City."', State='".$State."', Zip='".$Zip."' WHERE AddressID=".$AddressID;

$result = mysql_query($sql);

//close DB connection
include("includes/closeDbConn.php");
header("Location: selectShip.php");
?>