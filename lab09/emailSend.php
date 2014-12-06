<?php
session_start();

///////////////////////////////////////////////////////////////////////
// Complete the rest of this file.
// 1) Set the properties using the data submitted from the form.
// 2) After all of the properties have been set, Send the mail message.
// 3) Finally, redirect to the next page
///////////////////////////////////////////////////////////////////////

$_SESSION["errorMessage"] = "";
$error = false;

//Get Form Data - Get the To field, sanitize, and validate
if(!empty($_POST["ToField"]))
{
	$toField = $_POST["ToField"];
	//remove all illegal email characters
	$toSanitized = filter_var($toField, FILTER_SANITIZE_EMAIL);
	//validate email address
	if(!filter_var($toSanitized, FILTER_VALIDATE_EMAIL))
	{
		//email is not valid
		$error=true;
	}
}
else
{
	$error=true;
}

//Get the from field, sanitize, and validate
if(!empty($_POST["FromField"]))
{
	$fromField = $_POST["FromField"];
	//remove all illegal email characters
	$fromSanitized = filter_var($fromField, FILTER_SANITIZE_EMAIL);
	//validate email address
	if(!filter_var($fromSanitized, FILTER_VALIDATE_EMAIL))
	{
		//email is not valid
		$error=true;
	}
}
else
{
	$error=true;
}



//Get the subject
if(!empty($_POST["Subject"]))
	$subject   = $_POST["Subject"];
else
	$error = true;

//Get the message body
if(!empty($_POST["Body"]))
	$body      = $_POST["Body"];
else
	$error = true;

//Redirect based on whether there was an error
if($error)
{
	//set error message
	$_SESSION["errorMessage"] = "There was an error sending your mail";
	//redirect to Email page and display error
	header("Location: email.php");
	exit;
}
else
{
	//set the fields and send the email, then redirect to email confirmation page
	$headers = "From: ".$fromField;
	if(!mail($toField, $subject, $body, $headers))
		echo "There was an error sending your email.";
	header("Location: emailConfirm.php");
	exit;
}

?>
