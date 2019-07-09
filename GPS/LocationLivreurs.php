<?php
include("../Connect.php"); 
$sql = $connect->prepare("SELECT * FROM position");
$sql->execute();
$result  = array();
$result['posliv'] = array();
if($sql){
while($row = $sql->fetch()){
	 $index['id_pos'] =$row['id_pos'];
	 $index['latitude'] = $row['latitude'];
	 $index['longitude'] = $row['longitude'];
	 $index['id_livr'] = $row['id_livr'];
     $index['nomliv'] = $row['nomliv'];
array_push($result['posliv'], $index);   
        }
         echo json_encode($result);
    } 
    else {

           

        }

?>