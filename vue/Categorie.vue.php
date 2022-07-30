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
</style>
<body>
    <div>
    <div class="">
        <h1>Categorie  du stage</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4"id="rowrehetra">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
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