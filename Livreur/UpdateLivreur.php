<?php
include("../Connect.php");

$id = $_POST["idliv"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$numtele = $_POST["numtele"];
$sql=$connect->prepare("UPDATE livreur SET nom=:nom,prenom=:prenom,numtele=:numtele WHERE idliv=:id");
$sql->execute(array("id"=>$id,"nom"=>$nom,"prenom"=>$prenom,"numtele"=>$numtele));
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
