
<?php
        global $nom_admin, $mdp_admin, $entre_nad, $entre_mdpad;
        $nom_admin = "admin";
        $mdp_admin = "1234";
        $entre_nad =  $_POST["admin"];
        $entre_mdpad =  $_POST["mdp_admin"];
        if ($entre_nad === $nom_admin && $entre_mdpad === $mdp_admin) {
    ?>
    <a href="Tache.vue.afficher.php">Cllick ici pour voir les menus</a>
    <?php
        }
        else
        {
           header('Location:admin.vue.php'); 
        }
    ?>