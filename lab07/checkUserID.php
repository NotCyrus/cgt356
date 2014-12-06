<?php
$mode = $_GET["mode"];

if($mode == "ask")
{
	$un = $_GET["username"];
	
	include("includes/openDbConn.php");
	
	$sql = "SELECT UserID FROM Users_356Lab07 WHERE UserID='".$un."'";
	
	$result = mysql_query($sql);
	
	if(empty($result))
		$num_records = 0;
	else
		$num_records = mysql_num_rows($result);
		
	include("includes/closeDbConn.php");
	
	if($num_records == 0)
		echo("available");
	else
		echo("not available");
}
?>