<?php 

$ROOTCSS_JS = '../';
    $ROOT = './';
    include_once("../client/header.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="<?php echo $ROOTCSS_JS ?>css/admin/style.css">
        
    </head>
    <body>
        <a href="../client/ajout_client.php"><input type="button" name="coclient" id="coclient" class="btn btn-primary" btn-lg btn-block value="Inscription"></a>
        <a href="../admin/connexion.php"><button type="button" name="inclient" id="inclient" class="btn btn-primary" btn-lg btn-block> Connexion </button></a>
    </body>

</html>

<?php
    include_once('../client/footer.php');
?>