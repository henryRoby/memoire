<?php
    require_once("../controler/Rendezvous.controler.php");
    $num_rdv = 0;
    if(empty($_GET['num_rdv']))
    {
        echo('identifiant introuvable');
    }
    else
    {
        $num_rdv = $_REQUEST['num_rdv'];
        $instancesup = new RdvControler();
        $instancesup -> SuppressionRdv($num_rdv);
        header('Location:liste.rdv.dashboard.vue.php');
    }
?>