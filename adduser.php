

<?php
require_once './db/connexion.php';

$codeSQL = $db->prepare(
    "INSERT INTO utilisateurs(nom,prenom,email,code_postal)
    VALUES (:nom, :prenom, :email, :code_postal)"
);

$codeSQL -> bindParam(':nom',$nom);
$codeSQL -> bindParam(':prenom',$prenom);
$codeSQL -> bindParam(':email',$email);
$codeSQL -> bindParam(':code_postal',$code_postal);


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$code_postal=$_POST['code_postal'];

$codeSQL -> execute();
header('location: ./index.php')
?>