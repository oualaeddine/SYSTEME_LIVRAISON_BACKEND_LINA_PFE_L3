<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$id = $_POST["idproduit"];
$photo = $_POST["imageproduit"];
$rnd = rand(0,5000);
$path="PhotoProduit/".$id.".jpg";
$finalpath= "http://192.168.1.4/Projet/Produit/".$path;
$decodimg =base64_decode("'.$photo.'");
file_put_contents($path, $decodimg);
$sql=$connect->prepare("UPDATE produit SET imageproduit = :image WHERE idproduit=:id");
$sql->execute(array("id"=>$id,"image"=>$finalpath));
if($sql){

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);
        }
         else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);



        }
}

?>
