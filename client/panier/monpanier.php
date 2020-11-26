<?php

include("../classes/Panier.php");
$db =new PDO("mysql:host=127.0.0.1:3306;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* Démarrage ou prolongation de la session */
session_start();

/* On vérifie l'existence du panier, sinon, on le crée */
if(!isset($_SESSION['panier']))
{
    /* Initialisation du panier */
    $_SESSION['panier'] = array();
    /* Subdivision du panier */
    $_SESSION['panier']['libelleProduit'] = array();
    $_SESSION['panier']['qteProduit'] = array();
    $_SESSION['panier']['prixProduit'] = array();
}


array_push($_SESSION['panier']['libelleProduit'],$select['libelleProduit']);
array_push($_SESSION['panier']['qteProduit'],$select['qteProduit']);
array_push($_SESSION['panier']['prixProduit'],$select['prixProduit']);

/* Affichons maintenant le contenu du panier : */

?>

<form method="post">
<input type="number" name="idplat" id="idplat" placeholder="">
<input type="number" name="iduser" id="iduser" placeholder="">
<input type="submit" name="">
</form>