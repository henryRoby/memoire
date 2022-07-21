<?php
    class ConnexionDB{
        private static $connexionDB;
        public static function getConnexionDB(){
            $username = "root";
            $password = "";
            try {
                self::$connexionDB = new PDO("mysql:host=localhost;dbname=gestion_stagiaire", $username, $password);
                self::$connexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }
            return self::$connexionDB;
        }
    }
?>