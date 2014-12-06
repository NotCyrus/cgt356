var request = false;

try
{
	request = new XMLHttpRequest();
}
catch(error1)
{
	try
	{
		request = new ActiveXObject("Msxm12/XMLHP");
	}
	catch(error2)
	{
		try
		{
			request = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(error3)
		{
			request = false;
		}
	}
}

if (!request)
	alert("Error initializing XMLHttpRequest!");



function updateUsernameAvailability(status)
{
	var txt = document.getElementById("usernameAvailability");
	document.getElementById("usernameAvailability").style.display = "block";
	
	switch (status)
	{
		case "available":
			txt.innerHTML = "The username you entered is available.";
			document.getElementById("usernameAvailability").style.color = "#6666ff";
			break;
		case "not available":
			txt.innerHTML = "The username you entered is already in use. Please try another username.";
			document.getElementById("usernameAvailability").style.color = "#ff0000";
			break;
		case "blank":
			txt.innerHTML = "";
			break;
		default:
			txt.innerHTML = "Checking...";
			break;
	}
}



function determineUsernameAvailability()
{
	if (request.readyState == 4)
	{
		if (request.status ==200)
		{
			var response = request.responseText;
			if (response =="available")
				updateUsernameAvailability("available");
			else
				updateUsernameAvailability("not available");
		}
		else
			alert("Debug: status is " + request.status);
	}
}



function checkUsernameAvailability()
{
	var username = document.getElementById("UserID").value;
	var url      = "checkUserID.php?mode=ask&username=" + escape(username);
	
	if (username.length > 0)
	{
		updateUsernameAvailability("null");
		request.open("GET", url, true);
		request.onreadystatechange = determineUsernameAvailability;
		request.send(null);
	}
	else 
		updateUsernameAvailability("blank");
}
	




























