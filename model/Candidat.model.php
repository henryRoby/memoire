<?php
require_once("connexion.php");
    class Candidats
    {
        private $id_candidat;
        private $email_candidat;
        private $cv_candidat;
        private $lm_candidat;
        private $connex;

        public function __construct()
        {
            $this -> id_candidat = 0;
            $this -> email_candidat = "";
            $this -> cv_candidat = "";
            $this -> lm_candidat = "";
            $this -> connex = ConnexionDB::getConnexionDB();
        }

        //setter

        public function setId_candidat($id_candidat)
        {
            $this -> id_candidat = $id_candidat;
        }
        public function setEmail_candidat($email_candidat)
        {
            $this -> email_candidat = $email_candidat;
        }
        public function setCv_candidat($cv_candidat)
        {
            $this -> cv_candidat = $cv_candidat;
        }
        public function setLm_candidat($lm_candidat)
        {
            $this -> lm_candidat = $lm_candidat;
        }
        public function setConnex($connex)
        {
            $this -> connex = $connex;
        }

        //getter

        public function getId_candidat()
        {
            return $this -> id_candidat;
        }
        public function getEmail_candidat()
        {
            return $this -> email_candidat;
        }
        public function getCv_candidat()
        {
            return $this -> cv_candidat;
        }
        public function getLm_candidat()
        {
            return $this -> lm_candidat;
        }
        public function getConnex()
        {
            return $this -> connex;
        }

        //ajout categorie

        public function ajoutCandidat()
        {
            $requete_ajout_candidat = $this -> connex ->prepare("INSERT INTO candidats VALUE(NULL, :email_candidat, :cv_candidat, :lm_candidat)");
            $requete_ajout_candidat -> execute(array(
                "email_candidat" => $this -> getEmail_candidat(),
                "cv_candidat" => $this -> getCv_candidat(),
                "lm_candidat" => $this -> getLm_candidat()
            ));
        }

        //lister

        public function listerTousLesCandidat()
        { 
            return $this -> connex -> query("SELECT * FROM candidats");    
        }

        public function Getidcandidat($id)
        { 
            $candidat = "SELECT * FROM candidats WHERE id_candidat = ?";
            $candidatunique =  $this -> connex -> prepare($candidat);
            $candidatunique -> execute(array($id));
            return $candidatunique -> fetch(PDO::FETCH_ASSOC);

        }

          //suppression candidat
    public function supprimerCandidat($id_candidat)
    {
        $suppr = "DELETE FROM candidats WHERE id_candidat = ?";
        $prep = $this -> connex -> prepare($suppr);
        $prep -> execute(array($id_candidat));
        
    }
    

    }   
?>