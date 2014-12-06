<?php
session_start();
$login = $_POST["userID"];
$passwd = $_POST["pass"];
$passCheck = $_POST["passCheck"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$newsletter = $_POST["news"];
// Connect to MySQL from PHP
// You can use either of these code segments BUT NOT both at the same time
// Both of these segments below perform the same task in different manners
// One of the segments is commented out in this example using 

// NOTICE: the use of mysql_ as a prefix (as opposed to mssql or others)

///////////////////////////////////////////////
///////////////////////////////////////////////
// Open DB connection and select DB to use
// The '@' bypasses the usual PHP error handling, so you get to deal with a 
// failure return from pconnect yourself in the if statement below.
// If you leave off the '@' then any errors will automatically be thrown
@ $db = mysql_pconnect("localhost", "cgt356web1e", "Snausage1e870");
mysql_select_db("cgt356web1e") or die(mysql_error());

// check to see if connection was successful
if(!$db)
{
	echo "Error: Could not connect to database.  Please try again later.";
	exit;
}

//Create the SQL query
$sql = "SELECT Login FROM p1user"; 
//"INSERT INTO p1user VALUES ($login, $passwd, $firstName, $lastName, $email, $newsletter)";

//execute the SQL query and store the result of the execution into $result
//in some cases, it might be helpful to replace the following line with this line:
// mysql_query($sql) or die(mysql_error());

$result      = mysql_query($sql);

//Check to see if there are records in the result, if not set the number of results = 0
if(empty($result))
{
	$num_results = 0;

}
else
	$num_results = mysql_num_rows($result);

//Loop through the results
for($i=0; $i < $num_results; $i++)
{
	//store a single record into $row 
	//$row in this example is equivalent to oRS in ASP
	$row = mysql_fetch_array($result);
	

	//echo out the value of the column (field) pulled from the database
	if($login==$row["Login"] || empty($login) || empty($passwd) || empty($passCheck) || empty($firstName) || empty($lastName) || empty($email) || empty($newsletter) || !($passwd==$passCheck))
	{
		$_SESSION['registerFail'] = 'Registration Failed';
		header("Location:register.php");
	}

	else
	{
	mysql_query("INSERT INTO p1user VALUES ('$login', '$firstName', '$lastName', '$passwd', '$email', '$newsletter')");	
	$_SESSION['loginError'] = 'Successfully Registered! Please log in to review your information.';
	header("Location:login.php");
	}


}
//Close the database connection
mysql_close($db); 


//if(($userID=="page1") && ($pass=="alpha"))
//	header("Location:index.php");
//else
//	header("Location:error.php");
?>