<?php
$ROOTCSS_JS = '../';
$ROOT = '../';

include_once($ROOT.'classes/User.php');
$db = new PDO("mysql:host=127.0.0.1;dbname=lebonbarquette", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$requete = $db->prepare("SELECT * FROM user");
$requete->execute();
$requete->setFetchMode(PDO::FETCH_CLASS,'User');

$users = $requete->fetchAll();

include_once("headeradmin.php");

?>
<div class="liste-plats">
    <h1>Liste des clients</h1>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user->getId();?></td>
                        <td><?php echo $user->getNom();?></td>
                        <td><?php echo $user->getRoles();?></td>
                        <td>
                            <a href="../client/modifier_client.php?id=<?php echo $user->getId();?>" class="btn btn-warning text-light">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="../client/supprime_client.php?id=<?php echo $user->getId();?>" class="btn btn-danger text-light">
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
<?php include_once("footer.php"); ?>