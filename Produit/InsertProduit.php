<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$nomproduit= $_POST["nomproduit"];
$ingrediants =$_POST["ingrediants"];
$prix = $_POST["prixproduit"];
$id_cat =$_POST["id_cat"];
$image = $_POST["imageproduit"];
$rnd = rand(0,5000);
$path="PhotoProduit/".$rnd.".jpg";
$finalpath= "http://192.168.1.4/Projet/Produit/".$path;
$decodimg =base64_decode("'.$image.'");
file_put_contents($path, $decodimg);
$check = $connect->prepare("SELECT * FROM produit");
$check->execute();
$row = $check->fetch();
if ($nomproduit == $row["nomproduit"]){
    $result['success'] = "2";
            $result['message'] = "cet produit déja existé";
            echo json_encode($result);
}else{
$sql=$connect->prepare("INSERT INTO produit(nomproduit,ingrediants,prixproduit,imageproduit,id_cat) VALUES (:nomproduit,:ingrediants,:prix,:image,:id_cat)");
$sql->execute(array("nomproduit"=>$nomproduit,"ingrediants"=>$ingrediants,"prix"=>$prix,"image" => $finalpath,"id_cat"=>$id_cat));
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
  /*      $quantite =$_POST["quantite"];
$ingrediants =$_POST["ingrediants"];
$prix = $_POST["prixproduit"];
$image = $_POST['imageproduit'];
$rnd = rand(0,5000);
$path="PhotoProduit/".$rnd.".jpg";
$finalpath= "http://192.168.1.6/Projet/Produit/".$path;
$decodimg =base64_decode("'.$image.'");
file_put_contents($path, $decodimg);
$id_cat =$_POST["id_cat"];
*/
/*,quantite,ingrediants,prixproduit,imageproduit,id_cat*/
/*,:quantite,:ingrediants,:prix,:image,:id_cat*/
/*,"quantite"=>$quantite,"ingrediants"=>$ingrediants,"prix"=>$prixproduit,"image" => $finalpath,"id_cat"=>$id_cat*/
}
?>
<h1>Login</h1>
<form action="InsertProduit.php" method="post">
    Nom product: <br/>
    <input type="text" name="nomproduit" placeholder="nom"/><br/>
     <input type="text" name="quantite" placeholder="nom"/><br/>
     <input type="text" name="ingrediants" placeholder="nom"/><br/>
        <input type="text" name="prixproduit" placeholder="nom"/><br/>
    <input type="text" name="id_cat" placeholder="nom"/><br/>

    <input type="submit" value="Login User"/>
</form>
