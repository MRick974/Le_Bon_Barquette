 <?php

$ROOT = '../';
require("../header.php");
include_once('../classes/User.php');

$db =new PDO("mysql:host=127.0.0.1;dbname=lebonbarquette","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

if (isset($_GET["id"])){
    $id=$_GET["id"];
    $requete=$db->prepare("delete from user where id = $id");
    $requete->setFetchMode(PDO::FETCH_CLASS,'User');
$requete->execute();
header("Location: ../admin/details_client");
}

 ?>