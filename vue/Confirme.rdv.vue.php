<?php
    include("../controler/Rendezvous.controler.php");
    $erreur = "";
    $bool_test_new = false;
    $nouv_ajout_rdv = new RdvControler();
    $deja_eu_rdv = $nouv_ajout_rdv -> listeChaqueRdv();
    foreach ($deja_eu_rdv as $key => $value) {
        if($_GET["id_candidat"] == $value['num_rdv'])
        {
            $bool_test_new = true;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["date"]) AND empty($_POST["heure"]))
        {
            $erreur = "le champ est obligatoire";
        }
        else
        {            
            $nouv_ajout_rdv->ConfirmationRdv($_POST["id"], $_POST["date"], $_POST["heure"]);    
            header('Location: Candidat.vue.affich.php');
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    
    <title>ajout nouveau RDV</title>    
<style>
     body{
    background: url(../images/fond.jpg);
    background-attachment: fixed;
    background-size: cover;
}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .container{
        background-color: #dfdd;
        margin-top: 130px;
        width: 20%;
        border-radius : 20px;
        box-shadow : 5px 2px 5px 3px;
       padding-bottom : 10px;
    }
    #soumettre {
        margin-bottom: 50px;
    }

    label{
        font-weight: bolder;
       padding-left: 30px;
       padding-top: 10px;
    }
    .row {
        margin-top: 10px;
    }
    #desc {
        margin-bottom: 15px;
        
    }
   #centerbtn {
    margin-top : 15px;
   }
    </style>
 <link href="navbar-top.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">

  </head>
</head>
<body>
 <?php
    if($bool_test_new == true)
    {?>
        <div class="alert alert-warning">
            <a href="Candidat.vue.affich.php" class="close">&times;</a>
            <strong>Attention!</strong> Cette candidat a déjà eu son rendez -vous.
        </div>
    <?php
    }
    if($bool_test_new == false)
    {
 ?>   
<div class="container">
<br>
     <center><h1 >Confirmer un Rendez-vous</h1></center> 
    <br> 
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <span class="error"><?php echo $erreur;?></span>
                </div>
                
                <div class="col-md-8">
                <input type="text" name="hidden" value ="<?php echo $_GET["id_candidat"]; ?>" class="form-control"/>
                            
                </div>
            </div>
           

        <div class="row">
             <div class="col-md-4">
                <label>Date du rendez vous</label>
             </div>   
             <div class="col-md-8">
                <input type="date" name="date" class="form-control" required/>
             </div>            

        </div>
        
        <div class="row">
             <div class="col-md-4">
             <label>Heure du rendez vous</label>
             </div>   
             <div class="col-md-8">
             <input type="text" name="heure" class="form-control" required/>
             </div>            

        </div>

            <center id="centerbtn">
                <button type="submit" class="btn btn-success">Ajouter</button>
            </center>
      
    </form> 
    </div>
    <?php
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</html>