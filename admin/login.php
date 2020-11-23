<?php 
session_start();
$db =new PDO("mysql:host=127.0.0.1;dbname=lebonbarquette","root","");

if (isset($_POST['nom']) && isset($_POST['password'])) {
    $nom =$_POST['nom'];
    $password = $_POST['password'];
    
    $sql ="SELECT * FROM admin where nom = '$nom' ";
    $result = $db->prepare($sql);
    $result->execute();

    if($result->rowCount()> 0)
    {
        $data = $result->fetch();
        $_SESSION['nom'] = $nom;
        $_SESSION['password'] = $password;
     header('Location: index.php');
        
    }
    else 
    {
        header('Location: connexion.php');
        
    }
} 




?>