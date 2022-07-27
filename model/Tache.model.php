<?php
require_once("connexion.php");
    class Taches
    {
        private $num_tache;
        private $id_categorie;
        private $titre_tache;
        private $description_tache;
        private $dure_tache;
        private $niv_stag;
        private $visibilite;
        private $connex;

        public function __construct()
        {
            $this -> num_tache = 0;
            $this -> id_categorie = 0;
            $this -> titre_tache = "";
            $this -> description_tache = "";
            $this -> dure_tache = "";
            $this -> niv_stag = "";
            $this -> visibilite = true;
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
        public function setNiv_stag($niv_stag)
        {
            $this -> niv_stag = $niv_stag;
        }
        public function setVisibilite($visibilite)
        {
            $this -> visibilite = $visibilite;
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
        public function getNiv_stag()
        {
            return $this -> niv_stag;
        }
        public function getVisibilite()
        {
            return $this -> visibilite;
        }
        public function getConnex()
        {
            return $this -> connex;
        }

        //ajout categorie

        public function ajoutTaches()
        {
            $requete_ajout_tache= $this -> connex ->prepare("INSERT INTO taches VALUE(NULL, :id_categorie, :titre_tache, :description_tache, :dure_tache, :niv_stag, :visibilite)");
            $requete_ajout_tache -> execute(array(
                "id_categorie" => $this -> getId_categorie(),
                "titre_tache" => $this -> getTitre_tache(),
                "description_tache" => $this -> getDescription_tache(),
                "dure_tache" => $this -> getDure_tache(),
                "niv_stag" => $this -> getNiv_stag(),
                "visibilite" => $this -> getVisibilite()

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
            return $donne_db;  
        }
        public function modifierTache($id_categorie, $titre_tache, $description_tache, $dure_tache, $niv_stag, $visibilite, $num_tache)
        {
            $modif = "UPDATE taches SET id_categorie = ?, titre_tache = ?,
            description_tache = ?, dure_tache = ?, niv_stag = ?, visibilite =? WHERE num_tache = ?";
            $preparation_modif_tache = $this -> connex -> prepare($modif);
            $preparation_modif_tache -> execute(array( $id_categorie, $titre_tache, $description_tache, $dure_tache, $niv_stag, $visibilite, $num_tache));
            
        }
        //liste tache par categorie
        public function listeTacheCategorie($id_categorie)
        {
            $tache_selecte_cat = "SELECT * FROM taches INNER JOIN categories ON taches.id_categorie = categories.id_categorie WHERE taches.id_categorie = ?";
            $tache_par_categorie = $this -> connex -> prepare($tache_selecte_cat);
            $tache_par_categorie -> execute(array($id_categorie));
            return $tache_par_categorie;
        }


    }
    
?>