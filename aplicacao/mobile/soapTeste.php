<?php 

	require_once("TotuusSOAPProxy.php");
/*	
	
	$proxy = new TotuusSOAPProxy();
	
	$sessionID = $proxy->Login("thalesfreire@gmail.com", "sefaz2012", 7);
	
	echo $sessionID . "<br><br>";
	
	
	
//	
//	$apps = $proxy->GetApplications($sessionID, 7);
//	
//	foreach ($apps->ApplicationBag as $app ) {
//		
//		echo $app->id ." " . $app->name ." " . $app->description .  "<br>"; 
//		
//	}
//
echo "<br>";

	$vehicles = $proxy->GetVehicles($sessionID, 7);
	
	
	
	foreach ($vehicles->user as $vehicle ) {
		
		echo $vehicle->name . " " . $vehicle->description . "<br>"; 
		
		
	}

*/

$proxy = new TotuusSOAPProxy();
	
	$sessionID = $proxy->Login("smartcar@smartcar.ind.br", "smartcar", 9);
	
	echo $sessionID . "<br><br>";
	
	//$xmlInfo = $proxy->GetLatestGateRecords($sessionID, 7, 8);
	
	
	//var_dump($xmlInfo);
	
	
	/*


	
	
	
	
	$params = array('strSessionID' => '21C2DFD5C6077B9C19BBD20F0B99B767', 'iApplicationID' => 7,  'strGroupName' => 'Vehicles', 'iViewID' => 5);

	$xmlInfo = $soapClient->__call('GetUsersInGroup', array($params));

	$xmlInfo->GetTagsInApplicationResponse;
	
	print '<pre>';
	
	var_dump($xmlInfo);
	
	print '</pre>';
	
*/

?>