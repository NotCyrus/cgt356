<?php
//Connect to MySQL from PHP
//Open DB connection and select DB
//if you get an error it trys to reconnect instead of throwing
@ $db = mysql_pconnect("localhost", "cgt356web1e", "Snausage1e870");
mysql_select_db("cgt356web1e");

//check to see if successfully connected
if(!$db)
{
	echo "Error: Could not connect to the database. Please try again later.";
	exit;
}
?>