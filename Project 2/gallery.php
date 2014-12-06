<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
    <meta charset="utf-8" />
	<title>Purdue Image Gallery</title>

    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>
    
	<style type="text/css">
		div#r1c1 {width:150px; height:150px; position:absolute; top:80px; left:100px; border:1px solid #ccc;}
		div#r1c2 {width:150px; height:150px; position:absolute; top:80px; left:260px; border:1px solid #ccc;}
		div#r2c1 {width:150px; height:150px; position:absolute; top:240px; left:100px; border:1px solid #ccc;}
		div#r2c2 {width:150px; height:150px; position:absolute; top:240px; left:260px; border:1px solid #ccc;}
		div#r3c1 {width:150px; height:150px; position:absolute; top:400px; left:100px; border:1px solid #ccc;}
		div#r3c2 {width:150px; height:150px; position:absolute; top:400px; left:260px; border:1px solid #ccc;}
		div#nav {position:absolute; top:55px; left:100px; width:310px;}
		div#cats {float:right;}
		div select {float:right;}
		div div {float:left;}
		img {border:0px;}
		span {text-decoration:underline; color:#00C; cursor:pointer;}
		h1 {text-align:center; width:480px; font-size:14pt; margin:5px; padding:5px;}
	</style>
</head>

<body>
<h1>Purdue Image Gallery</h1>

<div id="nav">
	<div id="pagination"></div>
	<div id="cats">
	  <form id="form0">
	  <label id="categories" for="catDropDown"></label>
	  <select onChange="javascript:getCategory()" id="catDropDown" name="catDropDown">
	    <option value="-" selected="selected">Select a Category</option>
		<?php
			session_start();
			@ $db = mysql_pconnect("localhost", "cgt356web1e", "Snausage1e870");
			mysql_select_db("cgt356web1e") or die(mysql_error());
			
			// check to see if connection was successful
			if(!$db)
			{
				echo "Error: Could not connect to database.  Please try again later.";
				exit;
			}
			
			//Create the SQL query
			$sql = "SELECT CategoryName FROM Category"; 
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
				$row = mysql_fetch_array($result);
				echo ("<option value=\"" .$row["CategoryName"]."\" >" . $row["CategoryName"] ."</option>");
			}
			//Close the database connection
			mysql_close($db); 

?>
	    </select>
	  </form>
  </div>
</div>

<div id="r1c1"></div>
<div id="r1c2"></div>
<div id="r2c1"></div>
<div id="r2c2"></div>
<div id="r3c1"></div>
<div id="r3c2"></div>


<script type="text/javascript"><!--
	//load these from the db on page load
	//use PHP to dynamically create these arrays. Hint:for loop - pull image name from db
	var bellTowerArray = new Array();
	bellTowerArray[0] = "bellTower01.jpg";
	bellTowerArray[1] = "bellTower02.jpg";
	bellTowerArray[2] = "bellTower03.jpg";
	bellTowerArray[3] = "bellTower04.jpg";
	bellTowerArray[4] = "bellTower05.jpg";
	bellTowerArray[5] = "bellTower06.jpg";
	bellTowerArray[6] = "bellTower07.jpg";
	bellTowerArray[7] = "bellTower08.jpg";
	bellTowerArray[8] = "bellTower09.jpg";
	bellTowerArray[9] = "bellTower10.jpg";
	bellTowerArray[10] = "bellTower11.jpg";
	bellTowerArray[11] = "bellTower12.jpg";
	bellTowerArray[12] = "bellTower13.jpg";
	bellTowerArray[13] = "bellTower14.jpg";
	bellTowerArray[14] = "bellTower15.jpg";
	bellTowerArray[15] = "bellTower16.jpg";
	
	var fountainArray = new Array();
	fountainArray[0] = "fountain01.jpg";
	fountainArray[1] = "fountain02.jpg";
	fountainArray[2] = "fountain03.jpg";
	fountainArray[3] = "fountain04.jpg";
	fountainArray[4] = "fountain05.jpg";
	fountainArray[5] = "fountain06.jpg";
	fountainArray[6] = "fountain07.jpg";
	fountainArray[7] = "fountain08.jpg";
	fountainArray[8] = "fountain09.jpg";
	fountainArray[9] = "fountain10.jpg";
	fountainArray[10] = "fountain11.jpg";
	fountainArray[11] = "fountain12.jpg";
	fountainArray[12] = "fountain13.jpg";
	fountainArray[13] = "fountain14.jpg";
	fountainArray[14] = "fountain15.jpg";
	fountainArray[15] = "fountain16.jpg";
	fountainArray[16] = "fountain17.jpg";
	fountainArray[17] = "fountain18.jpg";
	
	///////////////////////////////////////////
	//function getCategory
	//when the category drop down box is changed, this event is called
	//this function checks to see what <option> is selected, then stores the corresponding array into our currArray
	//displays the images and performs pagination
	///////////////////////////////////////////////////////////////////
	function getCategory()
	{
		if(document.getElementById("catDropDown").selectedIndex ==1)
			currArray = bellTowerArray;
		else if(document.getElementById("catDropDown").selectedIndex ==2)
			currArray = fountainArray;
			
		if(document.getElementById("catDropDown").selectedIndex > 0)
		{
			displayImages(0);
			doPagination();
		}
	}//end getCategory
	
	
	//displayImages(start)
	
	function displayImages(start)
	{
		if(!(start > currArray.length-1))
			document.getElementById("r1c1").innerHTML = "<a id=\"r1c1_a\" href=\"images/" + currArray[start] +"\" rel=\"lightbox\" title=\"This is where your description goes\"><img src=\"images/thumb_" + currArray[start] + "\" id=\"r1c1_img\" width=\"150\" height=\"150\" alt=\"This is where your description goes\" title=\"This is where your description goes\" /><"+"/a>";
		else
			document.getElementById("r1c1").innerHTML="";
			
			
		if(!(start+1 > currArray.length-1))
			document.getElementById("r1c2").innerHTML = "<a id=\"r1c2_a\" href=\"images/" + currArray[start+1] +"\" rel=\"lightbox\" title=\"This is where your description goes\"><img src=\"images/thumb_" + currArray[start+1] + "\" id=\"r1c2_img\" width=\"150\" height=\"150\" alt=\"This is where your description goes\" title=\"This is where your description goes\" /><"+"/a>";
		else
			document.getElementById("r1c2").innerHTML="";
			
			
		if(!(start+2 > currArray.length-1))
			document.getElementById("r2c1").innerHTML = "<a id=\"r2c1_a\" href=\"images/" + currArray[start+2] +"\" rel=\"lightbox\" title=\"This is where your description goes\"><img src=\"images/thumb_" + currArray[start+2] + "\" id=\"r2c1_img\" width=\"150\" height=\"150\" alt=\"This is where your description goes\" title=\"This is where your description goes\" /><"+"/a>";
		else
			document.getElementById("r2c1").innerHTML="";
			
			
		if(!(start+3 > currArray.length-1))
			document.getElementById("r2c2").innerHTML = "<a id=\"r2c2_a\" href=\"images/" + currArray[start+3] +"\" rel=\"lightbox\" title=\"This is where your description goes\"><img src=\"images/thumb_" + currArray[start+3] + "\" id=\"r2c2_img\" width=\"150\" height=\"150\" alt=\"This is where your description goes\" title=\"This is where your description goes\" /><"+"/a>";
		else
			document.getElementById("r2c2").innerHTML="";
		
		
		if(!(start+4 > currArray.length-1))
			document.getElementById("r3c1").innerHTML = "<a id=\"r3c1_a\" href=\"images/" + currArray[start+4] +"\" rel=\"lightbox\" title=\"This is where your description goes\"><img src=\"images/thumb_" + currArray[start+4] + "\" id=\"r3c1_img\" width=\"150\" height=\"150\" alt=\"This is where your description goes\" title=\"This is where your description goes\" /><"+"/a>";
		else
			document.getElementById("r3c1").innerHTML="";
			
			
		if(!(start+5 > currArray.length-1))
			document.getElementById("r3c2").innerHTML = "<a id=\"r3c2_a\" href=\"images/" + currArray[start+5] +"\" rel=\"lightbox\" title=\"This is where your description goes\"><img src=\"images/thumb_" + currArray[start+5] + "\" id=\"r3c2_img\" width=\"150\" height=\"150\" alt=\"This is where your description goes\" title=\"This is where your description goes\" /><"+"/a>";
		else
			document.getElementById("r3c2").innerHTML="";			
	}//end displayImages(start)
	
	
	//function doPagination creates hyperlinked page numbers
	
	function doPagination()
	{
		var numpages = (currArray.length /6)+1;
		var numleft =  currArray.length % 6;
		
		document.getElementById("pagination").innerHTML="";
		
		
		//loop to create pages, the span tag is providing our css from above
		for(i=0; i < numpages-1; i++)
		{
			//set the innner html of the pagination div
			document.getElementById("pagination").innerHTML +="<span onclick='displayImages("+i*6+")'>" + (i+1) +"<" + "/span> ";
		}
		
		if(numpages <=1)
			document.getElementById("pagination").innerHTML = "";
		
	}//end doPagination
	
	//on load set the drop down menu to the topmost <option>
	document.getElementById("catDropDown").selectedIndex=0;
	
--></script>

</body>
</html>
