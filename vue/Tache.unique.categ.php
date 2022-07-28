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
if(date("d/m/Y") == $connecte['fin_stage'])
{
    ?>
        <div class="row">
            <div class="alert alert-danger">
                <strong>Remarque !</strong> Votre stage prend fin aujord'hui,
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
}
.h3tacheo {
    font-weight: bolder;    
    font-size : 20px;
    text-decoration : underline;
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
