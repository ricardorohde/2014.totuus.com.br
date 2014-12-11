<?php

$method = $_REQUEST['method'];

require_once("../classes/br.com.totuus/CameraManager.php");

switch ($method) {

	case "lockup" :
	
	
		
			
			$idCamera = $_REQUEST['idCamera'];
			
			$cameraManager = new CameraManager();
			
			$camera = $cameraManager->findById($idCamera);
			
			$ping = pingDomain($camera->dscUrl, $camera->dscPorta);
			
			if($ping != -1) 
				echo "<?xml version='1.0' encoding='utf-8' ?>\n<retorno>\n<codigo>success</codigo>\n</retorno>";
			else 	
				echo "<?xml version='1.0' encoding='utf-8' ?>\n<retorno>\n<codigo>down</codigo>\n</retorno>";

		
	break;

}

function pingDomain($domain, $port) {
	$starttime = microtime(true);
	$file      = fsockopen ($domain, $port, $errno, $errstr, 10);
	$stoptime  = microtime(true);
	$status    = 0;

	if (!$file) 
		$status = -1;  // Site is down
	else {
		fclose($file);
		$status = ($stoptime - $starttime) * 1000;
		$status = floor($status);
	}
	
	return $status;
}