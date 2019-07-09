<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
$id = $_POST["idger"];
$photo = $_POST["Image"];
$path = "photo/" .$id. ".jpeg";
$finalPath = "http://192.168.1.4/Projet/Login/".$path;
$sql=$connect->prepare("UPDATE gerant SET Image = :image WHERE idger=:id");
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

}

?>
