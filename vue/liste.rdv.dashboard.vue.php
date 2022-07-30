<?php
    include("../controler/Rendezvous.controler.php");
    require_once("dashboard.admin.php");
    class RendezvousVue
    {

        public $id_candidat= 0;
        public $date_rdv = "";
        public $heure_rdv ="";
        public function affichageRdv()
        {
            $aff = new RdvControler();
            $retour_tous_rdv = $aff -> listeChaqueRdv();

            
?>
<!DOCTYPE html>
<html lang="en">
<head>

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
    footer{
      background-color:#212121;
      color: #fff;
    }

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
    padding-top: 10px;
    color: white;
    font-size : 20px;
  }
#h1tache {
    color: white;
    margin-top : 80px;
}
body {
   overflow-x: hidden; 
   background: url(../images/fond.jpg);
    background-attachment: fixed;
    background-size: cover;
}
    </style>

</head>

    <div>
        <div class="container-fluid">
       
            <h1 id="h1tache">Listes des rendez-vous candidats</h1></br>
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
                <th id="thead">Candidat</th>
                <th id="thead">Date rendez-vous</th>
                <th id="thead">Heure</th>
                <th id="thead">Action</th>
            </tr>
            </thead>
            <tbody>
                
            
<?php
            foreach ($retour_tous_rdv as $chaque_elements) 
            {
            echo('
            <tr>
                <td id="contenu">'. $chaque_elements["email_candidat"].'</td>
                <td id="contenu">'.$chaque_elements["date_rdv"].'</td>
                <td id="contenu">'.$chaque_elements["heure_rdv"] . '</td>
                <td id="contenu"><a href="Supression.rdv.vue.php?num_rdv='.$chaque_elements["num_rdv"].'" class="btn btn-danger">Supprimer</a></td>
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
    $liste = new RendezvousVue();
    $liste -> affichageRdv();
?>

