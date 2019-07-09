<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$nomcat= $_POST["nomcat"];
$image = $_POST['imagecat'];
$id = $_POST["id_gerant"];
$rnd = rand(0,5000);
$path="PhotoProduit/".$rnd.".jpg";
$finalpath= "http://192.168.1.4/Projet/Produit/".$path;
$decodimg =base64_decode("'.$image.'");
file_put_contents($path, $decodimg);
$check = $connect->prepare("SELECT * FROM categorie");
$check->execute();
$row = $check->fetch();
if ($nomcat == $row["nomcat"]){
    $result['success'] = "2";
            $result['message'] = "cet categorie déja existé";
            echo json_encode($result);
}else{
$sql=$connect->prepare("INSERT INTO categorie(nomcat,imagecat,id_gerant) VALUES (:nom,:image,:idger)");
$sql->execute(array("nom"=>$nomcat,"image"=>$finalpath,"idger"=>$id));
if($sql){
            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);
        } else {
            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);



        }
}
}
?>
<h1>Login</h1>
<form action="InsertCategorie.php" method="post">
    Nom product: <br/>
    <input type="text" name="nomcat" placeholder="nom"/><br/>
    <input type="text" name="imagecat" placeholder="nom"/><br/>
    <input type="submit" value="Login User"/>
</form>
