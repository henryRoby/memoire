<?php
    include("../controler/Rendezvous.controler.php");
    include("../controler/Candidat.controler.php");
    $erreur = "";
    $ap_candidat = new CandControler();
    $retr_candidat = $ap_candidat -> ParcCandidat();
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["date"]) AND empty($_POST["heure"]))
        {
            $erreur = "le champ est obligatoire";
        }
        else
        {
            $nouv_ajout_rdv = new RdvControler();
            
            $nouv_ajout_rdv->ConfirmationRdv($_POST["id_cand"], $_POST["date"], $_POST["heure"]);
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="hamza dbani">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ajout nouveau RDV</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="stylesheet" href="fichier.css">
    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    }
    .row {
        margin-top: 10px;
    }
    #desc {
        margin-bottom: 15px;
        
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
     <center><h1 >Confirmer un Rendez vous</h1></center> 
    <br> 
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="row">
            <div class="row">
            <div class="col-md-4">
                    <span class="error"><?php echo $erreur;?></span>
                    <label>Choix Categorie:</label>
                </div>
                
                <div class="col-md-8">
                    <select name="id_cand" class="form-control">
                        <?php
                            foreach ($retr_candidat as $chaque_elements) 
                            {
                                echo('<option value =" ' .$chaque_elements['id_candidat'] . ' ">' .$chaque_elements['email_candidat'] . '</option>');
                            }
                        ?>
                    </select>
                </div>
            </div>
           

        <div class="row">
             <div class="col-md-4">
                <label>Date du rendez vous</label>
             </div>   
             <div class="col-md-8">
                <input type="date" name="date" class="form-control"/>
             </div>            

        </div>
        
        <div class="row">
             <div class="col-md-4">
             <label>Heure du rendez vous</label>
             </div>   
             <div class="col-md-8">
             <input type="text" name="heure" class="form-control"/>
             </div>            

        </div>
            <center>
                <button type="submit" class="btn btn-success">Ajouter</button>
            </center>
      
    </form> 
    </div>  
</body>
</html>