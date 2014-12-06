<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css.css">
<title>Project 2 - Super Admin</title>
</head>
<header style="background-color:#000; color:#FFF; text-align:left; font-size:36pt; font-family:Georgia, 'Times New Roman', Times, serif">
<img src="purduelogo.jpg" alt="Purdue signature" title="" height="39" width="120" border="0" id="purdue-signature">
	<span style="float:right; font-size:18px">
		<a href="logout.php">Log out</a>
   	</span> <br />
<span style="font-size:24px; font-family:Arial, Helvetica, sans-serif">
Image Gallery
</span>
</header>

<body>
<div id="container">
	<div class="loggedIn">
    </div>
   
  <?php
  	session_start();
  	if(!$_SESSION['superAdmin'])
  		{header("Location:login.php");}
  	include("includes/menu.php");
  ?>
    	<form id="registerCatAdmin" action="createCatAdmin.php" method="post">
        	<ul id="registerList">
            	<li><p><?php if(!empty($_SESSION['registerFail'])){echo($_SESSION['registerFail']);} ?></p></li>
           	 	<li><p><input type="text" name="userID" id="userID" size="30" maxlength="30" placeholder="Desired Login" /></p></li>
				<li><p><input type="password" placeholder="Password" name="pass"  id="pass" size="30" maxlength="30"/></p></li>
                <li><p><input type="password" placeholder="Repeat Password" name="passCheck"  id="passCheck" size="30" maxlength="30"/></p></li>
				<li><p><input type="text" name="catName" id="catName" size="20" maxlength="20" /></p></li>               
            	<li><p><input id="regButton" type="submit" value="Create Category Admin" /></p></li>  
        	</ul>
   		</form>  
        <form id="addCategory" action="addCategory.php" method="post">
        	<ul id="registerList">
            	<li><p><?php if(!empty($_SESSION['catAddFail'])){echo($_SESSION['catAddFail']);} ?></p></li>
           	 	<li><p><input type="text" name="catName" id="catName" size="20" maxlength="20" placeholder="Create New Category" /></p></li>          
            	<li><p><input id="regButton" type="submit" value="Create Category" /></p></li>  
        	</ul>

</div>

<script type="text/javascript">
	document.getElementById("userID").focus();
</script>

</body>
</html>