<?php
    $cv_env = $_REQUEST['cv_candidat'];
    echo '<iframe src="../public/src/cv/'.$cv_env.'" width="100%" style="height:100%"></iframe>';  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $cv_env ?></title>

</head>
<body>
    
</body>
</html>