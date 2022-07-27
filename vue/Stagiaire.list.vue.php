<?php
    include("../controler/Stagiaire.controler.php");
    require_once("dashboard.admin.php");
    class ListeStg
    {
        public $id_categorie;
        public $num_rdv;
        public $nom_stgiaire;
        public $prenom_stagiaire;
        public $email_stagiaire;
        public $niveau_stagiaire;
        public $debut_stage;
        public $fin_stage;
        public $mdp_stagiaire;  
        public $photo;
        public function affichageStagiaire()
        {
            $aff = new StaControler();
            $retour_tous_stg = $aff -> parcourirStagiaire();
            
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
    padding-bottom: 10px;
    color: white;
  }
#h1tache {
    color: white;
    margin-top : 80px;
}
body {
   overflow-x: hidden; 
}

#reduire_img{
    height: 20%;
    width: 20%;
}
    </style>

</head>

    <div>
        <div class="container-fluid">
       
            <h1 id="h1tache">Listes des nouveaux stagiaires</h1></br>
        </div>
       <div>
       </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">

        <div class="panel-body">
        <table class="tablecontent">
            <thead>
            <tr>
                <th id="thead">Profil</th>
                <th id="thead">Nom</th>
                <th id="thead">Prenom</th>
                <th id="thead">Email</th>
                <th id="thead">Niveau</th>
                <th id="thead">Debut</th>
                <th id="thead">Fin</th>
                <th id="thead">Categorie</th>
            </tr>
            </thead>
            <tbody>
                
            
<?php
            foreach ($retour_tous_stg as $chaque_elements) 
            {
            echo('
            <tr>
                <td id="contenu">
                    <img id="reduire_img" src="../public/photo/' . $chaque_elements["photo"] .'"/>
                </td>
                <td id="contenu">'. $chaque_elements["nom_stagiaire"].'</td>
                <td id="contenu">'. $chaque_elements["prenom_stagiaire"].'</td>
                <td id="contenu">'.$chaque_elements["email_stagiaire"].'</td>
                <td id="contenu">'.$chaque_elements["niveau_stagiaire"].'</td>
                <td id="contenu">'.$chaque_elements["debut_stage"].'</td>
                <td id="contenu">'.$chaque_elements["fin_stage"].'</td>
                <td id="contenu">'.$chaque_elements["types"] . '</td>
            </tr>');
            }
?>
</tbody>
        </table>
        </div>
            
            <div class="col-md-0">
                
            </div>
        </div>
        
    </div>
<?php
        }
        
    }
    $liste = new ListeStg();
    $liste -> affichageStagiaire();
?>