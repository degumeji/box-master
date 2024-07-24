<?php 
    error_reporting(0);
    require("config.php");

    class DB {
        public $link;

	    public function __construct() {}

        public function conectarBD(){
			error_reporting(0);
			$this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);

			if (mysqli_connect_errno()){
		  		die('Could not connect: ' . mysqli_connect_error());
			}

			return $this->link; 
		}

        public function desconectarBD(){
			error_reporting(0);

			mysqli_close($this->link);

		}
    }	

?>