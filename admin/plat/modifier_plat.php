<?php
$ROOT = '../../';
require("../../header.php");

include_once('../../classes/Plats.php');

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
    $requete=$db->prepare("select * from plats where id = $id");
    $requete->setFetchMode(PDO::FETCH_CLASS,'Plats');
    $requete->execute();
    $plat=$requete->fetch();
}

if ($_SERVER["REQUEST_METHOD"]==="POST"){


    $oldImage = $plat->getPhoto();

    if (!empty($_FILES["photo"]["name"]) && $oldImage != $_FILES["photo"]["name"]) {
        $image = $_FILES["photo"]["name"] ;
        $target_dir = $ROOT."img/";
        $target_file = basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        if (file_exists($target_dir.$target_file)) {
            $uploadOk = 0;
          }

          if ($_FILES["photo"]["size"] > 500000) {
            $uploadOk = 0;
          }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir . $target_file)) {
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }else{
        $image = $oldImage;
    }



    $plat->setNom($_POST["nom"]);
    $plat->setDetail($_POST["detail"]);
    $plat->setPhoto($image);
    $plat->setPrix($_POST["prix"]);
    $requete = $db->prepare("UPDATE plats SET nom =:nom, detail = :detail, photo = :photo, prix = :prix WHERE id=:id");
    $requete->execute(dismount($plat));
    header('Location: ./');

}

?>
<section class="details-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="image-repas">
                    <img src="<?php if(!is_null($plat->getPhoto())){echo $ROOT."img/".$plat->getPhoto();;}else {} ?>"
                        class="img-fluid" alt="image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <h4>Ajouter un plat</h4>
                    <form class="form" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $plat->getNom() ?>" placeholder="">
                            <label for="">Description</label>
                            <input type="text" name="detail" id="detail" class="form-control" value="<?php echo $plat->getDetail() ?>" placeholder="">
                            <label for="">Prix</label>
                            <input type="float" name="prix" id="prix" class="form-control" value="<?php echo $plat->getPrix() ?>" placeholder="">
                            <input type="hidden" name="size" value="1000000">
                            <label for="">Changer la photo</label>
                            <div>
                                <input type="file" name="photo" id="photo">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" >Modifier</button>
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