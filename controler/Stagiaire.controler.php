<?php
    include("../model/Stagiaire.model.php");
    class StaControler extends Stagiaires
    {
        public function parcourirStagiaire()
        {
            $parcourir = new Stagiaires();
            return $parcourir -> selectStagiaire();
        }
        public function nouvauStagiaire($id_categorie, $num_rdv, $nom_stagiaire, $prenom_stagiaire,
        $email_stagiaire, $niveau_stagiaire, $debut_stage, $fin_stage, $mdp_stagiaire, $photo)
        {
            $nouv_stagiaire = new Stagiaires();
            $nouv_stagiaire -> setId_categorie($id_categorie);
            $nouv_stagiaire -> setNum_rdv($num_rdv);
            $nouv_stagiaire -> setNom_stgiaire($nom_stagiaire);
            $nouv_stagiaire -> setPrenom_stagiaire($prenom_stagiaire);
            $nouv_stagiaire -> setEmail_stagiaire($email_stagiaire);
            $nouv_stagiaire -> setNiveau_stagiaire($niveau_stagiaire);
            $nouv_stagiaire -> setDebut_stage($debut_stage);
            $nouv_stagiaire -> setFin_stage($fin_stage);
            $nouv_stagiaire -> setMdp_stagiaire($mdp_stagiaire);
            $nouv_stagiaire -> setPhoto($photo);
            $nouv_stagiaire -> nouveauStagiaire();

        }
        public function PrendStgrConnecter($email, $mdp)
        {
            $client_con = new Stagiaires();
            return $client_con -> SelectStgrLorsConnex($email, $mdp);
        }
        public function suisConnecter($id_stag)
        {
            $get_cli = new Stagiaires();
            return $get_cli -> getStgrConnecter($id_stag);
        }

        public function SuppressionStg($id_stagiaire)
        {
            $retr_stagiaire = new Stagiaires();
            $retr_stagiaire -> supprimerStg($id_stagiaire);
        }
    }


?>