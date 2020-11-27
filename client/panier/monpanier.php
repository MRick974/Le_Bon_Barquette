<?php
$ROOTCSS_JS = '../../';
$ROOT = '../../';
include_once($ROOT."classes/Panier.php");
include_once($ROOT."classes/Plats.php");
session_start();
$panier = $_SESSION['panier'];
var_dump($panier);
 /*

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



include_once($ROOT."client/header.php");

?>


<div class="liste-plats">
    <h1>Votre commande</h1>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Libellé</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($panier as $produit) { ?>
                    <tr>
                        <td><?php echo $produit->getLibelle();?></td>
                        <td><?php echo $produit->getPrix();?> €</td>
                        <td><?php echo $produit->getQteproduit();?></td>
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