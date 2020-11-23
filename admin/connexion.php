<?php 
include("login.php");

$ROOTCSS_JS = '../';
    $ROOT = './';
    include_once("./header.php");
    
    ?>

    <form class="form" acton="login.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" placeholder="">
            <label for="">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="">
            <button type="submit" class="btn btn-primary mt-3" action="">Se connecter</button>
        </div>
    </form>
    <?php

    ?>
<?php
    include_once('./footer.php');
?>