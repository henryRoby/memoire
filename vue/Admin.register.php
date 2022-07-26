<?php
    $nom_admin = "Admin";
    $mdp_admin = "Admin1234";
    global $entre_nUser;
    global $entre_mdpUser;
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        global $entre_nUser;
        global $entre_mdpUser;
        $entre_nUser = $_POST['Admin'];
        $entre_mdpUser = $_POST['Mdp_Admin'];
        if($entre_nUser === $nom_admin AND $entre_mdpUser === $mdp_admin)
        {
            header("location: Dashboard.admin.php");
        }
        else
        {  
        header("location: Admin.register.php");
        }

    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="stylesheet" href="fichier.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
  background: url(../images/fond.jpg);
  background-attachment: fixed;
  background-size: cover;
}
#login .container #login-row #login-column #login-box {
  margin-top: 160px;
  max-width: 600px;
  height: 320px;
  border-radius:5px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
  
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>
</head>
<body>
   

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <h3 class="text-center text-info">CONNEXION</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Nom  d'utilisateur:</label><br>
                                <input type="text" name="Admin" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">mot de passe:</label><br>
                                <input type="password" name="Mdp_Admin" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Se connecter">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="../pages/accueil.php" class="text-info">Retournez vers la page d'acceil</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</body>
</html>