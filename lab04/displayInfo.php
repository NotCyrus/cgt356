<?php
session_start();
//keep people from navigating right to this page
//only way to get here is to post from the index.php form
//check to see if the user put in a "name" on the index.php form
//if not, back to index.php
if(empty($_SESSION["name"]))
{
	header("Location:index.php");
}
//if we are on this page, clear the error message
$_SESSION["errorMessage"]="";
//use session variables to write out the data
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
	<title>Lab 04 Display Info Page</title>
	<style type="text/css">
		ul{list-style:none; margin-top:5px;}
		ul li{display:block; float:left; width:100%; height:1#}
		ul li label{float:left; padding:7px; color:#6666ff;}
		ul li input, ul li textarea{float:right; margin-right:10px; border:1px solid #ccc; padding:3px; font-family: Georgia, "Times New Roman", Times, serif; width:60%;}
		li input:focus, li textarea:focus{ border:1px solid #666;}
		fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
		legend {color:#000099;}
		label span{ color:#ff0000;}
		fieldset#billing {position:absolute; top:60px; left:20px;}
		fieldset#shipping {position:absolute; top:60px; left:460px;}
		div#nav {width:400px; position:absolute; top:330px; left:200px;}
		div span#nav1 {float:left;}
		div span#nav2 {float:right;}
		</style>
</head>

<body>
<h1 style="font-size:14pt; text-indent:360px;">Lab 04 Display Info Page</h1>
<form id="form0" action="getFormData.php" method="post">
	<fieldset id="billing">
    	<legend>Billing Information</legend>
        <ul>
        	<li><span><?php echo($_SESSION["name"]); ?></span></li>
            <li><span><?php echo($_SESSION["address"]); ?></span></li>
            <li><span><?php echo($_SESSION["city"]); ?></span></li>
            <li><span><?php echo($_SESSION["country"]); ?></span></li>
            <li><span><?php echo($_SESSION["phone"]); ?></span></li>
            <li><span><?php echo($_SESSION["email"]); ?></span></li>
            <li><span><br />Comments:<br /><?php echo($_SESSION["comments"]); ?></span></li>
    </fieldset> 
    <fieldset id="shipping">
    	<legend>Shipping Information (if different from billing)</legend>
        <ul>
        	<li><span><?php echo($_SESSION["Sname"]); ?></span></li>
            <li><span><?php echo($_SESSION["Saddress"]); ?></span></li>
            <li><span><?php echo($_SESSION["Scity"]); ?>, <?php echo($_SESSION["Sstate"]); ?> <?php echo($_SESSION["Szip"]); ?></span></li>
            <li><span><?php echo($_SESSION["Scountry"]); ?></span></li>
        </ul>
    </fieldset> 
</form>

<div id="nav"><span id="nav1"><a href="index.php">Continue Updating</a></span><span id="nav2"><a href="finishedUpdate.php">Finished Updating</a></span></div>
     
</body>
</html>