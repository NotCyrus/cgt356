<?php

session_start();
$_SESSION["authenticated"] = "false";
$_SESSION["username"] = "";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <title>Facebook Twitter Bitly API Example App</title>
        <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    </head>
    
    <body>
    	<h1>Facebook API = Bit.ly API + Twitter API Example</h1>
        <p><fb:login-button autologoutlink="true"></fb:login-button></p>
        <p><fb:like></fb:like></p>
        
        <div id="fb-root"></div>
        <script>
			window.fbAsyncInit = function(){
				FBinit({appID: '480854198682062', status: true, cookie: true, xfbml: true});
			};
			(function() {
				var e = document.createElement('script');
				e.type = 'text/javascript';
				e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
				e.async = true;
				document.getElementById('fb-root').appendChild(e);
			}());
			</script>
            <a href="send2twitter.php">Login again</a>
    </body>
</html>