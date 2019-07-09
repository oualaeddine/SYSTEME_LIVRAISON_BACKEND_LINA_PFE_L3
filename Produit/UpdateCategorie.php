<?php
include("../Connect.php");

$id = $_POST["idcat"];
$nom= $_POST["nomcat"];
$sql=$connect->prepare("UPDATE categorie SET nomcat=:nom WHERE idcat=:id");
$sql->execute(array("id"=>$id,"nom"=>$nom));
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
