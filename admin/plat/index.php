<?php
$ROOTCSS_JS = '../../';
$ROOT = '../../';

include_once('../../classes/Plats.php');
$db = new PDO("mysql:host=127.0.0.1;dbname=lebonbarquette", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$requete = $db->prepare("SELECT * FROM plats");
$requete->execute();
$requete->setFetchMode(PDO::FETCH_CLASS,'Plats');

$plats = $requete->fetchAll();

include_once("../headeradmin.php");

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
                <?php foreach ($plats as $plat) { ?>
                    <tr>
                        <td><img src="<?php echo $ROOT."img/".$plat->getPhoto();?>" width="50" alt=""></td>
                        <td><?php echo $plat->getNom();?></td>
                        <td><?php echo $plat->getPrix();?> €</td>
                        <td>
                            <a href="details.php?id=<?php echo $plat->getId();?>" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="modifier_plat.php?id=<?php echo $plat->getId();?>" class="btn btn-warning text-light">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="supprime_plat.php?id=<?php echo $plat->getId();?>" class="btn btn-danger text-light">
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
<?php include_once("../footer.php"); ?>