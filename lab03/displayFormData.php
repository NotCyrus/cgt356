<?php
//keep people from navigating right to this page
//only way to get here is to post from the index.php form
//check to see if the user put in a "name" on the index.php form
//if not, back to index.php
if(empty($_POST["name"]))
{
	header("Location:index.php");
}

//Autopopulate form values from the post values
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
	<title>Lab 03 Index Page</title>
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
		fieldset#submit {position:absolute; top:540px; left:20px; width:840px; text-align:center}
		fieldset input#SubmitBtn {background:#E5E5E5; color:@000099; border:1px solid #ccc; padding:5px; width:150px;}
		</style>
</head>

<body>
<h1 style="font-size:14pt; text-indent:360px;">Lab 03 Index Page</h1>
<form id="form0" action="getFormData.php" method="post">
	<fieldset id="billing">
    	<legend>Billing Information</legend>
        <ul>
        	<li><span><?php echo($_POST["name"]); ?></span></li>
            <li><span><?php echo($_POST["address"]); ?></span></li>
            <li><span><?php echo($_POST["city"]); ?></span></li>
            <li><span><?php echo($_POST["country"]); ?></span></li>
            <li><span><?php echo($_POST["phone"]); ?></span></li>
            <li><span><?php echo($_POST["email"]); ?></span></li>
            <li><span><br />Comments:<br /><?php echo($_POST["comments"]); ?></span></li>
    </fieldset> 
    <fieldset id="shipping">
    	<legend>Shipping Information (if different from billing)</legend>
        <ul>
        	<li><span><?php echo($_POST["Sname"]); ?></span></li>
            <li><span><?php echo($_POST["Saddress"]); ?></span></li>
            <li><span><?php echo($_POST["Scity"]); ?>, <?php echo($_POST["Sstate"]); ?> <?php echo($_POST["Szip"]); ?></span></li>
            <li><span><?php echo($_POST["Scountry"]); ?></span></li>
        </ul>
    </fieldset> 
</form>
      
</body>
</html>