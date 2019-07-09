<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$nomcat = $_POST["nomcat"];
$id = $_POST["id_gerant"];
$check = $connect->prepare("SELECT * FROM categorie");
$check->execute();
$row = $check->fetch();
if ($nomcat == $row["nomcat"]){
    $result['success'] = "2";
            $result['message'] = "aldmsùmsls";
            echo json_encode($result);
}
else{
$sql=$connect->prepare("INSERT INTO categorie(nomcat,id_gerant) VALUES (:nom,:idger)");
$sql->execute(array("nom"=>$nomcat,"idger"=>$id));
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
<form action="test.php" method="post">
    Nom product: <br/>
    <input type="text" name="nomcat" placeholder="nom"/><br/>
    <input type="text" name="id_gerant" placeholder="nom"/><br/>
    <input type="submit" value="Login User"/>
</form>
