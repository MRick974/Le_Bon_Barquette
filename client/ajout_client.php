<?php

    include("../classes/User.php");
    $db =new PDO("mysql:host=127.0.0.1:3306;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["nom"])){

        $client=new User();
        $mdp = $_POST['password'];
        $mdpcrypt = password_hash($mdp,PASSWORD_ARGON2ID); // et on récupere le mot de passe crypter.
        $client->setId(NULL);
        $client->setNom($_POST["nom"]);
        $client->setPassword($mdpcrypt);
        $client->setRoles("ROLE_USER");
        
        $requete=$db->prepare("INSERT INTO user (id,nom,password,roles) 
        values (:id,:nom,:password,:roles)");
        $requete->execute(dismount($client));
        header('Location:./');
    }
    
    //Permet de réfléter la base de données
    function dismount($object) {
        $reflectionClass = new ReflectionClass(get_class($object));
        $array = array();
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($object);
            $property->setAccessible(false);
        }
        return $array;
    }
    $ROOTCSS_JS = '../';
    $ROOT = '../';
    include_once("./header.php");

?>

<div class="container">
    <h4>Inscription</h4>
    <form class="form" action="ajout_client.php" method="post">
        <div class="form-group">
            <label for="">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" placeholder=""></br>
             
            <label for="">Mot de Passe :</label>
            <input type="password" name="password" id="password"></br>

            <button type="submit" class="btn btn-primary mt-3">S'inscrire</button>
        </div>
    </form>
</div>

<?php
    include_once("./footer.php");
?>