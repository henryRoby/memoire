<?php
    require_once("../controler/Categorie.controler.php");
    // require_once ("dashboard.admin.php");
    $type_err = ""; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        $newCategorie =  new CatControler();
        $liste = $newCategorie-> listeChaqueCategorie();

        if (empty($_POST["type"]))
        {
            $type_err = "le champ est obligatoire";
        }
        else{
            $categoribool= false;
            foreach ($liste as $key => $value) {
                if ($_POST["type"] == $value["types"] ) {
                    $categoribool = true;
                }
            }

            if ($categoribool==true) {
                $type_err = "Cette categories éxiste déja !!";
            }else {
                $newAjout = new CatControler();
                $newAjout->checkAjoutCategorie($_POST["type"]);
                header("Location:Stagiaire.list.vue.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
    <title>Ajout Categorie</title>
    
</head>
<style>
#colrow {
    padding-right : 10px;
}
#rowrehetra {
    background-color: #dfdd;
    padding-top : 30px;
    padding-bottom: 5px;
    border-radius : 12px;
    width :22%;
}

body{
    background: url(../images/fond.jpg);
    background-attachment: fixed;
    background-size: cover;
}
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4"id="rowrehetra">
                <div class="">
                    <h1>Categorie  du stage</h1>
                </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <span class="error"><?php echo $type_err;?></span>
                <div class="row" >
                    <div class="col-md-4" id="colrow">
                        <input type="radio" name="type" value="Developpeur Web"> Web</br>
                        <input type="radio" name="type" value="Developpeur Mobile"> Mobile</br>
                        <input type="radio" name="type"value="Developpeur CMS"> CMS</br>
                    </div>
                    <div class="col-md-4">
                    <input type="radio" name="type"value="Integrateur"> Integrateur</br>
                    <input type="radio" name="type"value="Designer"> Designer</br>
                    <br/>
                    </div>
                </div>
                
                    <br/><br/>
                
                    
                    <input type="submit" class ="btn btn-primary" name="submit" value="Ajouter">
                </form>
            </div>
            <div class="col-md-4">
            
            </div>
        </div>
    
    </div> 
</body>
</html>