<?php
    include("../controler/Tache.controler.php");
    $num_tache = 0;
    if(empty($_GET['num_tache']))
    {
        echo('identifiant introuvable');
    }
    else
    {
        $num_tache = $_REQUEST['num_tache'];
        $instancesup = new TacheControler();
        $instancesup -> SuppressionTache($num_tache);
        header('Location:Tache.vue.afficher.php');
    }
?>