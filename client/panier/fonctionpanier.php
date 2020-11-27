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
        $ajout = $reqajout->fetch();
        var_dump($ajout);
}

?>