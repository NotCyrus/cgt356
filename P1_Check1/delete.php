<?php
session_start();
if(!$_SESSION['loggedIn'])
header("Location: ../login.php");
//Use session object

echo($_GET["BillingID"]);
//open db connection
include("includes/openDbConn.php");

$sql = "DELETE FROM billinginfo WHERE BillingID=".$_GET["BillingID"];

$result = mysql_query($sql);
//close DB connection
include("includes/closeDbConn.php");
header("Location: ../select.php");

?>