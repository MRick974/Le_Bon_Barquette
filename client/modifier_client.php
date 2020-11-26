<?php

$ROOT = '../';
include("../admin/headeradmin.php");
include_once("../classes/User.php");

function dismount($object) {
    $reflectionClass = new ReflectionClass(get_class($object));
    $array = array();
    foreach($reflectionClass->getProperties() as $property) {
        $property->setAccessible(false);
        $array[$property->getName()] = $property->getValue($object);
        $property->setAccessible(false);
    }
    return $array;
}
$db = new PDO("mysql:host:127.0.0.1;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
if (isset($_GET["id"])){
    $id=$_GET["id"];
    $requete=$db->prepare("select * from user where id = $id");
    $requete->setFetchMode(PDO::FETCH_CLASS,'User');
    $requete->execute();
    $user=$requete->fetch();
}

if ($_SERVER["REQUEST_METHOD"]==="POST"){

    $user->setNom($_POST["nom"]);
    $user->setPassword($_POST["password"]);
    $user->setRoles($_POST["roles"]);
    $requete = $db->prepare("UPDATE user SET nom = :nom, password = :password, roles=:roles
                            WHERE id=:id");
    $requete->execute(dismount($user));
    header('Location: ./');

}

?>

<div class="container">
    <h4>Modification  des informations</h4>
    <form class="form" action="ajout_client.php" method="post">
        <div class="form-group">
            <label for="">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" placeholder=""></br>
             
            <label for="">Mot de Passe :</label>
            <input type="password" name="password" id="password" placeholder=""></br>

            <button type="submit" class="btn btn-primary mt-3">Modifier</button>
            <div style="background-color:red;color:white;padding:2px;margin:10px;margin-right:50%;" >
                <p> Lorsque vous cliquerez sur <strong>MODIFIER</strong> vous n'aurez pas de confirmation !</p>
            </div>
    </form>
</div>

<?php
include_once("../footer.php");

?>