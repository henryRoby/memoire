<?php
require_once("connexion.php");
    class Rendezvous
    {
        private $num_rdv;
        private $id_candidat;
        private $date_rdv;
        private $heure_rdv;
        private $connex;

        public function __construct()
        {
            $this -> num_rdv = 0;
            $this -> id_candidat = 0;
            $this -> date_rdv = "";
            $this -> heure_rdv = "";
            $this -> connex = ConnexionDB::getConnexionDB();
        }

        //setter

        public function setNum_rdv($num_rdv)
        {
            $this -> num_rdv = $num_rdv;
        }
        public function setId_candidat($id_candidat)
        {
            $this -> id_candidat = $id_candidat;
        }
        public function setDate_rdv($date_rdv)
        {
            $this -> date_rdv = $date_rdv;
        }

        public function setHeure_rdv($heure_rdv)
        {
            $this -> heure_rdv = $heure_rdv;
        }
        public function setConnex($connex)
        {
            $this -> connex = $connex;
        }

        //getter

        public function getNum_rdv()
        {
            return $this -> num_rdv;
        }
        public function getId_candidat()
        {
            return $this -> id_candidat;
        }
        public function getDate_rdv()
        {
            return $this -> date_rdv;
        }
        public function getHeure_rdv()
        {
            return $this -> heure_rdv;
        }
        public function getConnex()
        {
            return $this -> connex;
        }

        //ajout categorie

        public function ajoutRendezvous()
        {
            $requete_ajout_candidat = $this -> connex ->prepare("INSERT INTO rendezvous VALUE(NULL, :id_candidat, :date_rdv, :heure_rdv)");
            $requete_ajout_candidat -> execute(array(
                "id_candidat" => $this -> getId_candidat(),
                "date_rdv" => $this -> getDate_rdv(),
                "heure_rdv" => $this -> getHeure_rdv()

            ));
        }

        //lister

        public function listerTousLesRdv()
        { 
            return $this -> connex -> query("SELECT * FROM rendezvous INNER JOIN candidats ON rendezvous.id_candidat = candidats.id_candidat");    
        }

        // supression rdv
        public function supprimerRdv($num_rdv)
        {
            $suppr = "DELETE FROM rendezvous WHERE num_rdv = ?";
            $prep = $this -> connex -> prepare($suppr);
            $prep -> execute(array($num_rdv));
            
        }
    }
    
    // $test = new Rendezvous();
    // $test ->supprimerRdv(3);
?>