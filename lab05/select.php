<?php
session_start();
include("includes/openDbConn.php");
//validates as HTML5
echo("<?xml version=\"1.0\" encoding=\UTF-8\"?>");
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="en">
<head>
<meta charset="utf-8">
<title>Lab 05 - Select</title>
</head>

<body>

<?php
	//Prepare SQL Statement
	$sql = "SELECT EmployeeID, LastName, FirstName, Title From EmployeesLab5";
	
	//execute the SQL query and store the results of the execution into $result
	$result = mysql_query($sql);
	
	//Check to see if there are records in the result, if not set the nubmer of results to 0
	if(empty($result))
		$num_results = 0;
	else
		$num_results = mysql_num_rows($result);
?>
<h1 style="text-align:center;">Lab 05 - Select</h1>
<?php
	include("includes/menu.php");
?>
<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 comliant <br />&nbsp;</div>
<table style="border:0px; width:500px; padding:0px; margin:0px auto; border-spacing:0px" title="Listing of Employees">
	<thead>
    	<tr>
        	<th colspan="4" style="font-weight:bold; background-color:#b1946c; text-align:center; text-decoration:underline;">EmployeesLab5 Table</th>
        </tr>
        <tr>
        	<th style="background-color:#b1946c; font-weight:bold">EmployeeID</th>
            <th style="background-color:#b1946c; font-weight:bold">LastName</th>
            <th style="background-color:#b1946c; font-weight:bold">FirstName</th>
            <th style="background-color:#b1946c; font-weight:bold">Title</th>
        </tr>
     </thead>
     <tfoot>
     	<tr>
        	<td colspan="4" style="text-align:center; font-style:italic;">Information pulled from the northwind database</td>
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
            	<td style="border-right:1px solid #000000;"><?php echo trim($row["EmployeeID"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["LastName"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["FirstName"]); ?></td>
                <td><?php echo trim($row["Title"]); ?></td>
            </tr>
            <?php
		}
		?>
     </tbody>
</table>

<p>&nbsp;</p>

<?php
	//Prepare SQL Statement
	$sql = "SELECT ShipperID, CompanyName, Phone From ShippersLab5";
	
	//execute the SQL query and store the results of the execution into $result
	$result = mysql_query($sql);
	
	//Check to see if there are records in the result, if not set the nubmer of results to 0
	if(empty($result))
		$num_results = 0;
	else
		$num_results = mysql_num_rows($result);
?>


<table style="border:0px; width:500px; padding:0px; margin:0px auto; border-spacing:0px" title="Listing of Shippers">
	<thead>
    	<tr>
        	<th colspan="3" style="font-weight:bold; background-color:#b1946c; text-align:center; text-decoration:underline;">EmployeesLab5 Table</th>
        </tr>
        <tr>
        	<th style="background-color:#b1946c; font-weight:bold">ShipperID</th>
            <th style="background-color:#b1946c; font-weight:bold">CompanyName</th>
            <th style="background-color:#b1946c; font-weight:bold">Phone</th>
        </tr>
     </thead>
     <tfoot>
     	<tr>
        	<td colspan="3" style="text-align:center; font-style:italic;">Information pulled from the northwind database</td>
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
            	<td style="border-right:1px solid #000000;"><?php echo trim($row["ShipperID"]); ?></td>
                <td style="border-right:1px solid #000000;"><?php echo trim($row["CompanyName"]); ?></td>
                <td><?php echo trim($row["Phone"]); ?></td>
            </tr>
            <?php
		}
		?>
     </tbody>
</table>
<?php
mysql_free_result($result);
include("includes/closeDbConn.php");
?>
</body>
</html>
