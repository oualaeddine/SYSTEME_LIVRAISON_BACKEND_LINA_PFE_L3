<?php 
include("../Connect.php"); 
$sql = $connect->prepare("SELECT * FROM produit");
$sql->execute();
$result  = array();
$result["productc"] = array();
if($sql){
while ($row = $sql->fetch()){
   
	  $index['idproduit'] = $row['idproduit'];
    $index['imageproduit']=$row['imageproduit'];
     $index['nomproduit'] = $row['nomproduit'];
     $index['prixproduit'] = $row['prixproduit'];
	   array_push($result["productc"], $index);
       
            
    } 
    echo json_encode($result);
  }
    else {

          echo "error"; 

        }
    

?>
