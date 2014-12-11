<?php 

require_once('TotuusSOAPProxy.php');

$method = $_REQUEST['method'];


switch($method) {

	case "login":
	
		$result ;
		
		$proxy = new TotuusSOAPProxy();
		
		$result = $proxy->Login($_REQUEST['email'], $_REQUEST['pass'], $_REQUEST['appID']);
			
		echo $result;
	
	break;
	
	case "getApplications":
	
		$result ;
		
		$proxy = new TotuusSOAPProxy();
		
		$apps = $proxy->GetApplications($_REQUEST['sessionID'], $_REQUEST['appID']);
		
		$xmlRetono = "<applications>";
		
		
		foreach ($apps->ApplicationBag as $app ) {
			
			//echo $app->id ." " . $app->name ." " . $app->description .  "<br>"; 
			
			$xmlRetono .= "     <application>";
			
			$xmlRetono .= "          <id>".$app->id."</id>";
			$xmlRetono .= "          <name>".$app->name."</name>";
			$xmlRetono .= "          <description>".$app->description."</description>";
			
			$xmlRetono .="     </application>";
			
		}
		
		$xmlRetono .= "</applications>";
		
			
		echo $xmlRetono;
	
	break;
	
	case "getVehicles":
	
		$result ;
		
		$proxy = new TotuusSOAPProxy();
		
		$vehicles = $proxy->GetVehicles($_REQUEST['sessionID'], $_REQUEST['appID']);
			
		$xmlRetono = "<vehicles>";
		
		
		foreach ($vehicles->user as $user ) {
			
			//echo $app->id ." " . $app->name ." " . $app->description .  "<br>"; 
			
			$xmlRetono .= "     <vehicle>";
			
			$xmlRetono .= "          <id>".$user->id."</id>";
			$xmlRetono .= "          <userName>".$user->userName."</userName>";
			$xmlRetono .= "          <name>".$user->name."</name>";
			$xmlRetono .= "          <description>".$user->description."</description>";
			$xmlRetono .= "          <lastTransportProtocol>".$user->lastTransportProtocol."</lastTransportProtocol>";
			$xmlRetono .= "          <deviceActivity>".$user->deviceActivity."</deviceActivity>";
			
			foreach ($user->trackPoint as $trackPoint ) {
			
				foreach ($trackPoint->pos as $position ) {
					$xmlRetono .= "          <lng>".$position->lng."</lng>";
					$xmlRetono .= "          <lat>".$position->lat."</lat>";
					$xmlRetono .= "          <alt>".$position->alt."</alt>";
				}
				
				foreach ($trackPoint->vel as $velocity ) {
					$xmlRetono .= "          <speed>".$velocity->speed."</speed>";
					$xmlRetono .= "          <heading>".$velocity->heading."</heading>";
				}
				
				$xmlRetono .= "          <trackPointUTC>".$trackPoint->utc."</trackPointUTC>";
				$xmlRetono .= "          <trackPointValid>".$trackPoint->valid."</trackPointValid>";
			
			}
			
			
			
			
			
			$xmlRetono .= "          <attributes>".$user->attributes."</attributes>";
			
			$xmlRetono .="     </vehicle>";
			
		}
		
		$xmlRetono .= "</vehicles>";
		
			
		echo $xmlRetono;
	
	break;


	case "getReverseGeocode":
	
		$result ;
		
		$proxy = new TotuusSOAPProxy();
		
		$reverseGeocode = $proxy->GetReverseGeocode($_REQUEST['sessionID'], $_REQUEST['appID'], $_REQUEST['lat'], $_REQUEST['lng']);
			
		$xmlRetono = "<reverseGeocode>";
		
		
		foreach ($reverseGeocode->locations->loc as $info ) {
			
			$xmlRetono .= "          <countryName>".$info->countryName."</countryName>";
			$xmlRetono .= "          <cityName>".$info->cityName."</cityName>";
			$xmlRetono .= "          <postalCodeNumber>".$info->postalCodeNumber."</postalCodeNumber>";
			$xmlRetono .= "          <streetBox>".$info->streetBox."</streetBox>";
			$xmlRetono .= "          <streetName>".$info->streetName."</streetName>";
			$xmlRetono .= "          <streetNumber>".$info->streetNumber."</streetNumber>";
			$xmlRetono .= "          <address>".$info->address."</address>";
			
		}
		
		$xmlRetono .= "</reverseGeocode>";
		
			
		echo $xmlRetono;
	
	break;
	
	case "getLastUserUpdate":
	
		$result ;
		
		$proxy = new TotuusSOAPProxy();
		
		$lastUpdate = $proxy->GetLastUserUpdate($_REQUEST['sessionID'], $_REQUEST['appID'], $_REQUEST['vehicleID']);
			
		$xmlRetono = "<update>";
		
		
		foreach ($lastUpdate->gateMessage as $update ) {
			
			foreach ($update->trackPoint as $trackPoint ) {
			
				foreach ($trackPoint->pos as $position ) {
					$xmlRetono .= "          <lng>".$position->lng."</lng>";
					$xmlRetono .= "          <lat>".$position->lat."</lat>";
					$xmlRetono .= "          <alt>".$position->alt."</alt>";
				}
				
				foreach ($trackPoint->vel as $velocity ) {
					$xmlRetono .= "          <speed>".$velocity->speed."</speed>";
					$xmlRetono .= "          <heading>".$velocity->heading."</heading>";
				}
				
				$xmlRetono .= "          <trackPointUTC>".$trackPoint->utc."</trackPointUTC>";
				$xmlRetono .= "          <trackPointValid>".$trackPoint->valid."</trackPointValid>";
			
			}
			
		}
		
		$xmlRetono .= "</update>";
		
			
		echo $xmlRetono;
	
	break;
	
	

}






?>