<?php

error_reporting(E_ALL);
error_reporting(-1);
set_time_limit(0);

include_once ("class/webservices_api.php");
$classws = new webservices_api();

$url =  $_SERVER['REQUEST_URI'];
$resp = null;
$url_path = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_FILENAME);
// FIN DE REQUEST_URI

if ($_SERVER['REQUEST_METHOD'] == 'POST') {    

	// OBTIENE CAMPOS POST AL CONSUMIR WS
	$json = file_get_contents('php://input');
	$data = json_decode($json);
	// FIN OBTENER CAMPOS POST

	switch ($url_path) {
		case "sendInfoToClient":
			//$resp=$classws->consultarUsuario($data);
			break;

		default:
			$resp=$classws->defaultError();
			break;
	}
    
}elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){
	//* http://derek.famicarza.com/api_ws.php/getUsuario?query=usuario=dmejia&clave=dmejia
	if ($url_path == "getUsuario"){
		$resp = $classws->getUsuario($url);
	}else{
		$resp = $classws->defaultError();
	}
}else{
    $resp=$classws->defaultError();
}


echo json_encode($resp);
header("Content-type:application/json");
die();
?>