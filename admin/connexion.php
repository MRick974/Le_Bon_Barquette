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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="icons/css/fontawesome.css" rel="stylesheet">
    <link href="icons/css/brands.css" rel="stylesheet">
    <link href="icons/css/solid.css" rel="stylesheet">
</head>
<style>@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap');
body{
    background-color: white;
}
.page{
    position: absolute;
    left: 50%;
    top: 55%;
    transform: translate(-50%, -50%);
    background-color: beige;
    border-radius: 20px;
    padding: 10px;
    max-width: 350px;
}
.header{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.header h1{
    font-family: 'Noto Sans JP', sans-serif;
}
.header p{
    text-align: center;
    margin-top: -2px;
    padding-left: 30px;
    padding-right: 30px;
    font-family: 'Open Sans', sans-serif;
}
.form{
    margin-top: 10px;
    margin-left: 10px;
    margin-right: 10px;
    display: flex;
    flex-direction: column;
}
.form input::placeholder{
    color: rgb(172, 172, 172);
    font-family: 'Open Sans', sans-serif;
}
.form input[type="text"]{
    background-color: #fff;
    border: none;
    border-radius: 10px;
    padding: 1em;
    font-size: 13px;
    outline: none;
}
.form input[type="password"]{
    margin-top: 10px;
    background-color: #fff;
    border: none;
    border-radius: 10px;
    padding: 1em;
    font-size: 13px;
    outline: none;
}

button{
    margin-top: 30px;
    background-color: #000;
    color: #fff;
    border:none;
    border-radius: 10px;
    padding: 1em;
    outline: none;
    cursor: pointer;
    font-weight: bold;
}

.img {
    width: 600px;
}
@media screen and (max-width:640px){
    .page{
        margin-bottom: 10px;
        width: 300px;
    }
    .eye{
        margin-left: 250px;
    }
}</style>
<body>
    <div class="page">
        <div class="header">
            <a href="<?php echo $ROOT?>index.php"><img class="img" src="<?php echo $ROOT ?>img/lebonbarquette.png"></a>

            <h1>Connexion</h1>

            <p></p>
        </div>
    <form class="form" action="" method="post" enctype="multipart/form-data">
        <div class="form">

            <input type="text" name="nom" id="nom" placeholder="Nom">
            <input type="password" name="password" id="password" placeholder="Password">
            
            <button type="submit">Se connecter <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
        </div>

        
    </form>
        

        

    </div>
</body>
<!--<form class="form" action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" placeholder="">
        <label for="">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="">
        <button type="submit" class="btn btn-primary mt-3" action="">Se connecter</button>
    </div>
</form>-->
<?php
if (isset($erreur)) {
    echo '<div class="alert alert-danger" role="alert">' . $erreur . ' </div>';
}
?>
<?php
include_once('./footer.php');
?>