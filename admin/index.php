<?php

$ROOTCSS_JS = '../';
$ROOT = '../';
include_once("./headeradmin.php");

?>

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h1>Bonjour <?php echo $user->getNom(); ?></h1>
            <p>Vous pouvez désormais ajouter un plat à votre carte ! </p>
        </div>
    </div>
</div>
<?php
include_once('./footer.php');
?>