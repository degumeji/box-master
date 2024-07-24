<?php 

    require_once dirname(__FILE__).'/../config/database.php';
	error_reporting(0);
	date_default_timezone_set('America/Guayaquil');

	class main {

		public $DB;
		public $db_name = DB_NAME;

        function consultarUsuario($usuario, $clave){

			$respuesta = null;

			try {

				$this->DB = new DB();
				$conn = $this->DB->conectarBD();
				$sql = 'SELECT user, password, admin FROM '.$this->db_name.'.user WHERE estado = 1 AND user = "'.$usuario.'" AND password = "'.$clave.'";';

				$rs = mysqli_query($conn, $sql);

				while ($row=mysqli_fetch_array($rs)) {
					$respuesta[] = array(
									"user" => $row['user'],
									"admin" => $row['admin']
								);
				}

				$this->DB->desconectarBD();

			} catch (Exception $e) {
				var_dump('Excepción capturada en consultarUsuario: ', $e->getMessage(), "\n");
				die();
			}

			return $respuesta;
		}
    }
?>