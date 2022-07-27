<?php
//session_start();
    include_once('Dashboard.propre_stagiaire.php');
    include("../controler/Tache.controler.php");
    include("../controler/Stagiaire.controler.php");
    $stg_connecter = new StaControler();
    $connecte = $stg_connecter -> suisConnecter($_SESSION["stagiaire_connecter"]);
    $tache_stg_con = new TacheControler();
    $aff_propre_tache = $tache_stg_con -> listeTachesParCategorie($connecte['id_categorie']);


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
       
#rowval {
    margin-left: 10px;
}
    </style>
</head>
<body>

<div class="container">
<div class="row">
    <?php
    
        foreach ($aff_propre_tache as $key => $value)
         
        {
            if($connecte["niveau_stagiaire"] == $value["niv_stag"]){ 
            ?>
           
              
                    <div class="col-md-4">
                        <div class="card" style="width:320px"  id="rowval">
                            <img class="card-img-top" src="../images/fond.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo($value['titre_tache']);?></h4>
                            <p class="card-text"><?php echo($value['description_tache']);?></p>
                            <a href="#" class="btn btn-primary stretched-link"><?php echo($value['dure_tache']);?></a>
                        </div>
                    </div>
                        </div>
                    
              </br></br>
           
        <?php
        }
        }
    ?>

</div>
</div>
</body>
</html>
