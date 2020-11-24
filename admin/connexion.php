<?php

$ROOTCSS_JS = '../';
$ROOT = './';
include_once("./header.php");
//include_once("././User.php");

?>
<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location: index.php");
}

$bdd = new PDO('mysql:host=127.0.0.1;dbname=lebonbarquette', 'root', '');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $password = htmlspecialchars($_POST['password']);


    if (!empty($nom) and !empty($password)) {
        $requser = $bdd->prepare("SELECT * FROM user WHERE nom = ? ");
        $requser->execute(array($nom));
        $user = $requser->fetch();
        $hash = $user['password'];
        if (password_verify($password, $hash)) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['roles'] = $user['roles'];
            header("Location: index.php");
        } else {
            header("Location: connexion.php");
            $erreur = "Mauvais mail ou mot de passe !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
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