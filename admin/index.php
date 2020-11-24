<?php

$ROOTCSS_JS = '../';
$ROOT = './';
include_once("./headeradmin.php");



?>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: connexion.php');
}

$bdd = new PDO('mysql:host=127.0.0.1;dbname=lebonbarquette', 'root', '');
$user = $_SESSION;
?>

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h1>Bonjour <?php echo $user['nom']; ?></h1>
            <p>Vous pouvez désormais ajouter un plat à votre carte ! </p>
        </div>
    </div>
</div>
<?php
include_once('./footer.php');
?>