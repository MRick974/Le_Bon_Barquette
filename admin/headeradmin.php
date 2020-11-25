<?php
$ROOTCSS_JS = "../";
$ROOT = "../";

include_once($ROOT."classes/User.php");
session_start();
$user = $_SESSION['user'];


//var_dump($_SESSION);
if ($user->getRoles()==='ROLE_USER') {
    header('Location: ../index.php');
}
?>
<head>
    <title>Accueil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $ROOTCSS_JS ?>css/admin/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>

    <header>
        <div class="sidebar_btn">
            <span><i class="fa fa-bars"></i></span>
        </div>
        <div class="left_area">
        <a href="<?php echo $ROOT?>"><h3>Le Bon Barquette</h3></a>
        </div>
        <div class="right_area">
            <a href="<?php echo $ROOT?>admin/logout.php" class="logout_btn">Déconnexion</a>
        </div>
    </header>

    
    <div class="sidebar toggled">
        <h4>Admin</h4>
        <a href="<?php echo $ROOT?>admin/"><i class="fa fa-tachometer-alt"></i><span>Dashboard</span></a>
        <a href="<?php echo $ROOT?>admin/plat/"><i class="fa fa-columns"></i><span>Liste des repas</span></a>
        <a href="<?php echo $ROOT?>admin/details_client.php"><i class="fa fa-users"></i><span>Liste des clients</span></a>
        <a href="<?php echo $ROOT?>admin/plat/ajout_plat.php"><i class="fa fa-plus"></i><span>Ajouter un repas</span></a>
    </div>

    <div class="container content">