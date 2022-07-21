<?php
    include("../controler/Tache.controler.php");
    class TacheVue
    {

        public $titre_tache= "";
        public $description_tache = "";
        public $dure_tache ="";
        public function affichageTaches()
        {
            $aff = new TacheControler();
            $retour_tous_tache = $aff -> listeTousTaches();
            
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
    <title>taches</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="chercherStyle.css">
      
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style> 
      .lignecolor{
        background: white;
        text-align: center;
    }
      .tablecontent{
        border-radius: 10px 10px 0 0;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
        width: 100%;
       
    }
  
#thead {
    background: #008080;
    color: white;
    height: 50px;
    text-align: center;
}
h1 {
    text-align: center;

}
  #contenu {
    text-align : center;
    
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
    <div>
        <div class="container">
       
            <h1>Listes des tâches pour un nouveau stagiaire</h1></br>
        </div>
       <div>
      <center>
        <a href="Tache.vue.ajout.php" class="btn btn-success" id="ajout">Ajouter un nouveau tâche</a></br></br>
      </center> 
       </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

        <div class="panel-body">
        <table class="tablecontent">
            <thead id="thead">
            <tr>
                <th>Titre</th>
                <th>Descriptions</th>
                <th>Durée</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                
            
<?php
            foreach ($retour_tous_tache as $chaque_elements) 
            {
            echo('
            <tr>
                <td id="contenu">'. $chaque_elements["titre_tache"].'</td>
                <td id="contenu">'.$chaque_elements["description_tache"].'</td>
                <td id="contenu">'.$chaque_elements["dure_tache"] . '</td>
                <td id="contenu">
                    <a href="Tache.vue.modif.php?num_tache='.$chaque_elements["num_tache"].'" class="btn btn-primary">Modifier</a>
                    <a href="Tache.vue.supr.php?num_tache='.$chaque_elements["num_tache"].'" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>');
            }
?>
</tbody>
        </table>
        </div>
            
            <div class="col-md-1">
                
            </div>
        </div>
        
    </div>
<?php
        }
        
    }
    $liste = new TacheVue();
    $liste -> affichageTaches();
?>
</body>