<?php

    class BDD{

        public function __construct(){
            $server = 'localhost';
	        $db = 'bd_php_hand';
	        $login = 'root';
	        $mdp = '';
            
            try {
                $this->linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
                //$this->linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
        	}
    	}
	}

?>