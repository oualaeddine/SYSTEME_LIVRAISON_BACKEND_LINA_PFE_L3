<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){

$id = $_POST["id_produit"];
$nom = $_POST['nom_prod'];
$qte = $_POST["quantite_comm"];
$prix = $_POST["prixPro"];
$sql=$connect->prepare("INSERT INTO panier(id_produit,nom_prod,quantite_comm,prixPro) VALUES (:idpr,:nompr,:qty,:prixt)");
$sql->execute(array("idpr"=>$id,"nompr"=>$nom,"qty"=>$qte,"prixt"=>$prix));
if($sql){  
            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);
        } else {
            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);

           

        }

}
//nom,prenom,numtele,HeureDebutTravail,HeureFinTravail,idcompte,idGerant,
        //:nom,:prenom,:numtele,:heured,:heuref,:idcomp,:idGerant,
    /*$nom= $_POST["nom"];
$prenom = $_POST['prenom'];
$numtele = $_POST["numtele"];
$heureD = $_POST["HeureDebutTravail"];
$heureF = $_POST["HeureFinTravail"];
$id_compte = $_POST["idcompte"];
$id_ger = $_POST["idGerant"];*/

        //"nom"=>$nom,"prenom"=>$prenom,"numtele"=>$numtele,"heured"=>$heureD,"heuref"=>$heureF,"idcomp"=>$id_compte,"idGerant"=>$id_ger
}
?>
<h1>Login</h1>
<form action="InserCart.php" method="post">
    Nom product: <br/>
<input type="text" name="id_produit" placeholder="nom"/><br/>
    <input type="text" name="nom_prod" placeholder="nom"/><br/>
    <input type="text" name="quantite_comm" placeholder="nom"/><br/>
        <input type="text" name="prixPro" placeholder="nom"/><br/>
     
        <input type="submit" value="Login User"/>
</form>