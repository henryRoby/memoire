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

         //suprimer une RDV

         public function SuppressionRdv($num_rdv)
         {
             global $retr_rdv;
             $retr_rdv = new Rendezvous();
             $retr_rdv -> supprimerRdv($num_rdv);
         }
    }

    // $test = new Rendezvous();
    // $test1= $test ->listerTousLesRdv();
    // var_dump($test1);
?>