<?php
session_start();

if(empty($_SESSION["login"]))
	header("Location:index.php");

echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 


include("includes/openDbConn.php");

$sql = "SELECT UserID, Password, Email FROM Users_356Lab07 WHERE UserID='".$_SESSION["login"]."'";

$result = mysql_query($sql);

if(empty($result))
	$num_records = 0;
else
	$num_records = mysql_num_rows($result);
	
if ($num_records !=0)
{
	$rows = mysql_fetch_array($result);
	$passwd = $row["Password"];
	$email = $row ["Email"];
	$Email = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, "go356phpEncryption", $email, MCRYPT_MODE_CFB, $_SESSION["iv"]);
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Lab 07 - Success</title>
	<meta charset="utf-8" />
</head>

<body>
<h1 style="font-size:14pt; text-indent:360px;">Lab 07 - Success</h1>
<p>You have been successfully logged in!</p>
<p>Your password that you encrypted via md5() is <span style="font-weight:bold;"><?php echo $passwd; ?></span> and cannot be decrypted.</p> 
<p>Your email address that you encrypted using mcrypt_encrypt() is <span style="font-weight:bold;"><?php echo $Email ?></span> and was decrypted using mcrypt_decrypt().</p>
<p><a href="index.php">Login again</a></p>
</body>
</html>