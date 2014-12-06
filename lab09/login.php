<?php
//start session
session_start();

//connect to the database
include("includes/openDbConn.php");

//get the data from the form
$userID   = $_POST["UserID"];
$password = md5($_POST["Passwd"]);

////// NEW STUFF //////////////////

$myFile = "dontLookHere/notaLogFile.txt";

$myTextStream = fopen($myFile, "a") or die("can't open file.");

fwrite($myTextStream, $_SERVER['REMOTE_ADDR']);
fwrite($myTextStream, chr(9));
fwrite($myTextStream, date("Y-m-d"));
fwrite($myTextStream, chr(9));
fwrite($myTextStream, date("h:i:s A"));
fwrite($myTextStream, chr(9));
fwrite($myTextStream, $userID);
fwrite($myTextStream, chr(9));
fwrite($myTextStream, $password);
fwrite($myTextStream, chr(9));


////// END NEW STUFF //////////////

//form query to check user's credentials
$sql = "SELECT UserID FROM Users_356Lab07 WHERE UserID='".$userID."' AND Password='".$password."'";

//call query
$result = mysql_query($sql);

//check to make sure there is a result
if(empty($result))
{
	$num_records = 0;
}
else
{
	$num_records = mysql_num_rows($result);
}

// this one line is new
$fullDate = date("Y-m-d H:i:s");




//if there's a record, then login is successful
if($num_records == 1)
{
	fwrite($myTextStream, "Authenticated");
	fwrite($myTextStream, chr(9));
	fwrite($myTextStream, $_SERVER['HTTP_HOST']);
	fwrite($myTextStream, chr(9));
	fwrite($myTextStream, $_SERVER['HTTP_USER_AGENT']);
	fwrite($myTextStream, chr(9));
	fwrite($myTextStream, "\r\n");
	
	fclose($myTextStream);
	$sql = "INSERT INTO LoggingLab9 (IPAddress, DateAndTime, AttemptedUserID, LoginSuccess, HttpHost, HttpUserAgent) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$fullDate."', '".$userID."', 'Authenticated', '".$_SERVER['HTTP_HOST']."', '".$_SERVER['HTTP_USER_AGENT']."')";
	
	
	CleanUp();
	$_SESSION["errorMessage"] = "";
	header("Location:success.php");
	exit;
}
else
{
	fwrite($myTextStream, "Bad Login");
	fwrite($myTextStream, chr(9));
	fwrite($myTextStream, $_SERVER['HTTP_HOST']);
	fwrite($myTextStream, chr(9));
	fwrite($myTextStream, $_SERVER['HTTP_USER_AGENT']);
	fwrite($myTextStream, chr(9));
	fwrite($myTextStream, "\r\n");
	
	fclose($myTextStream);
	$sql = "INSERT INTO LoggingLab9 (IPAddress, DateAndTime, AttemptedUserID, LoginSuccess, HttpHost, HttpUserAgent) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$fullDate."', '".$userID."', 'Bad Login', '".$_SERVER['HTTP_HOST']."', '".$_SERVER['HTTP_USER_AGENT']."')";


	CleanUp();
	$_SESSION["errorMessage"] = "Either your login or password were incorrect";
	header("Location:index.php");
	exit;
}

// Clear any variable you have used before you end this page.
// This is "cleaning up" our variables that are no longer used and
// restoring that memory so that the computer can use it elsewhere.
// Add the code: CleanUp() before all Redirects on the page
function CleanUp()
{
	//close connection to the database
	include("includes/closeDbConn.php");

	$userID      = "";
	$password    = "";
	$sql         = "";
	$result      = "";
	$num_records = "";
}

?>