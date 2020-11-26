<?php 

    $ROOTCSS_JS = '../';
    $ROOT = '../';
    include_once("../client/header.php");

?>

<div class="container" style="margin-left:50%;">
    <a href="../client/ajout_client.php"><button type="button" name="coclient" id="coclient" class="btn btn-primary" btn-lg btn-block>Inscription</button></a>
    <a href="../admin/connexion.php"><button type="button" name="inclient" id="inclient" class="btn btn-primary" btn-lg btn-block> Connexion </button></a>
</div>

<?php
    include_once('../client/footer.php');
?>