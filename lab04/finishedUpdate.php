<?php
session_start();

//clear session variables
$_SESSION["name"] =		 "";
$_SESSION["address"] = "";
$_SESSION["city"] = "";
$_SESSION["state"] = "";
$_SESSION["zip"] = "";
$_SESSION["country"] = "";
$_SESSION["phone"] = "";
$_SESSION["email"] = "";
$_SESSION["comments"] = "";
$_SESSION["Sname"] = "";
$_SESSION["Saddress"] = "";
$_SESSION["Scity"] = "";
$_SESSION["Sstate"] = "";
$_SESSION["Szip"] = "";
$_SESSION["Scountry"] = "";
$_SESSION["errorMessage"] = "";

//abandon session
session_unset();
session_destroy();




echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
	<title>Lab 04 Display Info Page</title>
</head>

<body>
<h1 style="font-size:14pt; text-indent:360px;">Lab 04 finishedUpdate Page</h1>
<p>Your information has been successfully updated in our database</p>
</body>
</html>