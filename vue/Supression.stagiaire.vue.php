<?php 
    session_start();

    require_once("../controler/Candidat.controler.php");
    require_once("../controler/Rendezvous.controler.php");
    require_once("../controler/Stagiaire.controler.php");
    $candidat = new CandControler();
    $rendezvous = new RdvControler();
    $stagiaire = new StaControler();
    
    $id_stagiaire = $_GET["id_candidat"];
    
    $stagiaire -> SuppressionStg($id_stagiaire);
    $rendezvous -> SuppressionRdv($id_stagiaire);
    $candidat-> SuppressionCandidat($id_stagiaire);
   
    session_destroy();
?>