<?php
/*error_reporting(E_ALL);
ini_set('display_errors', '1');
error_reporting(-1);*/

require_once dirname(__FILE__).'/../class/clsMain.class.php';

$main = new main();
$accion = $_POST['accion'];
$accion2 = $_GET['accion'];

$response = 'OK';

switch($accion){

	case 'insertPregunta':
        /*
		$response = $main->insertPregunta($_POST['pregunta'], $_POST['respuesta1'], $_POST['respuesta2'], $_POST['respuesta3'], 
                                            $_POST['respuesta4'], $_POST['correcta'], $_POST['valor'], $_POST['tipo'], $_POST['estado']);

        if($response == null){
            $response = "No se registro";
            echo json_encode(array('response' => 400, 'mensaje' => $response));            
        }else{
            echo json_encode(array('response' => 200, 'mensaje' => $response));
        }
		*/
        echo json_encode(array('response' => 200, 'mensaje' => $response));
		break;

    case 'updatePregunta':
        /*
        $response = $main->updatePregunta($_POST['id'], $_POST['pregunta'], $_POST['respuesta1'], $_POST['respuesta2'], $_POST['respuesta3'], 
                                            $_POST['respuesta4'], $_POST['correcta'], $_POST['valor'], $_POST['tipo'], $_POST['estado']);

        if($response == null){
            $response = "No se registro";
            echo json_encode(array('response' => 400, 'mensaje' => $response));            
        }else{
            echo json_encode(array('response' => 200, 'mensaje' => $response));
        }
        */

        echo json_encode(array('response' => 200, 'mensaje' => $response));
		break;

    case 'deletePregunta':

        /*
        $response = $main->deletePregunta($_POST['id']);

        if($response == null){
            $response = "No se eliminó";
            echo json_encode(array('response' => 400, 'mensaje' => $response));            
        }else{
            echo json_encode(array('response' => 200, 'mensaje' => $response));
        }
        */
        
        echo json_encode(array('response' => 200, 'mensaje' => $response));
		break;

	default:
		break;
}

switch($accion2){

	case 'consultarUsuario':
        /*
		$response = $main->consultarUsuario($_GET['v1'], $_GET['v2']);

        if($response == null){
            $response = "No existe usuario";
            echo json_encode(array('response' => 400, 'mensaje' => $response));            
        }else{
            session_start();
            $_SESSION['user'] = $response[0]['user'];
            $_SESSION['admin'] = $response[0]['admin'];

            echo json_encode(array('response' => 200, 'mensaje' => "OK"));
        }*/
		
        session_start();
		$_SESSION['user'] = 'admin';
        $_SESSION['admin'] = 1;

        echo json_encode(array('response' => 200, 'mensaje' => "OK"));
        break;

    case 'consultarPregunta':
    
        /*
        $response = $main->consultarPregunta();

        if($response == null){
            $response = "No hay preguntas";
            echo json_encode(array('response' => 400, 'mensaje' => $response));
        }else{
            echo json_encode(array('response' => 200, 'mensaje' => $response));
        }
        */
        echo json_encode(array('response' => 200, 'mensaje' => $response));
        break;
    case 'consultarPreguntaIndividual':

        /*
        $response = $main->consultarPreguntaIndividual($_GET['id']);

        if($response == null){
            $response = "No hay pregunta";
            echo json_encode(array('response' => 400, 'mensaje' => $response));
        }else{
            echo json_encode(array('response' => 200, 'mensaje' => $response));
        }*/

        echo json_encode(array('response' => 200, 'mensaje' => $response));
        break;

    case 'consultarTipoPregunta':
        /*
        $response = $main->consultarTipoPregunta();

        if($response == null){
            $response = "No hay pregunta";
            echo json_encode(array('response' => 400, 'mensaje' => $response));
        }else{
            echo json_encode(array('response' => 200, 'mensaje' => $response));
        }
        */
        echo json_encode(array('response' => 200, 'mensaje' => $response));
        break;

    case 'logout':

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        echo json_encode(array('response' => 200, 'mensaje' => "OK"));

	default:
		break;
}