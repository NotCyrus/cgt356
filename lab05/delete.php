<?php
//Use session object
session_start();

//open db connection
include("includes/openDbConn.php");
	
//Prepare sql statement
$sql = "DELETE FROM ShippersLab5 WHERE ShipperID=2";

$result = mysql_query($sql);

//close DB connection
include("includes/closeDbConn.php");

header("Location: select.php");
?>