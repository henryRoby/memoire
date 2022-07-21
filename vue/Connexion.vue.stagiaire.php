<?php
session_start();
include("../controler/Stagiaire.controler.php");
$check_connexion = new StaControler();
$stock_email = array();
$stock_pswd = array();
//$id_prod = $_POST["id_produit"];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email_lors_connex = $_POST["email_stagiaire"];
    $pswd_lors_connex = $_POST["mdp_stagiaire"];
    if(!empty($email_lors_connex) && !empty($pswd_lors_connex))
    {
        $tous_les_clients = $check_connexion -> parcourirStagiaire();
        foreach ($tous_les_clients as $chaq_cli) {
            array_push($stock_email, $chaq_cli["email_stagiaire"]);
            array_push($stock_pswd,$chaq_cli["mdp_stagiaire"]);
        }
        $compt = 0;
        $compt1 = 0;
        $bool_email = false;
        $bool_pswd = false;
        while ($compt <count($stock_email)) 
        {
            if($email_lors_connex === $stock_email[$compt])
            {
                $bool_email = true;
            }
            $compt ++;
        }
        while ($compt1 <count($stock_pswd)) 
        {
            if($pswd_lors_connex === $stock_pswd[$compt1])
            {
                $bool_pswd = true;
            }
            $compt1 ++;
        }

        if($bool_email && $bool_pswd)
        {
            echo('Vous êtes connecté');
            //$ajt_avoir = new AvControler();
            $prendre_stagiaire_connecter = new StaControler();
            $stagiaire_connecter = $prendre_stagiaire_connecter -> PrendStgrConnecter($email_lors_connex, $pswd_lors_connex);
            

            $_SESSION["stagiaire_connecter"] = $stagiaire_connecter["id_stagiaire"];
            var_dump($_SESSION["stagiaire_connecter"]);

            // header location vers dash stagiaire
        }
        else
        {
            if ($bool_email == false) 
            {
                echo("raha mail diso ______ vous n'êtes pas encore membre; inscrivez-vous d'abord !");
            }
            elseif ($bool_email == true && $bool_pswd == false) 
            {
                echo("Mot de passe incorrect");
            }
            else
            {
                echo("vous n'êtes pas encore membre; inscrivez-vous d'abord !");
            }
            
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
    <title>connexion</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="stylesheet" href="fichier.css">
    

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
      .inscform{
            background: white;
            width: 55%;
            height: 100%;
            padding: 25px 25px 25px 25px;
            border-radius: 20px;
            margin-left: 300px;
          }
      .container img{
              width: 120px;
              height: 120px;
              margin-top: -30px;
              margin-bottom: 30px;
              margin-right: 100px;
              margin-left: 550px;
          }
          h1{
              text-align: center;
              margin-left: 100px;
          }
          .insc{
           text-align: right;
           margin-top: -30px;
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
    <h1>Se connecter</h1>
    <br> 
    <img src="../images/undraw_profile_pic_ic5t.svg">
    
  <div class="inscform">
      
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <div class="row">
         <div class="form-group col-6">
              <label>E-mail</label>
            <input type="email" name="email_stagiaire" class="form-control">   
         </div>
         <div class="form-group col-6">
              <label>Mot de passe</label>
            <input type="password" name="mdp_stagiaire" class="form-control" id="password">   
         </div>
      </div>
    <br>     
    <div class="form-group">
        <center>
             <input type="submit" class="btn btn-success" name="submit" value="Se connecter">
        </center>   
    </div>    
     </form> 
  </div>      
  
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>

</div>  