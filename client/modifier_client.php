<?php
$ROOTCSS_JS = '../';
$ROOT = '../';
include("../admin/headeradmin.php");
include_once("../classes/User.php");

function dismount($object) {
    $reflectionClass = new ReflectionClass(get_class($object));
    $array = array();
    foreach ($reflectionClass->getProperties() as $property) {
        $property->setAccessible(true);
        $array[$property->getName()] = $property->getValue($object);
        $property->setAccessible(false);
    }
    return $array;
}
$db =new PDO("mysql:host=127.0.0.1;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
if (isset($_GET["id"])){
    $id=$_GET["id"];
    $requete=$db->prepare("select * from user where id = $id");
    $requete->setFetchMode(PDO::FETCH_CLASS,'User');
    $requete->execute();
    $user=$requete->fetch();
}
//die(var_dump($_SERVER["REQUEST_METHOD"]));
if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $user->setId($id);
    $user->setNom($_POST["nom"]);
    $user->setRoles("ROLE_USER");
    $oldmdp=$user->getPassword();
    if(isset($_POST["password"])){
        $mdp = $_POST['password'];
        $mdpcrypt = password_hash($mdp,PASSWORD_ARGON2ID); // et on récupere le mot de passe crypter.
        $user->setPassword($mdpcrypt);
    }else{
        $user->setPassword($oldmdp);
    }
   
    $requete = $db->prepare("UPDATE user SET nom =:nom, password =:password, roles =:roles WHERE id=:id");
    $requete->execute(dismount($user));
    header('Location: ../admin/details_client.php');

}

?>
<section class="details-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <h4>Modifier un client</h4>
                    <form class="form" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $user->getNom() ?>" placeholder="">
                            <label for="">Mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control"  placeholder="">
                            <button type="submit" class="btn btn-primary mt-3" >Modifier</button>
                        </div>
                        <div style="background-color:red;color:white;padding:2px;margin:10px;margin-right:50%;" >
                            <p class="fas fa-exclamation-triangle"> Lorsque vous cliquerez sur <strong>MODIFIER</strong> l'action sera irréversible !</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once("../footer.php");

?>