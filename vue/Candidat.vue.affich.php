<?php
    include("../controler/Candidat.controler.php");
    class CandidatVue
    {

        public $email_candidat= "";
        public $cv_candidat = "";
        public $lm_candidat ="";
        public function affichageCandidat()
        {
            $aff = new CandControler();
            $retour_tous_candidat = $aff -> ParcCandidat();
            
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
       
            <h1>Listes des candidat</h1></br>
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
                <th>E-mail CANDIDAT</th>
                <th>CV CANDIDAT</th>
                <th>LM CANDIDAT</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

<?php
    // $filename = 'test.pdf';
      
    // // Header content type
    // header('Content-type: application/pdf');
      
    // header('Content-Disposition: inline; filename="' . $filename . '"');
      
    // header('Content-Transfer-Encoding: binary');
      
    // header('Accept-Ranges: bytes');
      
    // // Read the file
    // @readfile($filename);

            foreach ($retour_tous_candidat as $chaque_elements) 
            {
            echo('
            <tr>
                <td id="contenu">'. $chaque_elements["email_candidat"].'</td>
                <td id="contenu"><a href="quelquechose">'.$chaque_elements["cv_candidat"] .'</a></td>
                <td id="contenu">'.$chaque_elements["lm_candidat"] . '</td>
                <td id="contenu">
                    <a href="" class="btn btn-info">Accepter</a>
                    <a href="" class="btn btn-danger">Refuser</a>
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
    $liste = new CandidatVue();
    $liste -> affichageCandidat();
?>
</body>