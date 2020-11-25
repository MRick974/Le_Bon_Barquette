<?php

$ROOTCSS_JS = '../';
$ROOT = '../';
include_once("./header.php");
include_once($ROOT."classes/User.php");

?>
<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location: index.php");
}

$bdd = new PDO('mysql:host=127.0.0.1;dbname=lebonbarquette', 'root', '');

/*$nom =htmlspecialchars($_POST['nom']);
$password = htmlspecialchars($_POST['password']);
$query = "SELECT * FROM user WHERE nom =:nom";
$requete = $bdd->prepare(':nom', $nom);
$requete->execute();
$requete->setFetchMode(PDO::FETCH_CLASS, User::class);
$result = $requete->fetch();*/
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom =htmlspecialchars($_POST['nom']);
    $password = htmlspecialchars($_POST['password']);   
    
    if (!empty($nom) and !empty($password)) {
    $requser = $bdd->prepare("SELECT * FROM user WHERE nom = :nom");
    $requser->bindParam(":nom",$nom);
    $requser->setFetchMode(PDO::FETCH_CLASS, 'User');
    $requser->execute();
    $user = $requser->fetch();
    $hash = $user->getPassword();
    
    if (password_verify($password, $hash)) {
        $_SESSION['user'] = $user;
        if($_SESSION['roles']=='ROLE_ADMIN'){
            header("Location: index.php");
        }else{
            header("Location: $ROOT./index.php");
        }

    } else {
        //header("Location: connexion.php");
        $erreur = "Mauvais nom ou mot de passe !";
    }
} else {
    $erreur = "Tous les champs doivent être complétés !";
}
}

/*if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $password = htmlspecialchars($_POST['password']);

//var_dump(password_hash('lol9774',PASSWORD_ARGON2ID));
//die();
    if (!empty($nom) and !empty($password)) {
        $requser = $bdd->prepare("SELECT * FROM user WHERE nom = ? ");
        $requser->execute(array($nom));
        $user = $requser->fetch();
        $hash = $user['password'];
        if (password_verify($password, $hash)) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['roles'] = $user['roles'];
            if($_SESSION['roles']=='ROLE_ADMIN'){
                header("Location: index.php");
            }else{
                header("Location: $ROOT");
            }

        } else {
            header("Location: connexion.php");
            $erreur = "Mauvais mail ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}*/
?>

<form class="form" action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" placeholder="">
        <label for="">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="">
        <button type="submit" class="btn btn-primary mt-3" action="">Se connecter</button>
    </div>
</form>
<?php
if (isset($erreur)) {
    echo '<div class="alert alert-danger" role="alert">' . $erreur . ' </div>';
}
?>
<?php
include_once('./footer.php');
?>