<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="hamza dbani">
    <meta name="generator" content="Hugo 0.84.0">
    <title>La page d'accueil</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylefooter.css">
    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


<style>
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
    #logo{
        width: 200px;
        height: auto;
        /* object-fit: cover;
        object-position: bottom top;
        box-shadow: 0 0 10px white;
        border-radius: 8px;
        display: block;
        position: absolute;
        top: 80px;
        right: 20px;
        width: 50%;
        opacity: 1; */
    }
    
    #info h1{
        font-size: 70px;
        color: #212121;
        margin-top: 20px;
        
    }
    #info a{
        background: #212121;
        padding: 10px 18px;
        text-decoration: none;
        color: #fff;
        display: inline-block;
        margin: 30px 0;
        border-radius: 5px;
        
    }
    #img1 {
      width: 120%;
    }
        .container-fluid{
            text-align: center;
        }
    }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
    
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  </head>
  <body>


<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">

     
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <img id="logo" src="../images/randev.png" alt="">
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="accueil.php"s>Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="candidature.php">Zone de candidature</a>
        </li>
      </ul>
      <form class="d-flex">
        <a class="btn btn-outline-success" type="submit" href="inscriptionstagiaire.php">s'inscrire</a>&nbsp;
        <a class="btn btn-outline-success" type="submit" href="connexion.php">connexion</a>
      </form>
   
    </div>
  </div>
</nav>
<br/>
<div class="container">
      <div class="row" id="info">
        <div class="col-md-6">
              <h1>RanDevTeam<span style="color:#ff4321"></span></h1>
              <p style="text-align: justify;letter-spacing: 3px;text-indent: 50px;">
                Est un espace qui met en relation <br/>
                  
                les candidats et l'entreprise ... &#9786;<br/>
                <br/>
                Si vous êtes à la recherche d'un stage,  <br/>
                vous pouvez postuler auprès de notre équipe <br/>
                en accédant à ce lien &#8681;.
                <br/>  
              </p>   
                <a href="../vue/candidat.vue.php" role="button">Envoyer demande du stage &raquo;</a>
    
        </div>
        <div class="col-md-6">
        <div class="img-box" >
          <img id="img1" src="../images/candidat.png">  
        </div>
          </div>
     
   </div>
  </div>
    <br><br><br><br><br><br>  
    
    <footer>
    <div class="footer-content">
        <h3>Contact</h3>
        <p>
        Al irfane 1 complexe Doha route boukhalef, Tanger<br/>
                  90000 / Tanger<br/>
                N° Tél : 06 19 24 23 92 <br/>
                 recrutement@gmail.com<br/>
        </p>
        <ul class="social-links">
        <li><a href="https://www.facebook.com/hamzahamza.dbani"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://www.instagram.com/hamza_dbani/"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
        <li><a href="https://www.linkedin.com/in/hamza-dbani-a53071193/"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
        </div>
    <div class="footer-bottom">
        <p>copyright &copy;2021 contact. designed by <span>hamza dbani</span></p>
        </div>
      
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>
