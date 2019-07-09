<?php
include("../Connect.php");
$id = $_POST["type"];
$nom = $_POST["nomvehicule"];
$matricule = $_POST["matricule"];
$cap = $_POST["capacite"];
$et = $_POST["etat_vehicule"];
$sql=$connect->prepare("UPDATE vehicule SET nomvehicule=:nom,matricule=:mat,capacite=:cap,etat_vehicule=:et WHERE type=:id");
$sql->execute(array("id"=>$id,"nom"=>$nom,"mat"=>$matricule,"cap"=>$cap,"et"=>$et));
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
