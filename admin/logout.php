<?php 
session_start();
if(isset($_SESSION['id'])){
    session_destroy();
    header('Location: connexion.php');
}else {
    header('Location: connexion.php');
}

?>