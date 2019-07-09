<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$id = $_POST["idger"];
$username= $_POST["Username"];
$password =$_POST["Password"];
$sql=$connect->prepare("UPDATE gerant SET Username=:user,Password=:password WHERE idger=:id");
$sql->execute(array("id"=>$id,"user"=>$username,"password"=>$password));
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



?>
<h1>Login</h1>
<form action="EditProfile.php" method="post">
    Nom product: <br/>
    <input type="text" name="idger" placeholder="nom"/><br/>
    <input type="text" name="Username" placeholder="nom"/><br/>
    <input type="text" name="Password" placeholder="nom"/><br/>
    <input type="submit" value="Login User"/>
</form>
