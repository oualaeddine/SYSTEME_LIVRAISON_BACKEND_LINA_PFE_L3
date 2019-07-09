<?php
include("../Connect.php");

$sql = $connect->prepare("SELECT * FROM livreur");
$sql->execute();
$result  = array();
$result['livreur'] = array();
if($sql){
while($row = $sql->fetch()){
	 $index['idliv'] =$row['idliv'];
	 $index['nom'] = $row['nom'];
	 $index['prenom'] = $row['prenom'];
	 $index['numtele'] = $row['numtele'];
     $index['etat_liv'] = $row['etat_liv'];
           array_push($result['livreur'], $index);
        }
         echo json_encode($result);
    }
    else {



        }

?>
