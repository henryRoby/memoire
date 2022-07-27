<?php
    include("../controler/Rendezvous.controler.php");
    include("../controler/Candidat.controler.php");
    require_once("dashboard.admin.php");
    $erreur = "";
    $ap_candidat = new CandControler();
  
    $id = $_GET["id_candidat"];
    $retr_candidat = $ap_candidat -> Getuniquecandidat($id);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["date"]) AND empty($_POST["heure"]))
        {
            $erreur = "le champ est obligatoire";
        }
        else
        {
            $nouv_ajout_rdv = new RdvControler();
            
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
        width: 40%;
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
    
<div class="container">
<br>
     <center><h1 >Confirmer un Rendez-vous</h1></center> 
    <br> 
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="row">
            <div class="row">
            <div class="col-md-4">
                    <span class="error"><?php echo $erreur;?></span>
                    <label>Numéro de candidat</label>
                </div>
                
                <div class="col-md-8">
                <input type="text" name="id" value ="<?php echo $retr_candidat['id_candidat'] ?>" class="form-control"/>
                            
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
</body>
</html>