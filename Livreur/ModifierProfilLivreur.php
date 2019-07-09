<?php
include("../Connect.php");
$id = $_POST["idliv"];
$username = $_POST["Username"];
$password =$_POST["Password"];
$sql=$connect->prepare("UPDATE livreur SET Username=:user,Password=:pass WHERE idliv=:id");
$sql->execute(array("id"=>$id,"user"=>$username,"pass"=>$password));
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
