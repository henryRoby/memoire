<?php
    include("../model/Rendezvous.model.php");
    class RdvControler extends Rendezvous
    {
        
        public function ConfirmationRdv($id_candidat, $date_rdv, $heure_rdv)
        {
            $rdv = new Rendezvous();
            
            $rdv -> setId_candidat($id_candidat);
            $rdv -> setDate_rdv($date_rdv);
            $rdv -> setHeure_rdv($heure_rdv);
            $rdv -> ajoutRendezvous();
            
        }
        public function listeChaqueRdv()
        {
            $rdv = new Rendezvous();
            return $rdv -> listerTousLesRdv();
        }
    }
    // $liste = new RdvControler();
    // $liste -> ConfirmationRdv(1,"22/7/22","08:45");

?>