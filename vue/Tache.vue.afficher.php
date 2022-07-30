<?php
    include("../controler/Tache.controler.php");
    require_once("dashboard.admin.php");
    class TacheVue
    {

        public $titre_tache= "";
        public $description_tache = "";
        public $dure_tache ="";
        public $niv_stag ="";
        public function affichageTaches()
        {
            $aff = new TacheControler();
            $retour_tous_tache = $aff -> listeTousTaches();
            
?>
<!DOCTYPE html>
<html lang="en">
<head>

<style> 

/* style liste des taches stagiaires */
.lignecolor{
        background: white;
        text-align: center;
    }
#thead {
    background: #008080;
    color: white;
    text-align: center ;
    padding-left: 10px;
}
h1 {
    text-align: center;

}
  #contenu {
    text-align : center;
    
  }

  #logo{
        width: 250px;
        height: auto;
       
    }
      .lignecolor{
        background: white;
        text-align: center;
    }
      .tablecontent{
        width: 90%;
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
    text-align : center !important;
    
    color: white;
   
  }
#h1tache {
    color: white;
    margin-top : 80px;
}
tbody {
    white-space:normal;
    width : 32px !important;
}
body{
    overflow-x: hidden; 
}
    </style>

</head>
    <div>
        <div class="container-fluid">
       
            <h1 id="h1tache">Listes des tâches pour un nouveau stagiaire</h1></br>
        </div>
       <div>
       </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

        <div class="panel-body">
        <table class="tablecontent">
            <thead>
            <tr>
                <th id="thead">Titre</th>
                <th id="thead">Déscriptions</th>
                <th id="thead">Durée</th>
                <th id="thead">Niveau</th>
                <th id="thead">Actions</th>
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
                <td id="contenu">'.$chaque_elements["dure_tache"] .' H' .'</td>
                <td id="contenu">'.$chaque_elements["niv_stag"] . '</td>
                <td id="contenu"></br>
                    <a href="Tache.vue.modif.php?num_tache='.$chaque_elements["num_tache"].'" class="btn btn-primary">Modifier</a>
                    <a href="Tache.vue.supr.php?num_tache='.$chaque_elements["num_tache"].'" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>');
            }
?>
</tbody>
        </table>
        </div> 
            <div class="col-md-2">
                
            </div>
        </div>
        
    </div>
<?php
        }
        
    }
    $liste = new TacheVue();
    $liste -> affichageTaches();
?>
