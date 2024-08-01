<?php
require_once './db/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $id = $_POST['id'];
        $nom = $_POST['modifName'];
        $prenom = $_POST['modifFname'];
        $email = $_POST['modifEmail'];
        $codePostal = $_POST['modifCP'];
        
        $updateSQL = $db->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, code_postal = :code_postal WHERE id = :id");
        $updateSQL->bindParam("nom",$nom);
        $updateSQL->bindParam("prenom",$prenom);
        $updateSQL->bindParam("email",$email);
        $updateSQL->bindParam("code_postal",$codePostal);
        $updateSQL->bindParam("id",$id);
       
        $updateSQL->execute();
       
        header('Location: ./index.php');
        exit;
    } catch (\PDOException $err) {
            echo $err;
    }
  
}