<?php 
    session_start();

    require_once("../controler/Rendezvous.controler.php");
    require_once("../controler/Stagiaire.controler.php");
   
    $rendezvous = new RdvControler();
    $stagiaire = new StaControler();
    
    $id_stagiaire = $_GET["id_candidat"];
    
    $stagiaire -> SuppressionStg($id_stagiaire);
    $rendezvous -> SuppressionRdv($id_stagiaire);

   header("Location:accueil.php");
   
    session_destroy();
?>