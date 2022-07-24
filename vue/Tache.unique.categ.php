<?php
//session_start();
    include_once('Dashboard.propre_stagiaire.php');
    include("../controler/Tache.controler.php");
    include("../controler/Stagiaire.controler.php");
    $stg_connecter = new StaControler();
    $connecte = $stg_connecter -> suisConnecter($_SESSION["stagiaire_connecter"]);
    $tache_stg_con = new TacheControler();
    $aff_propre_tache = $tache_stg_con -> listeTachesParCategorie($connecte['id_categorie']);
    var_dump($aff_propre_tache);
    // foreach ($aff_propre_tache as $key => $value) {
    //     echo("io oh " . $value['description_tache'] . "<br>");
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acc dash Stagiaire</title>
</head>
<body>
    <?php
        foreach ($aff_propre_tache as $key => $value) 
        {?>
        
            <div>
                <div>
                    <h1>
                        <?php
                            echo($value['titre_tache']);
                        ?>
                    </h1>
                </div>
                <div>
                    <p>
                        <?php
                            echo($value['description_tache']);
                        ?> 
                    </p>
                </div>
                <div>
                    <h4>
                        <?php
                            echo($value['dure_tache']);
                        ?>
                        heure
                    </h4>
                </div>
            </div>
        <?php
        }
    ?>
</body>
</html>