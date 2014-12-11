<html>
<head>
<title>PHP SOAPKit Sample - List users</title>
</head>
<body>
<?php
	// Include the proxy object.
	include 'soapproxy.php';
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	date_default_timezone_set('Europe/Stockholm');
	
	// Check that session- and application id is in querystring. (set by login.php)
	if(!isset($_GET['sid']) || $_GET['sid'] == "" || !isset($_GET['appid']) || $_GET['appid'] == "")
	{
		echo "Not logged in, please go to <a href=\"login.php\">Login</a>";
	}
	else
	{
		try {
			
			// Get the proxy object using existing session from query string.
			// This is prefered to avoid login for each page load which would create two roundtrips to server!
			
			$proxy = SoapProxy::getProxy($_GET['sid'], $_GET['appid']);
			
			// Proxy object return the result as SimpleXMLElements (see http://us2.php.net/simplexml)
			$xml = $proxy->getUsersInGroup("vehicles", 0);
			
			// Create the result table.
			// First the header.
			echo "<table cellspacing=\"0\">
				<tr style=\"font-weight:bold\">
					<td>ID</td>
					<td>Username</td>
					<td>Name</td>
					<td>Last transport</td>
					<td>Latitude</td>
					<td>Longitude</td>
					<td>Altitude</td>
					<td>Speed</td>
					<td>Heading</td>
					<td>Time stamp</td>
				<tr>";
			
			// Go through each user in xml result set.
			$cnt = 0;
			foreach($xml->user as $user) {
				if($cnt++ % 2 == 1)
					echo "<tr>";
				else
					echo "<tr style=\"background-color:DFDFDF\">";
					
					// Print the user object properties in columns.
					echo "<td>".$user->id."</td>";
					echo "<td>".$user->username."</td>";
					echo "<td>".$user->name."</td>";
					echo "<td>".$user->lastTransportProtocol."</td>";
					echo "<td>".$user->trackPoint->pos->lng."</td>";
					echo "<td>".$user->trackPoint->pos->lat."</td>";
					echo "<td>".$user->trackPoint->pos->alt."</td>";
					echo "<td>".$user->trackPoint->vel->speed."</td>";
					echo "<td>".$user->trackPoint->vel->heading."</td>";
					echo "<td>".date("Y-m-d H:i:s", strtotime($user->trackPoint->utc))."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		catch(Exception $e) {
			// Display errors.
			echo "<strong>".$e->getMessage()."</strong>";
		}
	}
?>

</body>
</html>


