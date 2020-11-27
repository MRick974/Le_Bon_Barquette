<?php 
//die(var_dump($_SESSION));
?>

<!doctype html>
<html lang="en">

<head>
    <title>Accueil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $ROOT?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="<?php echo $ROOT?>index.php"><img src="<?php echo $ROOT?>img/logo.png"
                    id="navbar-logo" width="100" alt="logo"></a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span>Menu</span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#repas">Repas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <?php 
                        if(isset($user)){

                            if($user->getRoles()==='ROLE_ADMIN'){
                                echo '<li class="nav-item">
                                    <a class="nav-link" href="admin/index.php">Admin</a>
                                </li>';
                            }
                        }
                    ?>
                    

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $ROOT?>client/index.php">Inscription/Connexion</a>
                    </li>
                    <li>
                    <a href="<?php echo $ROOT?>admin/logout.php" ><button class="btn btn-secondary">Déconnexion</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>