<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <style>
    .navbare{
      position :;
    }
    </style>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 navbare">
  <div class="container-fluid">

     
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav  me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <img id="logo" src="../images/randev.png" alt="">
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="accueil.php"s>Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Liste_rdv.vue.php">Rendez-vous</a>
        </li>
      </ul>
      <form class="d-flex">
        <?php
          if($_SESSION != null)
          {?>
            <a class="btn btn-outline-success" type="submit" href="Tache.unique.categ.php">connexion</a>
          <?php
          }
          else
          {?>
            <a class="btn btn-outline-success" type="submit" href="Connexion.vue.stagiaire.php">connexion</a>
          <?php
          }
        ?>        
      </form>
   
    </div>
  </div>
</nav>
    </body>
</html>