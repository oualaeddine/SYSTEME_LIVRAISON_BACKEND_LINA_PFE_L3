<?php
include("../Connect.php");

$sql = $connect->prepare("SELECT * FROM vehicule");
$sql->execute();
$result  = array();
$result['vehicule'] = array();
if($sql){
while($row = $sql->fetch()){
	 $index['id_vehicule'] =$row['id_vehicule'];
	 $index['nomvehicule'] = $row['nomvehicule'];
	 $index['matricule'] = $row['matricule'];
	 $index['type'] = $row['type'];
	  $index['Photo'] = $row['Photo'];
	   $index['capacite'] = $row['capacite'];
     $index['etat_vehicule'] = $row['etat_vehicule'];

           array_push($result['vehicule'], $index);
        }
         echo json_encode($result);
    }
    else {



        }

?>
