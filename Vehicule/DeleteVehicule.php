<?php
include("../Connect.php");

$nom = $_GET["nomvehicule"];

$sql=$connect->prepare("DELETE FROM vehicule WHERE nomvehicule =:nom");
$sql->execute(array("nom"=>$nom));
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
