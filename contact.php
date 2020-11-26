<?php
$ROOT = './';
$ROOTCSS_JS = './';

?>
<head>
<title>Contact</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/sidebar.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/admin/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>

<header>
    <div class="sidebar_btn">
        <span><i class="fa fa-bars"></i></span>
    </div>
    <div class="left_area">
    <a href="./"><h3>Le Bon Barquette</h3></a>
    </div>
    <div class="left_area">
        <h3>Formulaire de Contact</h3>
    </div>
</header>
<div class="sidebar toggled">
    <h4>Menu</h4>
    <a href="./"><i class="fa fa-home"></i><span>Accueil</span></a>
    <a href="client/index.php"><i class="fa fa-file-alt"></i><span>Inscription/Connexion</span></a>
    <a href="./#repas"><i class="fa fa-utensils"></i><span>Repas</span></a>
</div>
<div class="container content">

<div class="container" id="coordonnees">
    <fieldset>
      <legend><strong>------------Nos coordonnées------------</strong></legend>
      Administrateur : Bob POPOVICH<br>
      GSM : 0692 12 34 56<br>
      Fix Le Bon Barquette : 0692 12 34 56<br>
      Email : administrateur@lebonbarquette.re<br>
    </fieldset>
</div>
<div class="container" style="font-weight:600;text-align:center;">
 <span></span><p> <strong>NB :</strong> la commande de repas s'effectue uniquement sur le site et par GSM,</br> l'adresse email est didié pour les soucis que vous rencontrerez sur votre compte.</p>
</div>
<?php

include('client/footer.php');

?>