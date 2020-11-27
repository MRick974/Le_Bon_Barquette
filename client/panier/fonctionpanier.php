<?php
//var_dump($_SESSION);
session_start();
$ROOTCSS_JS = '../../';
$ROOT = '../../';
include_once($ROOT."classes/Plats.php");
include_once($ROOT."classes/Panier.php");
$db =new PDO("mysql:host=127.0.0.1:3306;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$_GET['id'] = 2;
if (isset($_GET["id"])){
    $id=$_GET["id"];
    $reqajout = $db->prepare("SELECT * FROM plats WHERE id = $id");
        $reqajout->bindParam(":nom",$nom);
        $reqajout->setFetchMode(PDO::FETCH_CLASS, 'Plats');
        $reqajout->execute();
        $ajout = $reqajout->fetch();
        
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case "ajouter": 
                    ajouter($_POST['qte'],$ajout);
                    header('location: monpanier.php');
            };

        };
        
}

function ajouter($qteProduit,$plat) {
    $panier= new Panier();
    $panier->setProduit($plat)
           ->setQteproduit($qteProduit) ;
    if(isset($_SESSION['panier'])) {
         array_push($_SESSION['panier'],$panier); 
    }
     else {
         $_SESSION['panier']= [];
         array_push($_SESSION['panier'],$panier); 
     }
    
    
        
}

?>