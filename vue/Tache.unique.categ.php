<?php
//session_start();
    include_once('Dashboard.propre_stagiaire.php');
    include("../controler/Tache.controler.php");
    include("../controler/Stagiaire.controler.php");
    $stg_connecter = new StaControler();
    $connecte = $stg_connecter -> suisConnecter($_SESSION["stagiaire_connecter"]);
    $tache_stg_con = new TacheControler();
    $aff_propre_tache = $tache_stg_con -> listeTachesParCategorie($connecte['id_categorie']);
if(date("d/m/Y") == $connecte['fin_stage'])
{
    echo("Votre stage prend fin aujord'hui");
}
else
{
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
            if($connecte["niveau_stagiaire"] == $value["niv_stag"]){ 
            ?>
           

                    <div class="col-md-4">
                        <div class="card" style="width:320px"  >
                            
                            <h4 class="card-img-top" id="h4catego" ><?php echo($value['titre_tache']);?></h4>
                        <div class="card-body">
                            <h4 class="card-title" id="hj4">Déscription :</h4>
                            <p class="card-text ptache"><?php echo($value['description_tache']);?></p>

                        </div>
                        <div class="card-body">
                            <h4 class="card-title" id="hj4">Durée du tâche :</h4>
                            <p class="ptache"><?php echo($value['dure_tache']);?></p>
                        </div>
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
