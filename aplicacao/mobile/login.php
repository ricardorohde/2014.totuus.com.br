<?php
	include 'soapproxy.php';
	
	// Check that username, password and application id  is post.
	// If so, try to login using them.
	if(isset($_POST["uname"]) && isset($_POST["pwd"]) && isset($_POST["appid"])) {
		try {
			// Login and set the session- and application id to querystring to be able to reuse
			// session between pageloads.
			// This is prefered to avoid login for each page load which would create two roundtrips to GpsGate Server.
			$proxy = SoapProxy::login($_POST["uname"], $_POST["pwd"], $_POST["appid"]);
			//header("Location:getusers.php?sid=".$proxy->SID."&appid=".$proxy->APPID);
		}
		catch(Exception $e) {
			// Display any login errors
			echo "<strong>".$e->getMessage()."</strong>";
		}
	}
?>

<html>
	<head>
		<title>PHP SOAPKit Sample - Login</title>
	</head>
	<body>
		<form action="login.php" method="post">
			<table>
				<tr>
					<td>
						Username
					</td>
					<td>
						<input type="input" name="uname" />
					</td>
				</tr>
				<tr>
					<td>
						Password
					</td>
					<td>
						<input type="password" name="pwd" />
					</td>
				</tr>
				<tr>
					<td>
						Application ID
					</td>
					<td>
						<input type="input" name="appid" />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" />
					</td>
			</tabke>
		</form>
	</body>
</html>

