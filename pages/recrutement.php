
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="hamza dbani">
    <meta name="generator" content="Hugo 0.84.0">
    <title>recrutements</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="chercherStyle.css">
      
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        


    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
      .lignecolor{
        background: white;
        text-align: center;
    }
      .tablecolor{
        background: #228B22;
        color: white;
        font-weight: bold;
        font-family:serif;
        padding: 12px 15px;
        text-align: center;
    }
      .tablecontent{
        border-radius: 10px 10px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
        width: 100%;
        height: 100%;
    }
    .pagination {
     display: inline-block;

     
     }

   .pagination a {
     color: green;
     background-color: white;
     float: left;
     margin-top: 20%;
     padding: 8px 16px;
     text-decoration: none;
     border-radius: 30px 30px 30px 30px;
}
  
    </style>
 <link href="navbar-top.css" rel="stylesheet">
 
      
      
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">

  </head>
  <body>
    <br>
  <div class="container">
       
       <div class="panel panel-success margetop">
    <div  class="panel-heading" style=" display: inline-block;width: 500px;height: 100px; font-size:xx-large;">Liste des candidats</div>
  
    <form method="get" action="profilcandidat.php">
    <div class="panel panel-primary margetop">
    <div class="panel-body">
        <table class=tablecontent>
        <thead class=tablecolor>
         <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>ADRESSE</th>
            <th>DURE DE STAGE DEMANDER</th>
            <th>E-MAIL</th>
            <th>TELEPHONE</th>
            <th>ACTION</th>
            </tr>
        
        </thead>
        <tbody>
            
            <tr class=lignecolor>
            <td>RAKOTOARIMALALA</td>
            <td>Nantenaina</td>
            <td>PASSION FOR HUMANITY</td>
            <td>4 MOIS</td>
            <td>razanabelahyhenri@gmail.com</td>
            <td>0340000000</td>
            <td>
            <a href="visualisercandidat.php" ><i class="material-icons" data-toggle="tooltip" title="see">visibility</i></a>
            </td>
            </tr>
        </tbody>
        </table>
                        
        </div>
    </div>
    </form>
  </div>


  &nbsp;
  
  <!-- <div class="panel panel-success margetop">
   
    <div  class="panel-heading" style=" display: inline-block;width: 500px;height: 100px; font-size:xx-large;">Liste des taches à faire</div>
    <button type="submit" class="btn btn-success">Ajouter nouveau tache</button>
    <form method="get" action="profilcandidat.php">
    <div class="panel panel-primary margetop">
    <div class="panel-body">
        <table class=tablecontent>
        <thead class=tablecolor>
         <tr>
            <th>TITRE</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
            </tr>
        
        </thead>
        <tbody>
            
            <tr class=lignecolor>
            <td>integration</td>
            <td>faire un crud php</td>
            <td>
                <button type="submit" class="btn btn-danger">Supprimer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </td>
            </tr>
        </tbody>
        </table>
                        
        </div>
    </div>
    </form>
  </div>
      </div> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>
