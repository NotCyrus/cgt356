<?php
//Use session object
session_start();

//open db connection
include("includes/openDbConn.php");

//get data from form
$ShipperID 		= $_POST["shipperID"];
$CompanyName	= addslashes($_POST["companyName"]);
$Phone 			= addslashes($_POST["phone"]);

if(empty($ShipperID))
	header("Location: select.php");
	
//Prepare sql statement
$sql = "UPDATE ShippersLab5 SET CompanyName='".$CompanyName."', Phone='".$Phone."' WHERE ShipperID=".$ShipperID;

$result = mysql_query($sql);

//close DB connection
include("includes/closeDbConn.php");

header("Location: select.php");
?>