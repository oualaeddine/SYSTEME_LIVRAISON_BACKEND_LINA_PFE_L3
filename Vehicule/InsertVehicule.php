<?php
include("../Connect.php");
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$nom= $_POST["nomvehicule"];
$mat = $_POST["matricule"];
$type = $_POST['type'];
$photo = $_POST["Photo"];
$cap = $_POST['capacite'];
$etat = $_POST['etat_vehicule'];
$rnd = rand(0,5000);
$path="PhotoVehicule/".$rnd.".jpg";
$finalpath= "http://192.168.1.4/Projet/Vehicule/".$path;
$decodimg =base64_decode("'.$photo.'");
file_put_contents($path, $decodimg);
$check = $connect->prepare("SELECT * FROM vehicule");
$check->execute();
$row = $check->fetch();
if ( $nom == $row["nomvehicule"]){
    $result['success'] = "2";
            $result['message'] ="cette vehicule déja existé";
            echo json_encode($result);
}else{
$sql=$connect->prepare("INSERT INTO vehicule(nomvehicule,matricule,type,Photo,capacite,etat_vehicule) VALUES (:nom,:matricule,:type,:photo,:cap,:et)");
$sql->execute(array("nom"=>$nom,"matricule"=>$mat,"type"=>$type,"photo"=>$finalpath,"cap"=>$cap,"et"=>$etat));
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
<form action="InsertVehicule.php" method="post">
    Nom product: <br/>
<input type="text" name="nomvehicule" placeholder="nom"/><br/>
<input type="text" name="Matricule" placeholder="nom"/><br/>
    <input type="text" name="type" placeholder="nom"/><br/>
    <input type="text" name="Photo" placeholder="nom"/><br/>
        <input type="submit" value="Login User"/>
</form>
