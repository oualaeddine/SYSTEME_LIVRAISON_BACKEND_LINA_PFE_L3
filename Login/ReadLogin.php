<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$id = $_POST["idger"];
$sql = $connect->prepare("SELECT * FROM gerant WHERE idger=? ");
$sql->execute(array($id));
$result  = array();
$result['read'] = array();
if($sql->rowCount() === 1){
    $row = $sql->fetch();
	 $index['Username'] = $row['Username'];
    $index['Password'] = $row['Password'];
     $index['Image'] = $row['Image'];
           array_push($result['read'], $index);
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
<form action="ReadLogin.php" method="post">
    Nom product: <br/>
    <input type="text" name="idger" placeholder="nom"/><br/>

    <input type="submit" value="Login User"/>
</form>
