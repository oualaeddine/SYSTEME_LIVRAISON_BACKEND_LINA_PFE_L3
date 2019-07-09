<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){

$nom= $_POST["nom"];
$prenom = $_POST['prenom'];
$numtele = $_POST["numtele"];
$user=$_POST["Username"];
$pass=$_POST["Password"];
$id_ger = $_POST["idGerant"];
$nomv = $_POST["n"];

$check = $connect->prepare("SELECT * FROM livreur");
$check->execute();
$row = $check->fetch();
if ( $numtele == $row["numtele"] || $user == $row["Username"]){
    $result['success'] = "2";
            $result['message'] = "ce livreur déja existé";
            echo json_encode($result);
}else{
$sql=$connect->prepare("INSERT INTO livreur(nom,prenom,numtele,Username,Password,idGerant,idv) VALUES (:nom,:prenom,:numtele,:user,:pass,:idGerant,(SELECT id_vehicule FROM vehicule WHERE nomvehicule = :n))");
$sql->execute(array("nom"=>$nom,"prenom"=>$prenom,"numtele"=>$numtele,"user"=>$user,"pass"=>$pass,"idGerant"=>$id_ger,"n"=>$nomv));
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
<form action="InsertLivreur.php" method="post">
    Nom product: <br/>
<input type="text" name="nom" placeholder="nom"/><br/>
    <input type="text" name="prenom" placeholder="nom"/><br/>
    <input type="text" name="numtele" placeholder="nom"/><br/>
        <input type="text" name="Username" placeholder="nom"/><br/>
        <input type="text" name="Password" placeholder="nom"/><br/>
        <input type="text" name="idGerant" placeholder="nom"/><br/>
             <input type="text" name="n" placeholder="nom"/><br/>
        <input type="submit" value="Login User"/>
</form>
