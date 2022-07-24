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
    // $variable = $liste -> listeChaqueRdv();

    // foreach ($variable as $key => $value) {
    //     echo($value["date_rdv"]);
    // }

    

?>