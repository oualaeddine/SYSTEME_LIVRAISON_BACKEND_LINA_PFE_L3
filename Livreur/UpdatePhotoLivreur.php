<?php
include("../Connect.php");

$id = $_POST["idliv"];
$photo = $_POST["Photo"];
$path = "Photo/" .$id. ".jpeg";
$finalPath = "http://192.168.1.4/Projet/Login/".$path;
$sql=$connect->prepare("UPDATE livreur SET Photo = :image WHERE idliv=:id");
$sql->execute(array("id"=>$id,"image"=>$finalPath));
if($sql){
	if (file_put_contents($path, base64_decode($photo))) {
            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);
        }
        } else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);



        }



?>
