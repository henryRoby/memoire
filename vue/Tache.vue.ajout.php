<?php
    include("../controler/Tache.controler.php");
    include("../controler/Categorie.controler.php");
    require_once ("dashboard.admin.php");
    $erreur = "";
    $ap_categorie = new CatControler();
    $retr_categorie = $ap_categorie -> listeChaqueCategorie();
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["id_cat"]) AND empty($_POST["titre"]) AND empty($_POST["description"]) 
        AND empty($_POST["dure"]))
        {
            $erreur = "le champ est obligatoire";
        }
        else
        {
            $nouv_ajout_tache = new TacheControler();
            
            $nouv_ajout_tache->nouvelleTache($_POST["id_cat"], $_POST["titre"], $_POST["description"], $_POST["dure"]);
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
  

<style>
     body{
    background: url(../images/fond.jpg);
    background-attachment: fixed;
    background-size: cover;
}
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
      .container-fluid{
        background-color: #dfdd;
        margin-top: 130px;
        width: 45%;
        border-radius : 15px;
        box-shadow : 5px 2px 5px 3px;
       padding-bottom : 10px;
    }
    #soumettre {
        margin-bottom: 50px;
    }

    label{
        font-weight: bolder;
    }
    .row {
        margin-top: 10px;
        padding-right : 10px;
    }
    #desc {
        margin-bottom: 15px;
        
    }
#idajouttache {
    color : #808080;
}
label {
    color : #808080;
    padding-left : 50px;
    text-decoration : underline;
}
    </style>

  </head>
</head>
<body>
    
<div class="container-fluid">
<br>
     <center><h1 id="idajouttache">Ajouter un nouveau tache</h1></center> 
    <br> 
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="row">
            <div class="row">
            <div class="col-md-4">
                    <span class="error"><?php echo $erreur;?></span>
                    <label>Choix Catégorie:</label>
                </div>
                
                <div class="col-md-8">
                    <select name="id_cat" class="form-control">
                        <?php
                            foreach ($retr_categorie as $chaque_elements) 
                            {
                                echo('<option value =" ' .$chaque_elements['id_categorie'] . ' ">' .$chaque_elements['types'] . '</option>');
                            }
                        ?>
                    </select>
                </div>
            </div>
           

        <div class="row">
             <div class="col-md-4">
                <label>Titre du tâche : </label>
             </div>   
             <div class="col-md-8">
                <input type="text" name="titre" class="form-control"/>
             </div>            

        </div>
        
        <div class="row">
             <div class="col-md-4">
             <label>Durée du tâche : </label>
             </div>   
             <div class="col-md-8">
             <input type="text" name="dure" class="form-control"/>
             </div>            

        </div>
      
        <div class="row" id="desc">
            <div class="col-md-4">
            <label >Déscription du tâche : </label>
            </div>
            <div class="col-md-8">
            <textarea name="description" class="form-control"></textarea>
            </div>
        </div>
                            <center>
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </center>
      
    </form> 
    </div>  
</body>
</html>