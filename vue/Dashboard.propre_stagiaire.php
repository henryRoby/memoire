<?php
    session_start();
    require_once("../controler/Stagiaire.controler.php");
    //var_dump($_SESSION["stagiaire_connecter"]);
    $etre_connecter = new StaControler();
    $unique_stagiaire = $etre_connecter -> suisConnecter($_SESSION["stagiaire_connecter"]); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../public/w3.css" rel="stylesheet" id="bootstrap-css">
    <title>Office stagiaire</title>
<style>

    #h2adimin {
        font-size : 50px;
        margin-top : 50px;
    }
    #wrapper {
        padding-left: 0;    
    }

    #page-wrapper {
        width: 100%;        
        padding: 0;
        background-color: #fff;
    }

    @media(min-width:768px) {
        

        #page-wrapper {
            padding: 22px 10px;
        }
    }

    /* Top Navigation */

    .top-nav {
        padding: 0 15px;
    }

    .top-nav>li {
        display: block;
        float: left;
    }

    .top-nav>li>a {
        padding-top: 20px;
        padding-bottom: 20px;
        line-height: 20px;
        color: #fff;
    }

    .top-nav>li>a:hover,
    .top-nav>li>a:focus,
    .top-nav>.open>a,
    .top-nav>.open>a:hover,
    .top-nav>.open>a:focus {
        color: #fff;
        background-color: #1a242f;
    }

    .top-nav>.open>.dropdown-menu {
        float: left;
        position: absolute;
        margin-top: 0;
        /*border: 1px solid rgba(0,0,0,.15);*/
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        background-color: #fff;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
    }

    .top-nav>.open>.dropdown-menu>li>a {
        white-space: normal;
    }

    /* Side Navigation */

    @media(min-width:768px) {
        .side-nav {
            position: fixed;
            top: 60px;
            left: 225px;
            width: 225px;
            margin-left: -225px;
            border: none;
            border-radius: 0;
            border-top: 1px rgba(0,0,0,.5) solid;
            overflow-y: auto;
            background-color: #222;
            /*background-color: #5A6B7D;*/
            bottom: 0;
            overflow-x: hidden;
            padding-bottom: 40px;
        }

        .side-nav>li>a {
            width: 225px;
            border-bottom: 1px rgba(0,0,0,.3) solid;
        }

        .side-nav li a:hover,
        .side-nav li a:focus {
            outline: none;
            background-color: #1a242f !important;
        }
    }

    .side-nav>li>ul {
        padding: 0;
        border-bottom: 1px rgba(0,0,0,.3) solid;
    }



    .side-nav>li>ul>li>a:hover {
        color: #fff;
    }

    .navbar .nav > li > a > .label {
    
    border-radius: 50%;
    position: absolute;
    top: 14px;
    right: 6px;
    font-size: 10px;
    font-weight: normal;
    min-width: 15px;
    min-height: 15px;
    line-height: 1.0em;
    text-align: center;
    padding: 2px;
    }

    .navbar .nav > li > a:hover > .label {
    top: 10px;
    }

    .navbar-brand {
        padding: 5px 15px;
    }
        #imagestagiaire {
            width : 40px;
            border-radius:50%;
        }
        body {
    overflow-x: hidden; 
    }
    #menutache{
        position :fixed;
    }
    #navvert {
        font-size :15px;
        font-weight: bolder;
    }
    #menuhorizon {
        font-weight : bold;
        font-size : 15px;
    }
    #reduisser
    {
        width: 200px;
        height: 170px;
    }

</style>
</head>
<body>   
<div id="noty-holder"></div>
<div id="wrapper">
   
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"  id="menutache"> 
        
        <div class="navbar-header">
            <img src="" alt="">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">            
            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown"><b class="fa fa-angle-down">

                </b><?php echo('<img src="../public/photo/'. $unique_stagiaire["photo"].'" id="imagestagiaire" alt="'.$unique_stagiaire["photo"].'">')?>
            </a>
                <ul class="dropdown-menu" >
                    <li><a href="#" id="menuhorizon" onclick="document.getElementById('id01').style.display='block'"><span class="glyphicon glyphicon-user"></span> <?php echo($unique_stagiaire["prenom_stagiaire"]); ?></a></li>
                    <li><a href="Stagiaire.deconnecte.php" id="menuhorizon"> <span class="glyphicon glyphicon-off"></span> Déconnecter</a></li>
                </ul>
            </li>
        </ul>
    
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-collapse">
            <ul class="nav navbar-nav side-nav" id="navvert">
                <li>
                    <a href="Tache.unique.categ.php" data-toggle="collapse" data-target="#submenu-1"><i class=""></i> LISTES DES TACHES<i></i></a>
                </li>
            </ul>
        </div>
        
    </nav>
 </div>
</div><br></br>
<div class="container" id="accueil_dash_stg">
    <div class="row">
        <center>
            <h1 id="h2adimin">Bienvenue sur dashboard stagiaire</h1>
        </center>
    </div>
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>

        <div class="w3-container">

            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                <div class="w3-center"><br>
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                    <?php echo('<img id="reduisser" src="../public/photo/'. $unique_stagiaire["photo"].'" alt="'.$unique_stagiaire["photo"].'" class="w3-circle w3-margin-top">')?>
                </div>
                <div class="w3-container w3-border w3-large">
                    <div class="w3-left-align">
                        <p><?php echo("<strong>".$unique_stagiaire["nom_stagiaire"]. "</strong> " . $unique_stagiaire["prenom_stagiaire"]);?></p>
                    </div>
                    <div class="w3-left-align">
                        <p>Etudiant en : <?php echo("<strong>".$unique_stagiaire["niveau_stagiaire"]. "</strong>");?></p>
                    </div>
                    <div class="w3-left-align">
                        <p>Domaine Informatique : <?php echo("<strong>".$unique_stagiaire["types"]. "</strong>");?></p>
                    </div>
                    <div class="w3-left-align">
                        <p>Fin de stage : <?php echo("<strong>".$unique_stagiaire["fin_stage"]. "</strong>");?></p>
                    </div>
                </div> 

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                </div>

                </div>
            </div>
        </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>



