<?php
//Use session object
session_start();

//get data from form
$BillingID 		=$_POST["billingID"];
$Login 			=$_POST["login"];
$BillName 		= addslashes($_POST["billName"]);
$BillAddress1	= addslashes($_POST["billAddress1"]);
$BillAddress2	= addslashes($_POST["billAddress2"]);
$BillCity 		= addslashes($_POST["billCity"]);
$BillState		= addslashes($_POST["billState"]);
$BillZip		= addslashes($_POST["billZip"]);
$CardType 		= addslashes($_POST["cardType"]);
$CardNumber 	= addslashes($_POST["cardNumber"]);
$ExpDate		= addslashes($_POST["expDate"]);

if(($BillName=="") || ($BillAddress1=="") || ($BillAddress2=="") || ($BillCity=="") || ($BillState=="" || ($BillZip=="") || ($CardType=="") || ($CardNumber=="") || ($ExpDate=="")))
{	//check for empty form values
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insert.php");
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
$sql = "SELECT BillingID FROM billinginfo WHERE BillingID=".$BillingID;

$result = mysql_query($sql);

//check for results
if(empty($result))
	$num_results = 0;
else
	$num_results = mysql_num_rows($result);

//check to see if billingID from form is already in DB
if($num_results != 0)
{
	$_SESSION["errorMessage"] = "The BillingID you entered already exists!";
	header("Location: insert.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

//prepare next sql statement
$sql = "INSERT INTO billinginfo VALUES(".$BillingID.", '".$Login."', '".$BillName."', '".$BillAddress1."', '".$BillAddress2."', '".$BillCity."', '".$BillState."', '".$BillZip."', '".$CardType."', '".$CardNumber."', '".$ExpDate."')";

//execute sql query and store results
$result = mysql_query($sql);

//close DB connection
include("includes/closeDbConn.php");

header("Location: select.php");
exit;
?>