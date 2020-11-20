<?php
$ROOT = '../../';
require("../../header.php");

include_once('../../classes/Plats.php');

$db =new PDO("mysql:host=127.0.0.1;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

if (isset($_GET["id"])){
    $id=$_GET["id"];
    $requete=$db->prepare("select * from plats where id = $id");
    $requete->setFetchMode(PDO::FETCH_CLASS,'Plats');
$requete->execute();

$repas=$requete->fetch();
}


//$requete->setFetchMode(PDO::FETCH_ASSOC);

//$resultat=$requete->fetchAll();
//var_dump($resultat);



?>
<section class="details-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="image-repas">
                    <img src="../../<?php if(!is_null($repas->getPhoto())){echo $repas->getPhoto();}else {} ?>" class="img-fluid" alt="image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-content">
                    <h1><?php echo $repas->getNom(); ?></h1>
                    <p class="description"><?php echo $repas->getDetail(); ?></p>
                    <p class="price"><?php echo $repas->getPrix(); ?> €</p>
                    <div class="text-center">
                        <button class="btn-barq-primary">Commander</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once("../footer.php");

?>