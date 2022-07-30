<?php
//session_start();
    include_once('Dashboard.propre_stagiaire.php');
    include("../controler/Tache.controler.php");
    include_once("../controler/Stagiaire.controler.php");
    $bool_visible_change = true;
    //$visible_change=0;
    $stg_connecter = new StaControler();
    $connecte = $stg_connecter -> suisConnecter($_SESSION["stagiaire_connecter"]);
    $tache_stg_con = new TacheControler();
    $aff_propre_tache = $tache_stg_con -> listeTachesParCategorie($connecte['id_categorie']);
if(date("Y-m-d") == $connecte['fin_stage'])
{
    ?>
        <div class="row" id="rowval">
            <div class="container">
               <center><img id="logo" src="../images/randev.png" alt="">
                    <h2>ATTESTATION DE STAGE</h2>
                </center>

                    <p> Je soussigné, Mr William Arthur HARILANTONIAINA, Manager de la société Randevteam, ayant son siège au bâtiment de la 
                        Pharmacie TSARA Andavamamba au A273 Antananarivo Madagascar, atteste que,
                    </p>
                <center>
                    <h1> Nom des stagiaire</h1>
                </center>
                    <p>étudiant de l'Ecole Superiaur de Management et d'Informatique Appliqué ( ESMIA) en filière INFORMATIQUE Risque et
                        Décision en 3ème année, a effectué un stagiare dans le cadre de ses études au sein de notre établissement RANDEVTEAM NIF 
                        3002364629 STAT 63121112016003665, en qualité de Développeur(se) Web rattachée au service Developpement Web et Framework.
                        Le stage a eu lieu dans la période allant du <h5>Date()</h5>  au <h5>Date()</h5>

                        La dit stagiaire a bien effectué les tâches qui lui ont été attribuées, et sa rigueur et motivation a été bénéfique
                        à l'entreprise en tout point de vue.
                    </p>
                    <p>
                        Nous délivrons la présente attestation pour servir et valoir ce que de droit.
                    </p>

                    


               

            </div>
            <div>
                <?php echo ('<a href="Supression.stagiaire.vue.php?id_candidat='.$_SESSION["stagiaire_connecter"].'" class="btn btn-primary">Vueillez cliquer pour imprimmer votre attestation😘😘😘</a>') ?>
            </div>

            <div class="alert alert-danger">
                <strong>Remarque !</strong> Votre stage prend fin aujourd'hui,
                c'etait bien!😊😊😎.
            </div>
            
        </div>
        
    <?php
}
else
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $visible_change = $_POST['visibilite'];
        $vis_bd_changer = $tache_stg_con -> tacheAModifier($visible_change);
        $tache_stg_con -> miseAjourTache($vis_bd_changer['id_categorie'], $vis_bd_changer['titre_tache'], $vis_bd_changer['description_tache'],
        $vis_bd_changer['dure_tache'], $vis_bd_changer['niv_stag'], 0, intval($visible_change));    
    }
    //$tach_vis_false = $tache_stg_con -> tacheAModifier($visible_change);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acc dash Stagiaire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js">  
  </script>
    <style>   
    #h4catego {
        background: url(../images/fond.jpg);
        background-size: cover;
        text-align: center;
       padding-top :50px;
       color: white;
        height : 150px;
        font-size: 30px;
    }
#hj4{
    text-decoration: underline;
    font-weight: bold;
}
.ptache {
    font-size : 15px !important;
    
}
#rowval{
    margin-top: 40px;
    margin-left:30px;

}
.h3tacheo {
    font-weight: bolder;    
    font-size : 20px;
    text-decoration : underline;
    margin-left:30px;   
}
    </style>
</head>
<body>

<div class="container"></br></br>
    <h3 class="h3tacheo">Listes des tâches à faire :</h3>
<div class="row" id="rowval">
    <?php
        foreach ($aff_propre_tache as $key => $value)
         
        {
            if($connecte["niveau_stagiaire"] == $value["niv_stag"])
            { 
                if($value["visibilite"] == 1)
                {
                    ?>
                    <div class="col-md-4">
                        <div class="card" style="width:320px"  >
                            
                            <h4 class="card-img-top" id="h4catego" ><?php echo($value['titre_tache']);?></h4>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <h4 class="card-title" id="hj4">Déscription :</h4>
                                    <p class="card-text ptache"><?php echo($value['description_tache']);?></p>
                                </div>
                                
                                <div class="row">
                                    <h4 class="card-title" id="hj4"> Durée du tâche : </h4>
                                    <p class="ptache"><?php echo($value['dure_tache']);?> heure</p>
                                </div>
                            </div>
                            

                            </div>
                            <div class="card-body">
                            <div class="container">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <?php
                                    echo('<input type="hidden" name="visibilite" class="btn btn-info" value="'.$value["num_tache"].'"/>');
                                    ?>
                                    <input type="submit" class="btn btn-info" value="Accepter"/>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>   
                <?php
                }
                if($value["visibilite"] == 0)
                {
                    ?>
                    <div class="col-md-4">
                        <div class="card" style="width:320px"  >
                            
                            <h4 class="card-img-top" id="h4catego" ><?php echo($value['titre_tache']);?></h4>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <h4 class="card-title" id="hj4">Déscription :</h4>
                                    <p class="card-text ptache"><?php echo($value['description_tache']);?></p>
                                </div>
                                
                                <div class="row">
                                    <h4 class="card-title" id="hj4"> Durée du tâche : </h4>
                                    <p class="ptache"><?php echo($value['dure_tache']);?> heure</p>
                                </div>
                            </div>
                            

                            </div>
                            <div class="card-body">
                            <div class="container">
                                <div class="alert alert-primary">
                                    <strong>Occuper !</strong> Quelqu'un realise déjà cette tache!!
                                    ce cool non 😎😎😎😎😁😁👍
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                <?php
                } 
                   
            }
            else
            {
                ?>
                    <div class="row">
                        <div class="alert alert-info">
                            <strong>Remarque !</strong> Vous n'avez pas encore
                            des taches à faire 😊😊😎.
                        </div>
                    </div>
                <?php
            }
        

        }
    ?>

</div>
</div>
</body>
</html>
<?php
}
?>
