<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$username = $_POST["Username"];
$password = $_POST["Password"];
$sql = $connect->prepare("SELECT * FROM livreur WHERE Username=? AND Password = ?");
$sql->execute(array($username,$password));
$result  = array();
$result['loginliv'] = array();
if($sql->rowCount() === 1){
    $row = $sql->fetch();
    $index['idliv'] = $row['idliv'];
     $index['Username'] = $row['Username'];
     $index['Password'] = $row['Password'];
     $index['Photo'] = $row['Photo'];
    // $index['idGerant'] = $row['idGerant'];
           array_push($result['loginliv'], $index);
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
<form action="LoginLivreur.php" method="post">
    Nom product: <br/>
    <input type="text" name="Username" placeholder="nom"/><br/>
    <input type="text" name="Password" placeholder="nom"/><br/>
    <input type="submit" value="Login User"/>
</form>
