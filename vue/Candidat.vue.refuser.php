<?php
    include("../controler/Candidat.controler.php");
    $id_candidat = 0;
    if(empty($_GET['id_candidat']))
    {
        echo('identifiant introuvable');
    }
    else
    {
        $id_candidat = $_REQUEST['id_candidat'];
        $instancesup = new CandControler();

        //var_dump($id_candidat);
        $instancesup -> SuppressionCandidat($id_candidat);
        header('Location:Candidat.vue.affich.php');
    }
?>