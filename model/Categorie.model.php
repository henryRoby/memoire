<?php
require_once("connexion.php");
    class Categories
    {
        private $id_categorie;
        private $types;
        private $connex;

        public function __construct()
        {
            $this -> id_categorie = 0;
            $this -> types = "";
            $this -> connex = ConnexionDB::getConnexionDB();
        }

        //setter

        public function setId_categorie($id_categorie)
        {
            $this -> id_categorie = $id_categorie;
        }
        public function setTypes($types)
        {
            $this -> types = $types;
        }
        public function setConnex($connex)
        {
            $this -> connex = $connex;
        }

        //getter

        public function getId_categorie()
        {
            return $this -> id_categorie;
        }
        public function getTypes()
        {
            return $this -> types;
        }
        public function getConnex()
        {
            return $this -> connex;
        }

        //ajout categorie

        public function ajouterCategorieProd()
        {
            $requete_ajout_categorie = $this -> connex ->prepare("INSERT INTO categories VALUE(NULL, :types)");
            $requete_ajout_categorie -> execute(array(
                "types" => $this -> getTypes()
            ));
        }

        //lister

        public function listerTousLesCategories()
        { 
            return $this -> connex -> query("SELECT * FROM categories");    
        }    
    } 
?>