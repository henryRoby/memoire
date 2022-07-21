<?php
    require_once("connexion.php");
    class Stagiaires
    {
        private $id_stagiaire;
        private $id_categorie;
        private $num_rdv;
        private $nom_stgiaire;
        private $prenom_stagiaire;
        private $email_stagiaire;
        private $mdp_stagiaire;
        private $photo;
        private $connex;
 
        public function __construct()
        {
            $this -> id_stagiaire = 0;
            $this -> id_categorie = 0;
            $this -> num_rdv = 0;
            $this -> nom_stgiaire = "";
            $this -> prenom_stagiaire = "";
            $this -> email_stagiaire = "";
            $this -> mdp_stagiaire = "";
            $this -> photo = "";
            $this -> connex = ConnexionDB::getConnexionDB();
        }
 
 
        public function setId_stagiaire($id_stagiaire)
        {
            $this -> id_stagiaire = $id_stagiaire;
        }
        public function setId_categorie($id_categorie)
        {
            $this -> id_categorie = $id_categorie;
        }
        public function setNum_rdv($num_rdv)
        {
            $this -> num_rdv = $num_rdv;
        }
        public function setNom_stgiaire($nom_stgiaire)
        {
            $this -> nom_stgiaire = $nom_stgiaire;
        }
        public function setPrenom_stagiaire($prenom_stagiaire)
        {
            $this -> prenom_stagiaire = $prenom_stagiaire;
        }
        public function setEmail_stagiaire($email_stagiaire)
        {
            $this -> email_stagiaire = $email_stagiaire; 
        }
        public function setMdp_stagiaire($mdp_stagiaire)
        {
            $this -> mdp_stagiaire = $mdp_stagiaire; 
        }
        public function setPhoto($photo)
        {
            $this -> photo = $photo;
        }
        
        public function setConnex($connex)
        {
            $this -> connex = $connex;
        }
 
 
 
        public function getId_stagiaire()
        {
             return $this -> id_stagiaire ;
        }
        public function getId_categorie()
        {
             return $this -> id_categorie;
        }
        public function getNum_rdv()
        {
             return $this -> num_rdv;
        }
        public function getNom_stgiaire()
        {
             return $this -> nom_stgiaire;
        }
        public function getPrenom_stagiaire()
        {
             return $this -> prenom_stagiaire;
        }
        public function getEmail_stagiaire()
        {
             return $this -> email_stagiaire; 
        }
        public function getMdp_stagiaire()
        {
             return $this -> mdp_stagiaire; 
        }
        public function getPhoto()
        {
             return $this -> photo;
        }
        public function getConnex()
        {
             return $this -> connex;
        }
 
 
        public function nouveauStagiaire()
        {
            $req_nouv_stagiaire = $this -> connex -> prepare(
                "INSERT INTO stagiaires VALUE(
                     null,
                     :id_categorie,
                     :num_rdv,
                     :nom_stgiaire,
                     :prenom_stagiaire,
                     :email_stagiaire,
                     :mdp_stagiaire,  
                     :photo
                 )"
             );
            $req_nouv_stagiaire -> execute(array(
                "id_categorie" => $this -> getId_categorie(),
                "num_rdv" => $this -> getNum_rdv(),
                "nom_stgiaire" => $this -> getNom_stgiaire(),
                "prenom_stagiaire" => $this -> getPrenom_stagiaire(),
                "email_stagiaire" => $this -> getEmail_stagiaire(),
                "mdp_stagiaire" => $this -> getMdp_stagiaire(),
                "photo" => $this -> getPhoto(),
            ));
        }

   


        public function selectStagiaire()
        {
            $select_stagiaire = "SELECT * FROM stagiaires INNER JOIN categories ON stagiaires.id_categorie = categories.id_categorie
            INNER JOIN rendezvous ON stagiaires.num_rdv = rendezvous.num_rdv";
            return  $this -> connex -> query($select_stagiaire);
        }
        public function getStgrConnecter($id_stagiaire)
        {
            $select_connecte = "SELECT * FROM stagiaires WHERE id_stagiaire = $id_stagiaire";
            $select_connecte_stgr = $this -> connex -> prepare($select_connecte);
            $select_connecte_stgr -> execute();
            return $select_connecte_stgr -> fetch(PDO::FETCH_ASSOC);
        }
        public function SelectStgrLorsConnex($email_stagiaire, $mdp_stagiaire)
        {
            $prend_stgr_connecte = "SELECT * FROM stagiaires WHERE( email_stagiaire = ? AND mdp_stagiaire = ?)";
            $stgr_connecte = $this -> connex -> prepare($prend_stgr_connecte);
            $stgr_connecte -> execute(array($email_stagiaire, $mdp_stagiaire));
            return $stgr_connecte -> fetch(PDO::FETCH_ASSOC);
        }
    }

    // $test = new Stagiaires();
    // $test -> setId_categorie('1');
    // $test -> setNom_stgiaire("test");
    // $test -> setPrenom_stagiaire("test");
    // $test -> setEmail_stagiaire("test@gmail.com");
    // $test -> setMdp_stagiaire("1234");
    // $test -> setPhoto("test.jpg");
    // $test -> nouveauStagiaire()
?>