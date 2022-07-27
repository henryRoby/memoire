<?php
    include("../model/Tache.model.php");
    class TacheControler extends Taches
    {
        public $retr_tache;
        public function nouvelleTache($id_cat, $titre, $description, $dure, $niv_stag, $visibilite)
        {
            $tache = new Taches();
            $tache -> setId_categorie($id_cat);
            $tache -> setTitre_tache($titre);
            $tache -> setDescription_tache($description);
            $tache -> setDure_tache($dure);
            $tache -> setNiv_stag($niv_stag);
            $tache -> setVisibilite($visibilite);
            $tache -> ajoutTaches();

        }

        //liste tous les taches

        public function listeTousTaches()
        {
            global $retr_tache;
            $retr_tache = new Taches();
            return $retr_tache -> listeTache();
        }
        public function listeTachesParCategorie($cate)
        {
            global $retr_tache;
            $retr_tache = new Taches();
            return $retr_tache -> listeTacheCategorie($cate);
        }
        //suprimer une tache

        public function SuppressionTache($id_tache)
        {
            global $retr_tache;
            $retr_tache = new Taches();
            $retr_tache -> supprimerTaches($id_tache);
        }
        //modification
        public function tacheAModifier($num_ta){
            $test = new Taches();
            return $test -> listeTacheModifier($num_ta);
        }

        
        public function miseAjourTache($id_categorie, $titre_tache, $description_tache, $dure_tache, $niv_stag, $visibilite, $num_tache)
        {
            $mise_a_jour = new Taches();
                $mise_a_jour -> setId_categorie($id_categorie);
                $mise_a_jour -> setTitre_tache($titre_tache);              
                $mise_a_jour -> setDescription_tache($description_tache);
                $mise_a_jour -> setDure_tache($dure_tache);
                $mise_a_jour -> setNiv_stag($niv_stag);
                $mise_a_jour -> setVisibilite($visibilite);
                $mise_a_jour -> modifierTache($id_categorie, $titre_tache, $description_tache, $dure_tache, $niv_stag, $visibilite, $num_tache);
        }
    }
?>