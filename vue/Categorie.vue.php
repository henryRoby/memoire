<?php
    require_once("../controler/Categorie.controler.php");
    require_once ("dashboard.admin.php");
    $type_err = ""; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (empty($_POST["type"]))
        {
            $type_err = "le champ est obligatoire";
        }
        else{
            $newAjout = new CatControler();
            $newAjout->checkAjoutCategorie($_POST["type"]);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Categorie</title>
</head>
<body>
    <div style="margin-left:25%">
    <div class="w3-container w3-teal">
        <h1>Categorie  du stage</h1>
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <span class="error"><?php echo $type_err;?></span>
            <br/><br/>
            <label> Categorie du stage : </label><input type="text" name="type">
            <br/><br/>
            <input type="submit" name="submit" value="Ajouter">
        </form>
    </div> 
</body>
</html>