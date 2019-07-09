<?php
include("../Connect.php");

$id = $_POST["idliv"];

$sql=$connect->prepare("DELETE FROM livreur WHERE idliv =:idlivr");
$sql->execute(array("idlivr"=>$id));
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
