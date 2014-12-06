<?php
//Use session object
session_start();

//open db connection
include("includes/openDbConn.php");

//get data from form
$BillingID 		= $_SESSION['BillID'];
$UserName		= addslashes($_POST["login"]);
$BillName		= addslashes($_POST["billName"]);
$BillAddress1		= addslashes($_POST["billAddress1"]);
$BillAddress2		= addslashes($_POST["billAddress2"]);
$BillCity		= addslashes($_POST["billCity"]);
$BillState		= addslashes($_POST["billState"]);
$BillZip		= addslashes($_POST["billZip"]);
$CardType		= addslashes($_POST["cardType"]);
$CardNumber		= addslashes($_POST["cardNumber"]);
$ExpDate		= addslashes($_POST["expDate"]);
if(empty($BillingID))
{
	header("Location: select.php");
}
//Prepare sql statement
$sql = "UPDATE billinginfo SET Login='".$UserName."', BillName='".$BillName."', BillAddress1='".$BillAddress1."', BillAddress2='".$BillAddress2."', BillCity='".$BillCity."', BillState='".$BillState."', BillZip='".$BillZip."', CardType='".$CardType."', CardNumber='".$CardNumber."', ExpDate='".$ExpDate."' WHERE BillingID=".$BillingID;

$result = mysql_query($sql);

//close DB connection
include("includes/closeDbConn.php");
header("Location: select.php");
?>