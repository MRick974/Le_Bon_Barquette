<?php
$db =new PDO("mysql:host=127.0.0.1:3306;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$_GET['id'] = 2;
if (isset($_GET["id"])){
    $id=$_GET["id"];
    $reqajout = $db->prepare("SELECT * FROM plats WHERE id = $id");
        $reqajout->bindParam(":nom",$nom);
        $reqajout->setFetchMode(PDO::FETCH_CLASS, 'Plats');
        $reqajout->execute();
        $ajout = $reqajout->fetchAll();
        var_dump($ajout);
        ajouter($ajout['->getNom()'],1, $ajout->getPrix());
}

function ajouter($libelleProduit,$qteProduit,$prixProduit) {
    if(!isset($_SESSION['panier']))
    {
     
        $_SESSION['panier'] = array(); 
        $_SESSION['panier']['libelleProduit'] = array();
        $_SESSION['panier']['qteProduit'] = array();
        $_SESSION['panier']['prixProduit'] = array();
    }
    else{
        $ajout->ajouter($_GET["id"], 2);
    
    }   
}
die(var_dump($_SESSION['panier']));
?>