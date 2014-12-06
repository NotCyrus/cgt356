<?php
//Use session object
session_start();

//get data from form
$ShipperID 		= $_POST["shipperID"];
$CompanyName	= addslashes($_POST["companyName"]);
$Phone 			= addslashes($_POST["phone"]);

if(($ShipperID=="") || ($CompanyName=="") || ($Phone==""))
{	//check for empty form values
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insert.php");
	exit;
}
else if(!is_numeric($ShipperID))
{	//make sure shipperID is a number
	$_SESSION["errorMessage"] = "You must enter a number for ShipperID!";
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
$sql = "SELECT ShipperID FROM ShippersLab5 WHERE ShipperID=".$ShipperID;

$result = mysql_query($sql);

//check for results
if(empty($result))
	$num_results = 0;
else
	$num_results = mysql_num_rows($result);

//check to see if ShipperID from form is already in DB
if($num_results != 0)
{
	$_SESSION["errorMessage"] = "The ShipperID you entered already exists!";
	header("Location: insert.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

//prepare next sql statement
$sql = "INSERT INTO ShippersLab5(ShipperID, CompanyName, Phone) VALUES(".$ShipperID.", '".$CompanyName."', '".$Phone."')";

//execute sql query and store results
$result = mysql_query($sql);

//close DB connection
include("includes/closeDbConn.php");

header("Location: select.php");
exit;
?>