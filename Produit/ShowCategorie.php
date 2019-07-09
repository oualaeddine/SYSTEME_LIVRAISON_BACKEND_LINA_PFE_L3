<?php
include("../Connect.php");

$sql = $connect->prepare("SELECT * FROM categorie");
$sql->execute();
$result  = array();
$result['categorie'] = array();
if($sql){
while($row = $sql->fetch()){
	  $index['idcat'] = $row['idcat'];
	 $index['nomcat'] = $row['nomcat'];
	 $index['imagecat'] = $row['imagecat'];
           array_push($result['categorie'], $index);

        }
         echo json_encode($result);
    }
    else {



        }

?>
