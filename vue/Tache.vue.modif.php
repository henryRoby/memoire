<?php
    include("../controler/Tache.controler.php");
    include("../controler/Categorie.controler.php");
    require_once ("dashboard.admin.php");

    $erreur = "";
    $num_tache = 0;
    $id_categorie = null;
    $titre_tache = null;
    $description_tache = null;
    $dure_tache = null;
    $instance_categorie = new CatControler();
    $retour_categorie = $instance_categorie -> listeChaqueCategorie();
    $modif_tache = new TacheControler();
    
    


    $select = $modif_tache -> listeTousTaches();

    foreach ($select as $chaque_tache) 
    {
        $id_categorie = $chaque_tache['id_categorie'];
        $titre_tache = $chaque_tache['titre_tache'];
        $description_tache = $chaque_tache['description_tache'];
        $dure_tache = $chaque_tache['dure_tache'];
    }

    if(empty($_GET['num_tache']))
    {
        echo('identifiant introuvable');
    }
    else
    {
        
        $num_tache = $_GET['num_tache'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            //echo("io fa nety amzay oh" . $_POST['marque_produit']);
            if (empty($_POST["description_tache"]) OR empty($_POST["dure_tache"]) 
            OR empty($_POST["titre_tache"]))
            {
                $erreur = "Tous les champs sont obligatoire";
            }
            else
            {                
                $modif_tache -> miseAjourTache($_POST["id_categorie"], $_POST["titre_tache"], $_POST["description_tache"],
                $_POST["dure_tache"], $num_tache);
                header('Location:Tache.vue.afficher.php');
            }
        }  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/index.css">
    <title>Modification tâche</title>
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
      .container-fluid{
        background-color: #dfdd;
        margin-top: 40px;
        width: 50%;
        border-radius : 15px;
        box-shadow : 5px 2px 5px 3px;
       padding-bottom : 10px;
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
#idmodif {
    color : white;
    font-weight: bold;
}
label {
    color : #808080;
    padding-left : 50px;
    text-decoration : underline;
}
#container-modif{
    width: 85%;
    
}
    </style>
</head>
<body>
<div class="container" id="container-modif">
<center><h1 id="idmodif">Modification du tâche</h1></center> 

    <div class="container-fluid">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?num_tache=<?php echo $num_tache ?>"></br></br>
        <div class="row">
        <span class="error"><?php echo $erreur;?></span>
            <div class="col-md-4">
                <label>Choix Catégorie :</label>
            </div>
            <div class="col-md-8">
            <select name="id_categorie" class="form-control">
                <?php
                    foreach ($retour_categorie as $chaque_elements) 
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
                <input type="text" name="titre_tache" value="<?php echo !empty($titre_tache)?$titre_tache:'';?>" class="form-control" class="form-control"/>
                </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label >Déscription du tâche : </label>
            </div>
            <div class="col-md-8">
                <textarea name="description_tache" value="" class="form-control"><?php echo !empty($description_tache)?$description_tache:'';?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Durée du tâche : </label>
            </div>
            <div class="col-md-8">
                <input type="text" name="dure_tache" value="<?php echo !empty($dure_tache)?$dure_tache:'';?>" class="form-control"/>
            </div>
        </div></br></br>
        <center>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </center>
  </form>
</div>
</body>
</html>