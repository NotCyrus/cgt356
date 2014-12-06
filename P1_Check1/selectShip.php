<?php
session_start();
if(!$_SESSION['loggedIn'])
{
	$_SESSION["loginError"] = "Please Login First";
	header("Location: login.php");
}

include("includes/openDbConn.php");
//validates as HTML5
echo("<?xml version=\"1.0\" encoding=\UTF-8\"?>");
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css.css">
<meta charset="utf-8">
<title>Shipping Information</title>
</head>

<body>

<?php
	//Prepare SQL Statement
	$sql = "SELECT AddressID, Name, Address1, Address2, City, State, Zip FROM shippingaddress WHERE Login='".$_SESSION['userName']."'";
	
	//execute the SQL query and store the results of the execution into $result
	$result = mysql_query($sql);
	
	//Check to see if there are records in the result, if not set the nubmer of results to 0
	if(empty($result))
		$num_results = 0;
	else
		$num_results = mysql_num_rows($result);
?>
	<div class="loggedIn">
<?php
	include("includes/loggedIn.php");
?>
    </div>
<?php
	include("includes/menu.php");
?>

<div class="billingTable">
<a href="insertShip.php">Insert new shipping info</a>
<table style="border:0px; width:500px; padding:0px; margin:0px auto; border-spacing:0px" title="Listing of Shipping Addresses">
	<thead>
    	<tr>
        	<th colspan="9" style="font-weight:bold; background-color:#b1946c; text-align:center; text-decoration:underline;">Shipping Adresses</th>
        </tr>
        <tr>
        	<th style="background-color:#b1946c; font-weight:bold"> </th>
            <th style="background-color:#b1946c; font-weight:bold"> </th>
        	<th style="background-color:#b1946c; font-weight:bold">Address ID</th>
            <th style="background-color:#b1946c; font-weight:bold">Name</th>
            <th style="background-color:#b1946c; font-weight:bold">Address1</th>
            <th style="background-color:#b1946c; font-weight:bold">Address2</th>
            <th style="background-color:#b1946c; font-weight:bold">City</th>
            <th style="background-color:#b1946c; font-weight:bold">State</th>
            <th style="background-color:#b1946c; font-weight:bold">Zip</th>

        </tr>
     </thead>
     <tfoot>
     	<tr>
        	<td colspan="4" style="text-align:center; font-style:italic;"></td>
        </tr>   
     </tfoot>
     <tbody>
     	<?php
		//loop through the results
		for($i=0; $i <$num_results; $i++)
		{
			//store a single record into $row
			$row = mysql_fetch_array($result);
			
			//trim data pulled from DB
		?>
            <tr>
            	<td style="border-right:1px solid #000000;"><a href="updateShip.php/?AddressID=<?php echo trim($row["AddressID"]); ?>"> Update  </a></td>
                <td style="border-right:1px solid #000000;"><a href="deleteShip.php/?AddressID=<?php echo trim($row["AddressID"]); ?>"> Delete  </a></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["AddressID"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["Name"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["Address1"]); ?></td>
            	<td style="border-right:1px solid #000000;"><?php echo trim($row["Address2"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["City"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["State"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["Zip"]); ?></td>
           
            </tr>
            <?php
		}
		?>
     </tbody>
</table>
</div>
<?php

mysql_free_result($result);
include("includes/closeDbConn.php");
?>
</body>
</html>
