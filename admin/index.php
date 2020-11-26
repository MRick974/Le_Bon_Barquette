<?php

$ROOTCSS_JS = '../';
$ROOT = '../';
include_once("./headeradmin.php");

?>

<div class="container">
    <div class="row">
        <div class="col-md-7" style="background-color:grey;text-align:center;border-radius: 10px;
                                    color:white;margin: 0 auto;width:100px; border:2px solid black;">
            <h1>Bonjour <?php echo $user->getNom(); ?></h1>
            <p>Vous pouvez désormais ajouter un plat à votre carte ! </p>
        </div>
    </div>
</div>
<?php
include_once('./footer.php');
?>