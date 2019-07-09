<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == "GET"){
$id = $_GET["id_cat"];
$sql = $connect->prepare("SELECT * FROM produit WHERE id_cat=?");
$sql->execute(array($id));
$result  = array();
$result["product"] = array();
if($sql){
while ($row = $sql->fetch()){

	  $index['idproduit'] = $row['idproduit'];
    $index['imageproduit']=$row['imageproduit'];
     $index['nomproduit'] = $row['nomproduit'];
     $index['prixproduit'] = $row['prixproduit'];
    $index['ingrediants'] = $row['ingrediants'];

	   array_push($result["product"], $index);


    }
    echo json_encode($result);
  }
    else {

          echo "error";

        }
    }

?>
<form action="ShowProduit.php" method="post">
    Nom product: <br/>
    <input type="text" name="id_cat" placeholder="nom"/><br/>

    <input type="submit" value="Login User"/>
</form>
