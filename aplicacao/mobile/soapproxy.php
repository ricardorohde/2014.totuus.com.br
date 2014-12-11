<?php
	
	// Change those URLs to point at your server
	define("DIRECTORY_SERVICE_WSDL", "http://totuus.server93.com/Services/Directory.asmx?WSDL");
	define("TRACKS_SERVICE_WSDL", "http://totuus.server93.com/Services/Tracks.asmx?WSDL");
	
	// Proxy object to Gpsgate Server SOAP Services.
	// This is a simple demonstration object with only a small set of SOAP methods implemented
	// the purpose of this file is to demonstrate how to call GpsGate Server SOAP API
	// Feel free to extend and customize this object to fit your needs.
	class SoapProxy {
		// Singleton instance
		private static $instance;
		
		// Get the Proxy singleton instance.
		private static function getInstance() {
			if(!isset(self::$instance)) {
				$c = __CLASS__;
				self::$instance = new $c();
			}
	
			return self::$instance;
		}
		
		// Create new SoapProxy
		// This is set as private to diable users to manually construct the proxy obj.
		// Use login or getProxy instead!
		private function __construct() {
			
			// Create a new SoapClient (see: http://se2.php.net/soap)
			$this->directoryService = new SoapClient(
				DIRECTORY_SERVICE_WSDL,
				array(
					"trace" => 1,
					"exceptions" => 1
				) 
			);
		}
		
		// login and get the proxy object.
		// This will create a new session.
		// The session is expired after one hour of inactivity. For each request the session will last for one more hour.
		public static function login($username, $password, $appId) {
			$c = self::getInstance();
			$sid = $c->doLogin($username, $password, $appId);
			
			// Set session- and application id to proxy object
			$c->SID = $sid;
			$c->APPID = $appId;
			
			return self::$instance;
		}
		
		// Get the proxy object for an existing session.
		// Use this if you already have a session id to avoiding to have to login for each page load which would cause two roundtrips to the GpsGaet Server.
		public static function getProxy($sid, $appId) {
			$c = self::getInstance();
			
			// Set session- and application id to proxy object
			$c->SID = $sid;
			$c->APPID = $appId;
			
			return self::$instance;
		}
		
		// Get all users with the latest position for a group.
		public function getUsersInGroup($group, $viewId) {
			// Set the SOAP parameters. See reference doc.
			$p->strSessionID = $this->SID;
			$p->iApplicationID = $this->APPID;
			$p->strGroupName = $group;
			$p->iViewID = $viewId;
			
			// Get the response XML
			$strXml = $this->directoryService->GetUsersInGroup($p)->GetUsersInGroupResult->any;
			
			// Create a new SimpleXMLElement (see http://us2.php.net/simplexml)
			$xml = simplexml_load_string($strXml);
			
			// Check result for errors (the error format is specified in reference doc)
			$this->checkError($xml);
			
			// return the SimpleXMLElement
			return $xml;
		}
		
		// Login function.
		// This is private. To login use static login function.
		private function doLogin($username, $password, $appId) {
			
			// Set SOAP parameters for login (see ref doc)
			$p->strUsername = $username;
			$p->strPassword = $password;
			$p->iApplicationID = $appId;
			
			// Get the response XML
			$strXml = $this->directoryService->Login($p)->LoginResult->any;
			
			// Create a new SimpleXMLElement (see http://us2.php.net/simplexml)
			$xml = simplexml_load_string($strXml);
			
			// Check result for errors (the error format is specified in reference doc)
			$this->checkError($xml);
			
			// return the session ID
			
			echo (string)$xml;
			
			return (string)$xml;
		}
		
		// Checks a SimpleXMLElement if it contains an error.
		private function checkError($xml) {
			if($xml->getName() == "error") {
				throw new ErrorException($xml->exception->message);
			}
		}
	}
?>