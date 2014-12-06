<?php
session_start();

include("includes/openDbConn.php");

$userID   = $_POST["UserID"];
$password = md5($_POST["Passwd"]);

$sql = "SELECT * FROM Users_356Lab07 WHERE UserID='".$userID."' AND Password='".$password."'";

$result = mysql_query($sql);

if(empty($result))
{
	$num_records = 0;
}
else
{
	$num_records = mysql_num_rows($result);
}

include("includes/closeDbConn.php");

if($num_records == 1)
{
	CleanUp();
	$_SESSION["errorMessage"] = "";
	$_SESSION["login"] = $userID;
	header("Location:success.php");
	exit;
}
else
{
	CleanUp();
	$_SESSION["errorMessage"] = "Either your login or password is incorrect.";
	header("Location:index.php");
	exit;
}

function CleanUp()
{
	$userID      = "";
	$password    = "";
	$sql         = "";
	$result      = "";
	$num_records = "";
}
?>
