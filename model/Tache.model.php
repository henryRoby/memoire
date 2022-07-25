<?php
require_once("connexion.php");
    class Taches
    {
        private $num_tache;
        private $id_categorie;
        private $titre_tache;
        private $description_tache;
        private $dure_tache;
        private $connex;

        public function __construct()
        {
            $this -> num_tache = 0;
            $this -> id_categorie = 0;
            $this -> titre_tache = "";
            $this -> description_tache = "";
            $this -> dure_tache = "";
            $this -> connex = ConnexionDB::getConnexionDB();
        }

        //setter

        public function setNum_tache($num_tache)
        {
            $this -> num_tache = $num_tache;
        }
        public function setId_categorie($id_categorie)
        {
            $this -> id_categorie = $id_categorie;
        }
        public function setTitre_tache($titre_tache)
        {
            $this -> titre_tache = $titre_tache;
        }
        public function setDescription_tache($description_tache)
        {
            $this -> description_tache = $description_tache;
        }
        public function setDure_tache($dure_tache)
        {
            $this -> dure_tache = $dure_tache;
        }
        public function setConnex($connex)
        {
            $this -> connex = $connex;
        }

        //getter

        public function getNum_tache()
        {
            return $this -> num_tache;
        }
        public function getId_categorie()
        {
            return $this -> id_categorie;
        }
        public function getTitre_tache()
        {
            return $this -> titre_tache;
        }
        public function getDescription_tache()
        {
            return $this -> description_tache;
        }
        public function getDure_tache()
        {
            return $this -> dure_tache;
        }
        public function getConnex()
        {
            return $this -> connex;
        }

        //ajout categorie

        public function ajoutTaches()
        {
            $requete_ajout_tache= $this -> connex ->prepare("INSERT INTO taches VALUE(NULL, :id_categorie, :titre_tache, :description_tache, :dure_tache)");
            $requete_ajout_tache -> execute(array(
                "id_categorie" => $this -> getId_categorie(),
                "titre_tache" => $this -> getTitre_tache(),
                "description_tache" => $this -> getDescription_tache(),
                "dure_tache" => $this -> getDure_tache()

            ));
        }

        //jointure d'affichage tache & categorie

        public function listeTache()
        {
            return $this -> connex -> query("SELECT * FROM taches INNER JOIN categories ON taches.id_categorie = categories.id_categorie ORDER BY num_tache");
             
        }

        //supr tache
        public function supprimerTaches($id_tache)
        {
            $suppr = "DELETE FROM taches WHERE num_tache = ?";
            $prep = $this -> connex -> prepare($suppr);
            $prep -> execute(array($id_tache));
            
        }

        public function listeTacheModifier($num_tache)
        {
            $modif = "SELECT * FROM taches INNER JOIN categories ON taches.id_categorie = categories.id_categorie WHERE num_tache = ?";
            $retrMod = $this -> connex -> prepare($modif);
            $retrMod -> execute(array($num_tache));
            $donne_db = $retrMod -> fetch(PDO::FETCH_ASSOC);
            // $this -> num_tache = $donne_db['num_tache'];
            // $this -> id_categorie = $donne_db['id_categorie'];
            // $this -> titre_tache = $donne_db['titre_tache'];
            // $this -> description_tache = $donne_db['description_tache'];
            // $this -> dure_tache = $donne_db['dure_tache'];
            return $donne_db;  
        }
        public function modifierTache($id_categorie, $titre_tache, $description_tache, $dure_tache, $num_tache)
        {
            $modif = "UPDATE taches SET id_categorie = ?, titre_tache = ?,
            description_tache = ?, dure_tache = ? WHERE num_tache = ?";
            $preparation_modif_tache = $this -> connex -> prepare($modif);
            $preparation_modif_tache -> execute(array( $id_categorie, $titre_tache, $description_tache, $dure_tache, $num_tache));
            
        }
        //liste tache par categorie
        public function listeTacheCategorie($id_categorie)
        {
            $tache_selecte_cat = "SELECT * FROM taches INNER JOIN categories ON taches.id_categorie = categories.id_categorie WHERE taches.id_categorie = ?";
            $tache_par_categorie = $this -> connex -> prepare($tache_selecte_cat);
            $tache_par_categorie -> execute(array($id_categorie));
            //$des_taches_specifique = $tache_par_categorie -> fetch(PDO::FETCH_ASSOC);
            return $tache_par_categorie;
        }


    }
    // $test_ajout = new Taches();
    // var_dump($test_ajout -> listeTacheModifier(1));
    // $test_ajout -> setTitre_tache("application web");
    // $test_ajout -> setDescription_tache("lorem ipsum dolor set it");
    // $test_ajout -> setDure_tache("72 h");
    // $test_ajout -> ajoutTaches();
    
?>