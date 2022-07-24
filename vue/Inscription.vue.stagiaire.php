<?php
include("../controler/Stagiaire.controler.php");
include("../controler/Categorie.controler.php");
include("../controler/Rendezvous.controler.php");

$test = new StaControler();
$ap_categorie = new CatControler();
$rendez_vous_num = new RdvControler();
$retr_categorie = $ap_categorie -> listeChaqueCategorie();
$retr_rdv = $rendez_vous_num -> listeChaqueRdv();
$tab_em = array();
$tab_rdv = array();
    $id_categorie = 0;
    $num_rdv = 0;
    $nom_stagiaire = "";
    $prenom_stagiaire = "";
    $email_stagiaire = "";
    $mdp_stagiaire = "";
    $photo = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id_categorie = $_POST["id_categorie"];
    $num_rdv = $_POST["num_rdv"];
    $nom_stagiaire = $_POST["nom_stagiaire"];
    $prenom_stagiaire = $_POST["prenom_stagiaire"];
    $email_stagiaire = $_POST["email_stagiaire"];
    $mdp_stagiaire = $_POST["mdp_stagiaire"];
    $photo = $_FILES["photo"]["name"];
        $reg_length = $test -> parcourirStagiaire();
        foreach ($reg_length as $value)
        {
            array_push($tab_em, $value['email_stagiaire']);
            array_push($tab_rdv, $value['num_rdv']);
        }
        $manisa = 0;
        $bool = false;
        while ($manisa < count($tab_em)) 
        {
          if($email_stagiaire === $tab_em[$manisa])
          {    
            $bool = true;
          }
          $manisa ++;
        }
        if ($bool == true) 
        {
            echo('Oups!! Quelq\'un utilise déjà votre email');
        }else
        {
          $manisa_rdv = 0;
          $bool_rdv = false;
          while ($manisa_rdv < count($tab_rdv)) 
          {
            if($num_rdv == $tab_rdv[$manisa])
            {    
              $bool_rdv = true;
            }
            $manisa_rdv ++;
          }
          if ($bool == true) 
          {
              echo('Oups!! un numero pour un candidat, vous êtes un escraud');
          }
          else
          {
            $chemin = "../public/photo/".basename($photo);
            move_uploaded_file($_FILES["photo"]["tmp_name"],$chemin);
            $registre_des_stagiaire = new StaControler();
            $registre_des_stagiaire -> nouvauStagiaire($id_categorie, $num_rdv, $nom_stagiaire, $prenom_stagiaire,
            $email_stagiaire, $mdp_stagiaire, $photo);
              header("location: Connexion.vue.stagiaire.php");
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
    <title>inscription</title>

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
    <h1>Inscrivez-vous</h1>
    <br> 
    <img src="../images/undraw_profile_pic_ic5t.svg">
    
  <div class="inscform">
      
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" >
      
       
      <div class="row">

     
        <div class="form-group col-6">
            <label>Choix Categorie :</label>
            <select name="id_categorie" id="">
            <?php
                foreach ($retr_categorie as $chaque_elements) 
                {
                    echo('<option value =" ' .$chaque_elements['id_categorie'] . ' ">' .$chaque_elements['types'] . '</option>');
                }
            ?>
            </select>
        </div>
        <div class="form-group col-6">
            <label>votre numero au moment du rendez vous :</label>
            <select name="num_rdv" id="">
            <?php
                foreach ($retr_rdv as $chaque_elements) 
                {
                    echo('<option value =" ' .$chaque_elements['num_rdv'] . ' ">' .$chaque_elements['num_rdv'] . '</option>');
                }
            ?>
            </select>
        </div>

      <div class="form-group col-6"> 

            <label>Nom</label>
            <input type="text" name="nom_stagiaire" class="form-control"  >     
         </div>
         <div class="form-group col-6">
              <label>Prenom</label>
            <input type="text" name="prenom_stagiaire" class="form-control" >   
         </div>
         <div class="form-group col-6">
              <label>E-mail</label>
            <input type="email" name="email_stagiaire" class="form-control">   
         </div>
      </div>
    
     <div class="row">
      <div class="form-group col-6">
              <label>Mot de passe</label>
            <input type="password" name="mdp_stagiaire" class="form-control" id="password">   
         </div>
     <div class="form-group col-6">
             <label>Photo de profil</label>
            <input type="file" name="photo">   
         </div>
         </div>
     
    <br>     
    <div class="row">
    <div class="form-group col-6">
        <input type="submit" class="btn btn-success" name="submit" value="S'inscrire">
    </div>    
    </div>    
     </form> 
  </div>      
  
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>

</div>  