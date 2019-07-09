<?php
include("../Connect.php");

$id = $_POST["idproduit"];

$sql=$connect->prepare("DELETE FROM produit WHERE idproduit=:id");
$sql->execute(array("id"=>$id));
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
<form action="DeleteProduit.php" method="post">
    Nom product: <br/>
      <input type="text" name="idproduit" placeholder="nom"/><br/>

    <input type="submit" value="Login User"/>
</form>
