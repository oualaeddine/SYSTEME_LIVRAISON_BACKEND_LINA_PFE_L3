<?php
include("../Connect.php");
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST["idproduit"];
    $sql = $connect->prepare("SELECT * FROM produit WHERE idproduit = ?");
    $sql->execute(array($id));
    $result = array();
    $result['show'] = array();
    if ($sql) {
        while ($row = $sql->fetch()) {
            $index['imageproduit'] = $row['imageproduit'];
            $index['nomproduit'] = $row['nomproduit'];
            $index['quantite'] = $row['quantite'];
            $index['prixproduit'] = $row['prixproduit'];
            $index['ingrediants'] = $row['ingrediants'];

            array_push($result['show'], $index);

        }
        echo json_encode($result);
    } else {


    }
}


?>
