<?php 
$ROOT = './';
include_once($ROOT."classes/User.php");
session_start();
include_once('header.php');
include_once('classes/Plats.php');
$db =new PDO("mysql:host=127.0.0.1;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

$requete=$db->prepare("select * from plats");

//$requete->setFetchMode(PDO::FETCH_ASSOC);

//$resultat=$requete->fetchAll();
//var_dump($resultat);
$requete->setFetchMode(PDO::FETCH_CLASS,'Plats');
$requete->execute();
$repas=$requete->fetchAll();


?>
<head>
    
</head>
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Le Bon Barquette</h1>
                <p>Commandez votre barquette sur notre
                    site web !</p>
                <button class='btn-barq-primary'>
                    Commencez maintenant !
                </button>
            </div>
        </div>
    </div>
</section>
<section class="section-repas">
    <div class="container">
        <h1 class="text-center" id="repas">Repas du jour</h1>
        <div class="d-flex justify-content-center">
            <div class="divider"></div>
        </div>

        <div class="repas mt-5">
            <div class="container">
                <div class="row">
                    <?php foreach($repas as $plats){ ?>
                    <div class="col-md-3 mb-3"> 
                        <a href="admin/plat/details.php?id=<?php echo $plats->getId(); ?>">
                            <div class="barq-card">
                                <div class="barq-card-img">
                                    <img src="img/logo.png" class="img-fluid" alt="">
                                </div>
                                <div class="barq-card-body">
                                    <a href="admin/plat/details.php?id=<?php echo $plats->getId(); ?>" class="barq-link">
                                        <h4><?php echo $plats->getNom(); ?></h4>
                                    </a>
                                    <p class="price"><?php echo $plats->getPrix()."€";?></p>
                                    <div style="padding-left:30px;position:static;">
                                    <a href="client/panier/fonctionpanier.php?id=<?php echo $plats->getId(); ?>" class="barq-link">
                                        <button class="btn-barq-primary">Commander<i class="fas fa-plus" style="margin-left:10px;"></i></button>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include_once('footer.php') ?>