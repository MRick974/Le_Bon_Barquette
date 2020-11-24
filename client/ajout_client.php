<?php

    include("../classes/Client.php");
    $db =new PDO("mysql:host=127.0.0.1:3306;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["nom"])){

        $client=new Client();
        $client->setId(NULL);
        $client->setNom($_POST["nom"]);
        $client->setPrenom($_POST["prenom"]);
        $client->setEmail($_POST["email"]);
        $client->setPassword($_POST["mdp"]);
        
        $requete=$db->prepare("INSERT INTO client (id,nom,prenom,email,password) 
                                values (:id,:nom,:prenom,:email,:password)");
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
            <input type="text" name="nom" id="nom" class="form-control" placeholder="">
            
            <label for="">Prenom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="">
            
            <label for="">Email</label>

            <input type="email" name="email" id="email" class="form-control" placeholder=""></br>
             
            <label for="">Mot de Passe :</label>
            <input type="password" name="mdp" id="mdp"></br>

            <button type="submit" class="btn btn-primary mt-3" action="ajout_client.php">S'inscrire</button>
        </div>
    </form>
</div>

<?php
    include_once("./footer.php");
?>