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
<title>Billing Information</title>
</head>

<body>

<?php
	//Prepare SQL Statement
	$sql = "SELECT BillingID, BillName, BillAddress1, BillAddress2, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate FROM billinginfo WHERE Login='".$_SESSION['userName']."'";
	
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
<a href="insert.php">Insert new billing info</a>
<table style="border:0px; width:500px; padding:0px; margin:0px auto; border-spacing:0px" title="Listing of Employees">
	<thead>
    	<tr>
        	<th colspan="12" style="font-weight:bold; background-color:#b1946c; text-align:center; text-decoration:underline;">EmployeesLab5 Table</th>
        </tr>
        <tr>
        	<th style="background-color:#b1946c; font-weight:bold"> </th>
            <th style="background-color:#b1946c; font-weight:bold"> </th>
        	<th style="background-color:#b1946c; font-weight:bold">BillingID</th>
            <th style="background-color:#b1946c; font-weight:bold">BillName</th>
            <th style="background-color:#b1946c; font-weight:bold">BillAddress1</th>
            <th style="background-color:#b1946c; font-weight:bold">BillAddress2</th>
            <th style="background-color:#b1946c; font-weight:bold">BillCity</th>
            <th style="background-color:#b1946c; font-weight:bold">BillState</th>
            <th style="background-color:#b1946c; font-weight:bold">BillZip</th>
            <th style="background-color:#b1946c; font-weight:bold">CardType</th>
            <th style="background-color:#b1946c; font-weight:bold">CardNumber</th>
            <th style="background-color:#b1946c; font-weight:bold">ExpDate</th>
        </tr>
     </thead>
     <tfoot>
     	<tr>
        	<td colspan="4" style="text-align:center; font-style:italic;">Info from billing information database</td>
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
            	<td style="border-right:1px solid #000000;"><a href="update.php/?BillingID=<?php echo trim($row["BillingID"]); ?>">Update</a></td>
                <td style="border-right:1px solid #000000;"><a href="delete.php/?BillingID=<?php echo trim($row["BillingID"]); ?>">Delete</a></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["BillingID"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["BillName"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["BillAddress1"]); ?></td>
            	<td style="border-right:1px solid #000000;"><?php echo trim($row["BillAddress2"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["BillCity"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["BillState"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["BillZip"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["CardType"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["CardNumber"]); ?></td>  
                <td style="border-right:1px solid #000000;"><?php echo trim($row["ExpDate"]); ?></td>              
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
