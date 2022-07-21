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
        {?>
            <script>
                alert("Vous n'êtes pas administrateur du site")
            </script>
        <?php   
        }
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="text" name="Admin" placeholder="Nom user">
        <input type="password" name="Mdp_Admin" placeholder="mot de passe">
        <input type="submit" placeholder="Envoyez">
    </form>
    
</body>
</html>