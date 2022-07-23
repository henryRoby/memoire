<?php
session_start();
require_once("../controler/Tache.controler.php");
require_once("../controler/Stagiaire.controler.php");
$stg = new StaControler();
$stg_tache_cat = new TacheControler();
$la_stg = $stg -> suisConnecter($_SESSION["stagiaire_connecter"]);
var_dump($categorie = $la_stg['id_categorie']);
var_dump($stg_tache_cat ->listeTachesParCategorie($categorie));
?>