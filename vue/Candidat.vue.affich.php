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
    <meta charset="utf-8">

    <title>Candidats</title>
<style> 
      .lignecolor{
        background: white;
        text-align: center;
    }

    body {
   overflow-x: hidden; 
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
    padding-bottom : 15px
  }
  .h1cand {
    color : white;
  }

 
    </style>


  </head>
<body>
    <div>
        <div class="container">
            <h1 class="h1cand">Listes des candidats</h1></br>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-9">

        <div class="panel-body">
        <table class="tablecontent">
            <thead>
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
                <td id="contenu"><a href="Affichage.pdf.php?cv_candidat='.$chaque_elements["cv_candidat"].'" target="_blank">'.$chaque_elements["cv_candidat"] .'</a></td>
                <td id="contenu"><a href="Affichage.lm.php?lm_candidat='.$chaque_elements["lm_candidat"].'" target="_blank">'.$chaque_elements["lm_candidat"] .'</a></td>
                <td id="contenu">
                    <a href="Confirme.rdv.vue.php?id_candidat='.$chaque_elements["id_candidat"].'" class="btn btn-info">Accépter</a>&nbsp;&nbsp;&nbsp;

                    <a href="Candidat.vue.refuser.php?id_candidat='.$chaque_elements["id_candidat"].'" class="btn btn-danger">Réfuser</a>
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


