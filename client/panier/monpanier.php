<?php /*

include("../classes/Panier.php");
$db =new PDO("mysql:host=127.0.0.1:3306;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 Démarrage ou prolongation de la session 
session_start();

/* On vérifie l'existence du panier, sinon, on le crée 
if(!isset($_SESSION['panier']))
{
     Initialisation du panier 
    $_SESSION['panier'] = array();
     Subdivision du panier 
    $_SESSION['panier']['libelleProduit'] = array();
    $_SESSION['panier']['qteProduit'] = array();
    $_SESSION['panier']['prixProduit'] = array();
}


array_push($_SESSION['panier']['libelleProduit'],$select['libelleProduit']);
array_push($_SESSION['panier']['qteProduit'],$select['qteProduit']);
array_push($_SESSION['panier']['prixProduit'],$select['prixProduit']);

 Affichons maintenant le contenu du panier : 
*/
$ROOTCSS_JS = '../../';
$ROOT = '../../';

include_once($ROOT.'classes/Plats.php');
include_once($ROOT."client/header.php");
include_once($ROOT."classes/Panier.php");
include_once("fonctionpanier.php");
session_start();
?>


<div class="liste-plats">
    <h1>Liste des plats</h1>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Miniature</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ajout as $plat) { ?>
                    <tr>
                        <td><img src="<?php echo $ROOT."img/".$plat->getPhoto();?>" width="50" alt=""></td>
                        <td><?php echo $plat->getNom();?></td>
                        <td><?php echo $plat->getPrix();?> €</td>
                        <td>
                            <a href="<?php echo $ROOT?>fonctionpanier.php?id=<?php echo $plat->getId();?>" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="fonctionpanier.php?id=<?php echo $plat->getId();?>" class="btn btn-danger text-light">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php 

include_once($ROOT."client/footer.php");

?>