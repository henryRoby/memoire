<?php
    include("../controler/Candidat.controler.php");
    $post_candidat = new CandControler();
    $erreur = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["email"]) AND empty($_FILES["cv"]["name"])AND empty($_FILES["lettre"]["name"]))
        {
            echo("le champ est obligatoire");
        }
        else
        { 
          $longcv = strlen($_FILES["cv"]["name"]);
          $longlm = strlen($_FILES["lettre"]["name"]);
          if($longcv >= 10 OR $longlm >= 10)
          {
            $erreur = "nom de fichier tres long";
          }
          else
          {
            $tous_les_candidat = $post_candidat -> ParcCandidat();
            $tab_email_candidat = array();
            foreach ($tous_les_candidat as $chaque_candidat) {
              array_push($tab_email_candidat, $chaque_candidat['email_candidat']);
            }
            echo(count($tous_les_candidat));
            // $chemin_cv = "../public/src/cv/".basename($_FILES["cv"]["name"]);
            // move_uploaded_file($_FILES["cv"]["tmp_name"],$chemin_cv);
            // $chemin_lm = "../public/src/lm/".basename($_FILES["lettre"]["name"]);
            // move_uploaded_file($_FILES["lettre"]["tmp_name"],$chemin_lm);
            // $post_candidat -> postuleCandidat($_POST["email"], $_FILES["cv"]["name"], $_FILES["lettre"]["name"]);
            // header("Location:../pages/accueil.php ");
          }
        }
    }  
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="hamza dbani">
    <meta name="generator" content="Hugo 0.84.0">
    <title>La page de candidature</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="stylesheet" href="fichier.css">
    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
     body{
    background: url(../images/candidature.jpg);
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
       
    }
    #soumettre {
        margin-bottom: 50px;
    }

    label{
        font-weight: bolder;
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
  <body>
    
    
  <div class="container">
  <br>
     <center><h1 >Formulaire de candidature</h1></center> 
    <br>
    <span>
      <?php
        echo $erreur;  
      ?>
    </span>
  <div class="myform">
      
     <form class="" id="" method="post"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="form-group ">
            <center>
            <label>E-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="">  
            </center>
             
         </div>
        </div>
        <div class="col-md-3"></div>
      
      </div>
  </br>
     <div class="row">
      <center>
      <div class="form-group col-6">
            <label for="file">CV</label>
            <input type="file" name="cv" id="cv" class="form-control" placeholder="CV">   
         </div>
         </br>
     <div class="form-group col-6">
             <label for="file">Lettre De Motivation</label>
              <div>
                <input type="file" name="lettre"  class="form-control" placeholder="Lettre De Motivation"> 
              </div>  
         </div>
      </div>
      </center>
      
    <br>     
    <div class="form-group">
        <center>
        <input type="submit" id="soumettre" class="btn btn-success" value="Envoyer"> 
        <a id="soumettre" class="btn btn-danger" href="../pages/accueil.php">Annuler</a> 
        
        </center>   
    </div>    
         
     </form> 
  </div>      
  
  </div>

  <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Votre demande est en cours</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-primary">Accueil</a>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">


</script>



  </body>
</html>
