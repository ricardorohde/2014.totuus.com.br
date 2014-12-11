<?php 

require_once("../classes/br.com.totuus/UsuarioManager.php");

class TotuusSOAPProxy {
	
	private $URL_WSDL = 'http://totuus.server93.com/Services/Directory.asmx?WSDL';
	private $URL_WSDL_GEO = 'http://totuus.server93.com/Services/Geocoder.asmx?WSDL';
	
	
	
	public function Login($email, $password, $appID) {
		
		$usuarioManager = new UsuarioManager();
		
		$usuarios = $usuarioManager->findUsuariosByEmailPass($email, $password);
		
		$usuarioGpsGate;
		
		while($usuario = mysql_fetch_array($usuarios))
		{	
			$usuarioGpsGate = $usuario['nom_usuario_gpsgate'];
		}
		
		if(isset($usuarioGpsGate)) { 
			
			$soapClient = new SoapClient($this->URL_WSDL, array('trace'=>1, 'exceptions' => 1));
			
			$p->strUsername = $usuarioGpsGate;
			$p->strPassword = $password;
			$p->iApplicationID = $appID;
		
			$xmlInfo = $soapClient->Login($p)->LoginResult->any;
			$xml = simplexml_load_string($xmlInfo);
		} else {
			$xml = "";
		}

		return $xml;
		
	}
	
	public function GetApplications($strSessionID, $appID) {
		
		$soapClient = new SoapClient($this->URL_WSDL, array('trace'=>1, 'exceptions' => 1));
		
		$p->strSessionID = $strSessionID;
		$p->iApplicationID = $appID;
	
		$xmlInfo = $soapClient->GetCurrentApplications($p)->GetCurrentApplicationsResult->any;
		$xml = simplexml_load_string($xmlInfo);

		return $xml;
		
	}
	
	public function GetVehicles($strSessionID, $appID) {
		
		$soapClient = new SoapClient($this->URL_WSDL, array('trace'=>1, 'exceptions' => 1));
		
		$p->strSessionID = $strSessionID;
		$p->iApplicationID = $appID;
		$p->strGroupName = "Vehicles";
		$p->iViewID = 0;
	
		$xmlInfo = $soapClient->GetUsersInGroup($p)->GetUsersInGroupResult->any;
		$xml = simplexml_load_string($xmlInfo);

		return $xml;
		
	}
	
	public function GetReverseGeocode($strSessionID, $appID, $lat, $lng) {
		
		$soapClient = new SoapClient($this->URL_WSDL_GEO, array('trace'=>1, 'exceptions' => 1));
		
		$arrayLat = array($lat);
		$arrayLng = array($lng);
		
		$p->strSessionID = $strSessionID;
		$p->iApplicationID = $appID;
		$p->lats = $arrayLat;
		$p->lngs = $arrayLng;
	
		$xmlInfo = $soapClient->ReverseGeocode($p)->ReverseGeocodeResult->any;
		$xml = simplexml_load_string($xmlInfo);

		return $xml;
		
	}
	
	public function GetLastUserUpdate($strSessionID, $appID, $userID) {
		
		$soapClient = new SoapClient($this->URL_WSDL, array('trace'=>1, 'exceptions' => 1));
		
		$p->strSessionID = $strSessionID;
		$p->iApplicationID = $appID;
		$p->iUserID = $userID;
		$p->bFilterNotUsed = false;
	
		$xmlInfo = $soapClient->GetLatestGateRecords($p)->GetLatestGateRecordsResult->any;
		$xml = simplexml_load_string($xmlInfo);

		return $xml;
		
	}
	
	
	
}

?>