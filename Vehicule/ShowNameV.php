<?php
include("../Connect.php");

$sql = $connect->prepare("SELECT nomvehicule FROM vehicule WHERE etat_vehicule='disponible'");
$sql->execute();
$result  = array();
$result['nameve'] = array();
if($sql){
while($row = $sql->fetch()){
	 $index['nomvehicule'] = $row['nomvehicule'];


           array_push($result['nameve'], $index);
        }
         echo json_encode($result);
    }
    else {



        }

?>
