
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
        <h4>Menu</h4>
        <a href="<?php echo $ROOT?>"><i class="fa fa-home"></i><span>Accueil</span></a>
        <!--<a href="<?php echo $ROOT?>plat/"><i class="fa fa-drumstick-bite"></i><span>Repas</span></a>-->
        <a href="<?php echo $ROOT?>contact.php"><i class="fa fa-phone"></i><span>Contact</span></a>
        <a href="<?php echo $ROOT?>"><i class="fa fa-user-shield"></i><span>Administration</span></a>
    </div>

    <div class="container content">