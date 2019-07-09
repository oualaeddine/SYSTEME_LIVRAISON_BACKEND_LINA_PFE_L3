<?php
include("../Connect.php");

$id = $_POST["idproduit"];
$nom = $_POST["nomproduit"];
$ingrediants = $_POST["ingrediants"];
$prix = $_POST["prixproduit"];
$photo = $_POST["imageproduit"];
$rnd = rand(0,5000);
$path="PhotoProduit/".$rnd.".jpg";
$finalpath= "http://192.168.1.4/Projet/Produit/".$path;
$decodimg =base64_decode("'.$photo.'");
file_put_contents($path, $decodimg);
$sql=$connect->prepare("UPDATE produit SET nomproduit=:nomp,ingrediants=:ing,prixproduit =:prix,imageproduit = :image WHERE idproduit=:id");
$sql->execute(array("id"=>$id,"nomp" => $nom,"ing"=>$ingrediants,"prix"=>$prix,"image"=>$finalpath));
if($sql){
            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);
        } else {
            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);



        }




?>
<h1>Login</h1>
<form action="UpdateProduit.php" method="post">
    Nom product: <br/>
      <input type="text" name="idproduit" placeholder="nom"/><br/>
    <input type="text" name="quantite" placeholder="nom"/><br/>
    <input type="text" name="ingrediants" placeholder="nom"/><br/>
    <input type="text" name="prixproduit" placeholder="nom"/><br/>
    <input type="submit" value="Login User"/>
</form>
