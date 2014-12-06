<?php

@ $db = mysql_pconnect("localhost", "cgt356web1e", "Snausage1e870");
mysql_select_db("cgt356web1e");

// check to see if connection was successful
if(!$db)
{
	echo "Error: Could not connect to database.  Please try again later.";
	exit;
}
?>