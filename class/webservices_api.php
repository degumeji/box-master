<?php 

require_once dirname(__FILE__).'/clsMain.class.php';

include("../config/config.php");

error_reporting (5);

class webservices_api{

    function defaultError(){
			
		$resp = new objDefaultError(); 		
		$resp->resultCode = "01";
		$resp->resultMessage = "Incorrect parameters";
		
		return $resp;
	}

    public function getUsuario($data){

        $parameters   = parse_url($data);
        $query         = str_replace("query=", "", $parameters['query']);
        $variable      = str_replace('%3D', '=', $query);
        $variable      = str_replace('%26', '&', $variable);

        parse_str($variable, $arrParameters);

        $resp = new objCarrito(); 
        $main = new main();
        //$token = new objToken();

        try{

            $arr = $main->consultarUsuario(@$arrParameters["usuario"], @$arrParameters["clave"]);

            if($arr == ""){
                $resp->response = 101;
                $resp->resultCode = "ER";
                $resp->resultMessage = "No existe usuario";
            }else{
                $resp->response = 200;
                $resp->resultCode = "OK";
                $resp->resultMessage = $arr;
            }

        } catch (Exception $e){

            $resp->response = 101;
            $resp->resultCode = "ER";
            $resp->resultMessage = $e->getMessage();
            $resp->checkoutId ="0";

        }

        return $resp;

    }

}

class objCarrito{   
    public $response;                 
    public $resultCode;
    public $resultMessage;
}

class objError{
    public $CodRsp;
    public $MsjRsp;
    public $checkoutId;
}

class objDefaultError{
    public   $resultCode ="";
    public   $resultMessage =""; 
} 

class objToken{
    public $TOKEN_GENERAL = "14DC206D-1D71-4CB8-9C23-4F8480AF103C";
}