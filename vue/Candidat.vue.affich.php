<?php
    include("../controler/Candidat.controler.php");
    require_once ("dashboard.admin.php");
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

   

<style> 
      .lignecolor{
        background: white;
        text-align: center;
    }

  
#thead {
    background: #008080;
    color: white;
    height: 50px;
    text-align: center !important;
}
h1 {
    text-align: center;

}
  #contenu {
    padding-top: 10px;
    color: white;
  }
  .h1cand {
    color : white;
  }
    </style>


  </head>
</head>
<body>
    <div>
        <div class="container">
       
            <h1 class="h1cand">Listes des candidats</h1></br>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

        <div class="panel-body">
        <table class="tablecontent">
            <thead >
            <tr>
                <th id="thead">E-mail CANDIDAT</th>
                <th id="thead">CV CANDIDAT</th>
                <th id="thead">LM CANDIDAT</th>
                <th id="thead">Actions</th>
            </tr>
            </thead>
            <tbody>

<?php


            foreach ($retour_tous_candidat as $chaque_elements) 
            {
            echo('
            <tr>
                <td id="contenu">'. $chaque_elements["email_candidat"].'</td>
                <td id="contenu">'.$chaque_elements["cv_candidat"] .'</td>
                <td id="contenu">'.$chaque_elements["lm_candidat"] . '</td>
                <td id="contenu">
                    <a href="" class="btn btn-info">Accépter</a>&nbsp;&nbsp;&nbsp;
                    <a href="" class="btn btn-danger">Réfuser</a>
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