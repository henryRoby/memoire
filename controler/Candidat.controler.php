<?php
    include("../model/Candidat.model.php");
    class CandControler extends Candidats
    {
        //liste candidat
        public function ParcCandidat()
        {
            $parc = new Candidats();
            return $parc -> listerTousLesCandidat();
        }

        // insert
        public function postuleCandidat($email, $cv, $lm)
        {
            $candidat = new Candidats();
            $candidat -> setEmail_candidat($email);
            $candidat -> setCv_candidat($cv);
            $candidat -> setLm_candidat($lm);
            $candidat -> ajoutCandidat();

        }


        // public function PrendClientConnecter($email, $mdp)
        // {
        //     $client_con = new Clients();
        //     return $client_con -> SelectClientLorsConnex($email, $mdp);
        // }
        // public function suisConnecter($num_cli)
        // {
        //     $get_cli = new Clients();
        //     return $get_cli -> getClientConnecter($num_cli);
        // }
    }
//     $test = new CandControler();
//     $test->postuleCandidat("test@gmail.com", 
//    "cv.pdf","lm.pdf");
?>