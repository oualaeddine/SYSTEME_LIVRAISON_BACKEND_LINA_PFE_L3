<?php
include("../Connect.php");

$id = $_POST["idliv"];
$etat = $_POST["etat_liv"];
$sql=$connect->prepare("UPDATE livreur SET etat_liv =:et WHERE idliv=:id");
$sql->execute(array("id"=>$id,"et"=>$etat));
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
