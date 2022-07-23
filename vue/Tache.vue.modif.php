<?php
    include("../controler/Tache.controler.php");
    include("../controler/Categorie.controler.php");
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
    <title>Modification produit</title>
</head>
<body>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?num_tache=<?php echo $num_tache ?>">
        <span class="error"><?php echo $erreur;?></span>
        <?php
var_dump($num_tache); 
?>
        <label>Choix Categorie :</label>
        <select name="id_categorie">
<?php
    foreach ($retour_categorie as $chaque_elements) 
    {
        echo('<option value =" ' .$chaque_elements['id_categorie'] . ' ">' .$chaque_elements['types'] . '</option>');
    }
?>
        </select>
        <?php
var_dump($titre_tache); 
?>
        <br/><br/>
        <label>Titre du tache : </label>
        <input type="text" name="titre_tache" value="<?php echo !empty($titre_tache)?$titre_tache:'';?>"/>
        <br/><br/>
        <label >Description du tache : </label>
        <textarea name="description_tache" value="" ><?php echo !empty($description_tache)?$description_tache:'';?></textarea>
        <br/><br/>
        
        <label>Durée du tache : </label>
        <input type="text" name="dure_tache" value="<?php echo !empty($dure_tache)?$dure_tache:'';?>"/>
        <br/><br/>
        <button type="submit">Modifier</button>
    </form>   
</body>
</html>