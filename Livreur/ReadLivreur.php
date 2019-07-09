<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$id = $_POST["idliv"];
$sql = $connect->prepare("SELECT * FROM livreur WHERE idliv=? ");
$sql->execute(array($id));
$result  = array();
$result['read'] = array();
if($sql->rowCount() === 1){
    $row = $sql->fetch();
	 $index['Username'] = $row['Username'];
    $index['Password'] = $row['Password'];
     $index['Photo'] = $row['Photo'];
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
<form action="ReadLivreur.php" method="post">
    Nom product: <br/>
    <input type="text" name="idliv" placeholder="nom"/><br/>

    <input type="submit" value="Login User"/>
</form>
