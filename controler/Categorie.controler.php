<?php
    include("../model/Categorie.model.php");
    class CatControler extends Categories
    {
        public $Categorie;
        
        public function checkAjoutCategorie($value_categorie)
        {
            global $Categorie;
            $Categorie = new Categories();
            
            $Categorie -> setTypes($value_categorie);
            $Categorie ->ajouterCategorieProd();
            
        }
        public function listeChaqueCategorie()
        {
            global $Categorie;
            $Categorie = new Categories();
            return $Categorie -> listerTousLesCategories();
        }
    }
?>